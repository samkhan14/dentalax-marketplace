<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Product;
use Stripe\Price;
use App\Models\Plan;
use App\Models\User;
use Laravel\Cashier\Cashier;
use App\Models\Payment;
use App\Models\Invoice;
use App\Models\PaymentLog;
use Carbon\Carbon;
use Illuminate\Http\Request;



class StripeService
{
    public function __construct()
    {
        // dd(config('cashier.secret'));

    }

    // create product and prices for stripe
    public function createProductAndPrices(Plan $plan): array
    {
        $product = Product::create([
            'name' => $plan->name,
            'description' => $plan->description,
        ]);

        $priceMonthly = Price::create([
            'unit_amount' => $plan->price_monthly * 100,
            'currency' => 'eur',
            'recurring' => ['interval' => 'month'],
            'product' => $product->id,
        ]);

        $priceYearly = Price::create([
            'unit_amount' => $plan->price_yearly * 100,
            'currency' => 'eur',
            'recurring' => ['interval' => 'year'],
            'product' => $product->id,
        ]);

        //  dd($product, $priceMonthly, $priceYearly);
        return [
            'product_id' => $product->id,
            'price_monthly' => $priceMonthly->id,
            'price_yearly' => $priceYearly->id,
        ];
    }

    // deactivate stripe product
    public function deactivateProduct($productId)
    {
        Product::update($productId, ['active' => false]);
    }

    // activate stripe product
    public function activateProduct($productId)
    {
        Product::update($productId, ['active' => true]);
    }

    public function createCheckoutSession(array $formData): string
    {
        $user = User::findOrFail($formData['user_id']);
        // dd($user, "service me agya");
        // Set Stripe as default payment provider for Cashier
        Cashier::useCustomerModel(User::class);
        // Set Stripe price ID based on plan and billing
        try {
            // dd("agya try me");
            $priceId = $this->resolveStripePriceId($formData['plan_slug'], $formData['billing_cycle']);
            // dd($priceId);
        } catch (\Exception $e) {
            \Log::error('Invalid price resolution', ['error' => $e->getMessage()]);
            throw $e; // Let controller handle it
        }

        // Create checkout session
        $checkoutSession = $user->newSubscription('default', $priceId)
            ->checkout([
                'success_url' => route('stripe.success'),
                'cancel_url' => route('stripe.cancel'),
            ]);
        // dd($checkoutSession);

        return $checkoutSession->url;
    }

    public function resolveStripePriceId(string $planSlug, string $billingCycle): string
    {
        // dd($planSlug, $billingCycle);
        $plan = Plan::where('slug', $planSlug)->first();
        // dd($plan);
        if (!$plan) {
            throw new \Exception("Plan not found for slug: {$planSlug}");
        }

        // dd($planSlug, $billingCycle);
        return match ($billingCycle) {
            'monthly' => $plan->stripe_price_monthly,
            'yearly' => $plan->stripe_price_yearly,
            default => throw new \Exception("Invalid billing cycle: {$billingCycle}"),
        };
    }

    public function checkoutSuccess(Request $request)
    {
        try {
            \Log::info('⚡ Stripe Checkout Success Triggered');

            // ✅ Step 1: Get user from session or auth
            $user = auth()->user() ?? User::find(session('user_id'));
            \Log::info('✅ User Fetched', ['user_id' => $user?->id]);

            if (!$user) {
                \Log::warning('❌ User not found during Stripe success');
                return redirect()->route('dentist.login.page')->with('error', 'User not found.');
            }

            // ✅ Step 2: Login user
            // Auth::login($user);
            // \Log::info('✅ User Logged In', ['user_id' => $user->id]);

            // ✅ Step 3: Get subscription
            $subscription = $user->subscription('default');
            \Log::info('📦 Subscription Fetched', ['subscription' => $subscription]);

            if (!$subscription || !$subscription->valid()) {
                \Log::warning('❌ Invalid or missing subscription', ['user_id' => $user->id]);
                return redirect()->route('packages')->with('error', 'Subscription is not valid or missing.');
            }

            DB::transaction(function () use ($user, $subscription) {

                \Log::info('🔐 Entering DB Transaction');

                $stripeSub = $subscription->asStripeSubscription();
                \Log::info('🔁 Stripe Subscription', ['stripe_id' => $stripeSub->id]);

                $latestInvoice = $stripeSub->latest_invoice ?? null;

                if (!$latestInvoice) {
                    throw new \Exception('Latest invoice not found on Stripe.');
                }

                $amount = $latestInvoice->amount_paid / 100;
                $currency = strtoupper($stripeSub->currency);
                $transactionId = $stripeSub->id;

                \Log::info('💳 Payment Details', [
                    'amount' => $amount,
                    'currency' => $currency,
                    'transaction_id' => $transactionId,
                ]);

                // ✅ Step 4: Update user and profile
                $user->update(['status' => 1]);
                $user->dentistProfile()?->update(['status' => 'claimed']);
                \Log::info('🧑‍⚕️ User & DentistProfile Updated');

                // ✅ Step 5: Store payment
                $payment = Payment::create([
                    'user_id' => $user->id,
                    'plan_id' => Plan::where('stripe_price_' . $subscription->recurring_interval, $subscription->stripe_price)->value('id') ?? 1,
                    'gateway' => 'stripe',
                    'billing_type' => 'recurring',
                    'transaction_id' => $transactionId,
                    'amount' => $amount,
                    'status' => 'succeeded',
                    'next_billing_date' => $subscription->nextPaymentDate(),
                ]);
                \Log::info('💰 Payment Saved', ['payment_id' => $payment->id]);

                // ✅ Step 6: Store invoice
                $invoice = Invoice::create([
                    'user_id' => $user->id,
                    'payment_id' => $payment->id,
                    'invoice_no' => 'INV-' . strtoupper(uniqid()),
                    'invoice_pdf' => null,
                    'total' => $amount,
                    'issued_at' => now(),
                ]);
                \Log::info('🧾 Invoice Saved', ['invoice_id' => $invoice->id]);

                // ✅ Step 7: Store payment log
                $log = PaymentLog::create([
                    'transaction_id' => $transactionId,
                    'payment_gateway' => 'stripe',
                    'amount' => $amount,
                    'currency' => $currency,
                    'payment_method' => 'card',
                    'payment_method_details' => json_encode($stripeSub->default_payment_method ?? []),
                    'user_id' => $user->id,
                    'invoice_id' => $invoice->id,
                    'subscription_id' => $subscription->id,
                    'status' => 'completed',
                    'paid_at' => now(),
                    'gateway_response' => json_encode($stripeSub),
                    'gateway_status' => $stripeSub->status,
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);
                \Log::info('📊 Payment Log Created', ['log_id' => $log->id]);

                // ✅ Step 8: Emails
                // try {
                //     Mail::to($user->email)->send(new \App\Mail\SendInvoiceToUser($invoice));
                //     Mail::to(config('mail.admin_address'))->send(new \App\Mail\NotifyAdminOfNewSubscription($user, $invoice));
                //     \Log::info('📧 Emails Sent');
                // } catch (\Throwable $mailEx) {
                //     \Log::error('📬 Email sending failed: ' . $mailEx->getMessage());
                // }
            });

            // ✅ Step 9: Clear session
            session()->forget('dentist_form_data');
            session()->forget('user_id');
            \Log::info('🧹 Session cleared');

            return view('frontend.pages.checkout_success');

        } catch (\Throwable $e) {
            \Log::error('❌ Stripe Success Exception: ' . $e->getMessage());

            \App\Services\StripeExceptionService::handle($e, null, [
                'transaction_id' => $transactionId ?? null,
                'amount' => $amount ?? 0.00,
                'currency' => $currency ?? 'EUR',
            ]);

            return redirect()->route('dentist.registration.page')->withErrors([
                'stripe_error' => 'Payment processing failed: ' . $e->getMessage(),
            ]);
        }
    }



    public function handleCancelledCheckout(array $formData, $user = null): void
    {
        // Optional: Log or notify admin about cancellation
        \Log::info('Stripe Checkout cancelled by user', [
            'user_id' => $user?->id,
            'email' => $user?->email,
            'form_data' => $formData,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // Optional: Store cancellation in `payment_logs` table
        PaymentLog::create([
            'transaction_id' => null,
            'payment_gateway' => 'stripe',
            'amount' => $formData['price'] ?? 0.00,
            'currency' => $formData['currency'] ?? 'EUR',
            'payment_method' => null,
            'payment_method_details' => null,
            'user_id' => $user?->id,
            'status' => 'failed',
            'gateway_response' => null,
            'gateway_status' => 'cancelled_by_user',
            'failure_reason' => 'User cancelled the checkout.',
            'metadata' => json_encode($formData),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'paid_at' => null,
            'failed_at' => now(),
        ]);
    }





}

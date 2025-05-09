<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;


class StripeController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        // Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $this->stripeService = $stripeService;
    }
    public function stripeCheckoutSession()
    {
        $formData = session('dentist_form_data');
        // dd('checkout', $formData);

        abort_unless(isset($formData['user_id']), 403, 'Invalid session data. Please try again.');

        $user = User::find($formData['user_id']);
        // dd($user);
        try {
            $checkoutUrl = $this->stripeService->createCheckoutSession($formData);
            session()->put('user_id', $user->id);
            return redirect()->away($checkoutUrl);

        } catch (\Throwable $e) {
            \App\Services\StripeExceptionService::handle($e, $user, [
                'transaction_id' => null,
                'amount' => $formData['price'] ?? 0.00,
                'currency' => $formData['currency'] ?? 'EUR',
                'subscription_id' => null,
                'invoice_id' => null,
            ]);

            return back()->withErrors(['stripe_error' => 'Checkout initialization failed: ' . $e->getMessage()]);
        }
    }

    public function checkoutSuccess(Request $request)
    {
        return $this->stripeService->checkoutSuccess($request);
        // return redirect()->route('dentist.register')->with('success', 'Your payment was successful. You can now log in.');
    }

    public function checkoutCancel(Request $request)
    {
        dd($request, "cansel hogae");
        $formData = session('dentist_form_data');
        $user = null;

        if (isset($formData['user_id'])) {
            $user = User::find($formData['user_id']);
        }

        try {
            $this->stripeService->handleCancelledCheckout($formData, $user);

            return redirect()->route('dentist.register')->withErrors([
                'cancelled' => 'Your payment was cancelled. Please try again or contact support.',
            ]);

        } catch (\Throwable $e) {
            \App\Services\StripeExceptionService::handle($e, $user, [
                'transaction_id' => null,
                'amount' => $formData['price'] ?? 0.00,
                'currency' => $formData['currency'] ?? 'EUR',
                'subscription_id' => null,
                'invoice_id' => null,
            ]);

            return redirect()->route('dentist.register')->withErrors([
                'stripe_error' => 'Something went wrong during cancellation: ' . $e->getMessage(),
            ]);
        }
    }

}



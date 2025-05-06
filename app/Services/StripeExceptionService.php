<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\PaymentLog;
use Throwable;
use Stripe\Exception\CardException;
use Stripe\Exception\ApiErrorException;

class StripeExceptionService
{
    public static function handle(Throwable $e, $user = null, array $context = []): void
    {
        $userId = $user?->id;
        $ip = request()->ip();
        $userAgent = request()->userAgent();

        $stripeErrorDetails = [];

        // Handle specific Stripe exception details
        if ($e instanceof CardException) {
            $error = $e->getError();
            $stripeErrorDetails = [
                'stripe_code'      => $error->code ?? null,
                'decline_code'     => $error->decline_code ?? null,
                'risk_level'       => data_get($error, 'payment_intent.charges.data.0.outcome.risk_level'),
                'network_status'   => data_get($error, 'payment_intent.charges.data.0.outcome.network_status'),
                'reason'           => data_get($error, 'payment_intent.charges.data.0.outcome.reason'),
                'card_checks'      => data_get($error, 'payment_intent.charges.data.0.payment_method_details.card.checks'),
            ];
        }

        $logData = [
            'message'          => $e->getMessage(),
            'user_id'          => $userId,
            'exception_class'  => get_class($e),
            'file'             => $e->getFile(),
            'line'             => $e->getLine(),
            'trace'            => $e->getTraceAsString(),
            'context'          => $context,
            'ip'               => $ip,
            'user_agent'       => $userAgent,
            'stripe_details'   => $stripeErrorDetails,
        ];

        Log::error('Stripe Exception:', $logData);

        try {
            PaymentLog::create([
                'transaction_id'         => $context['transaction_id'] ?? null,
                'payment_gateway'        => 'stripe',
                'amount'                 => $context['amount'] ?? 0.00,
                'currency'               => $context['currency'] ?? 'EUR',
                'payment_method'         => null,
                'payment_method_details' => null,
                'user_id'                => $userId,
                'invoice_id'             => $context['invoice_id'] ?? null,
                'subscription_id'        => $context['subscription_id'] ?? null,
                'status'                 => 'failed',
                'paid_at'                => null,
                'failed_at'              => now(),
                'gateway_response'       => json_encode(array_merge(['error' => $e->getMessage()], $stripeErrorDetails)),
                'gateway_status'         => 'exception',
                'failure_reason'         => substr($e->getMessage(), 0, 250),
                'metadata'               => json_encode($context),
                'ip_address'             => $ip,
                'user_agent'             => $userAgent,
            ]);
        } catch (Throwable $logError) {
            Log::critical('Failed to log Stripe exception to payment_logs: ' . $logError->getMessage());
        }
    }

}


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->id();

            // Payment identification
            $table->string('transaction_id')->unique()->comment('Unique payment gateway transaction ID');
            $table->string('payment_gateway')->comment('e.g. stripe, paypal, razorpay');
            // Payment details
            $table->decimal('amount', 10, 2)->comment('Payment amount');
            $table->string('currency', 3)->default('EUR')->comment('Currency code');
            $table->string('payment_method')->nullable()->comment('card, bank_transfer, etc.');
            $table->string('payment_method_details')->nullable()->comment('JSON with payment method details');

            // Related entities
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('invoice_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('subscription_id')->nullable()->constrained()->onDelete('set null');

            // Status and timestamps
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending')->comment('Payment status');
            $table->timestamp('paid_at')->nullable()->comment('When payment was completed');
            $table->timestamp('failed_at')->nullable()->comment('When payment failed');

            // Gateway response data
            $table->json('gateway_response')->nullable()->comment('Raw response from payment gateway');
            $table->string('gateway_status')->nullable()->comment('Status from payment gateway');
            $table->string('failure_reason')->nullable()->comment('Reason for payment failure');

            // Metadata
            $table->json('metadata')->nullable()->comment('Additional payment metadata');
            $table->string('ip_address')->nullable()->comment('Customer IP address');
            $table->string('user_agent')->nullable()->comment('Customer user agent');

            // Audit timestamps
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('transaction_id');
            $table->index('user_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('payment_logs');
    }
};

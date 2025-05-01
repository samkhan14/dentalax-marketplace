<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\Product;
use Stripe\Price;
use App\Models\Plan;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
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
}

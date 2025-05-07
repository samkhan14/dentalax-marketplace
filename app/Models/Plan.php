<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_monthly',
        'price_yearly',
        'features',
        'is_default',
        'is_active',
        'price_tag',
        'stripe_product_id',
        'stripe_price_monthly',
        'stripe_price_yearly',

    ];

    protected $casts = [
        'features' => 'array',
        'is_default' => 'boolean',
        'is_active' => 'boolean'
    ];


}

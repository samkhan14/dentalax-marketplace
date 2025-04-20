<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_monthly',
        'price_yearly',
        'features',
        'is_default',
        'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_default' => 'boolean',
        'is_active' => 'boolean'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLog extends Model
{
    use SoftDeletes;

    protected $casts = [
        'gateway_response' => 'array',
        'payment_method_details' => 'array',
        'metadata' => 'array',
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'failed_at' => 'datetime',
    ];

    protected $fillable = [
        'transaction_id',
        'reference_id',
        'payment_gateway',
        'amount',
        'currency',
        'status',
        // include all other fillable fields
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}

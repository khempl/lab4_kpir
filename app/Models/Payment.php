<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    protected $fillable = ['payment_registry_id', 'payer_name', 'amount', 'payment_date', 'status'];

    public function registry(): BelongsTo
    {
        return $this->belongsTo(PaymentRegistry::class, 'payment_registry_id');
    }

    public function receipt(): HasOne
    {
        return $this->hasOne(Receipt::class);
    }
}
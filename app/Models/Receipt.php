<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receipt extends Model
{
    protected $fillable = ['payment_id', 'external_id', 'fiscal_sign', 'status', 'fiscalized_at'];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
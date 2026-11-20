<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentRegistry extends Model
{
    protected $fillable = ['name', 'registry_date', 'status'];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
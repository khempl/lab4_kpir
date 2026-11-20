<?php

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;

class PaymentRepository
{
    public function all(): Collection
    {
        return Payment::all();
    }

    public function find(int $id): ?Payment
    {
        return Payment::find($id);
    }

    public function getByStatus(string $status): Collection
    {
        return Payment::where('status', $status)->get();
    }

    public function create(array $data): Payment
    {
        return Payment::create($data);
    }

    public function update(int $id, array $data): ?Payment
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return null;
        }
        $payment->update($data);
        return $payment;
    }

    public function delete(int $id): bool
    {
        return Payment::destroy($id) > 0;
    }
}
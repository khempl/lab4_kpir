<?php

namespace App\Console\Commands;

use App\Models\PaymentRegistry;
use App\Repositories\PaymentRepository;
use Illuminate\Console\Command;

class TestRepository extends Command
{
    protected $signature = 'repo:test';

    protected $description = 'Проверка методов PaymentRepository';

    public function handle(PaymentRepository $repo)
    {
        $registry = PaymentRegistry::create([
            'name' => 'Реестр за ноябрь',
            'registry_date' => '2026-11-14',
        ]);

        $payment = $repo->create([
            'payment_registry_id' => $registry->id,
            'payer_name' => 'Иванов И.И.',
            'amount' => 1500.50,
            'payment_date' => '2026-11-14',
        ]);
        $this->info("Создан платёж #{$payment->id}");

        $this->info('Всего платежей: ' . $repo->all()->count());
        $this->info('Ожидают фискализации: ' . $repo->getByStatus('pending')->count());

        $repo->update($payment->id, ['status' => 'fiscalized']);
        $this->info('Новый статус: ' . $repo->find($payment->id)->status);

        $repo->delete($payment->id);
        $this->info('Платежей после удаления: ' . $repo->all()->count());
    }
}
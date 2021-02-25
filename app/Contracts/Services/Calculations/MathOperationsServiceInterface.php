<?php

declare(strict_types=1);

namespace App\Contracts\Services\Calculations;

interface MathOperationsServiceInterface
{
    public function convertAmountToKopecks(float $amount): int;

    public function calculateCommission(int $amount): float;

    public function withdrawCommissionBanknotes(int $amount): float;

    public function getAmountWithCommission(int $amount): float;

    public function convertToBanknotes($amountInKopecks): float;
}

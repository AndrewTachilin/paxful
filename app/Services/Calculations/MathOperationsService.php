<?php

declare(strict_types=1);

namespace App\Services\Calculations;


use App\Contracts\Services\Calculations\MathOperationsServiceInterface;

class MathOperationsService implements MathOperationsServiceInterface
{
    private CONST PERCENT = '100';

    private CONST COMMISSION = '0.015';

    public function convertAmountToKopecks(float $amount): int
    {
        $amount = bcmul((string) $amount, self::PERCENT);
        return (int) ceil($amount);
    }

    public function calculateCommission(int $amount): float
    {
        return (int) bcmul((string) $amount, (string) self::COMMISSION);
    }

    public function withdrawCommissionBanknotes(int $amount): float
    {
        $totalAmountInKopecks =  $this->calculateCommission($amount);

        return $this->convertToBanknotes($totalAmountInKopecks);
    }

    public function getAmountWithCommission(int $amount): float
    {
        $commission = $this->calculateCommission($amount);

        $totalAmountInKopecks =  (int) bcsub((string) $amount, (string) $commission);

        return $this->convertToBanknotes($totalAmountInKopecks);
    }

    public function convertToBanknotes($amountInKopecks): float
    {
        return (float) bcdiv((string) $amountInKopecks, self::PERCENT,3);
    }
}

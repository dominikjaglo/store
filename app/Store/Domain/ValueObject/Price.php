<?php

declare(strict_types=1);

namespace App\Store\Domain\ValueObject;

class Price
{
    private float $amount;

    private Currency $currency;

    private function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency
    }

    public static function create(float $amount, Currency $currency): self
    {
        if (false === $this->isPositiveAmount($amount)) {
            throw new ValidationException('Price amount must be greater than zero.');
        }

        return new static($amount, $currency);
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }
}

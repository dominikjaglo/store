<?php

declare(strict_types=1);

namespace App\Store\Domain\ValueObject;

class Currency
{
    private string $isoCode;

    public function __construct(string $isoCode)
    {
        $this->isoCode = $isoCode;
    }

    public function toString(): string
    {
        return $this->isoCode;
    }
}

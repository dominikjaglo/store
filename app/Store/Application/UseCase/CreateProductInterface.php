<?php

declare(strict_types=1);

namespace App\Store\Application\UseCase;

interface CreateProductInterface
{
    public function create(string $name, float $priceAmount, string $priceCurrency): ?Product;
}

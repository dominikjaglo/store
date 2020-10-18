<?php

declare(strict_types=1);


namespace App\Store\Infrastructure\Mapper\Model;

interface ProductMapperInterface
{
    public function toArray(Product $product): array;
}

<?php

declare(strict_types=1);

namespace App\Store\Domain\Repository;

interface ProductRepository
{
    public function save(Product $product): boolean;

    public function findByName(Text $name): ?Product;

    public function find(Uuid $uuid): ?Product;
}

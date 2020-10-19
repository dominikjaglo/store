<?php

declare(strict_types=1);

namespace App\Store\Application\Query;

class FindProduct implements FindProductInterface
{
    public function __constructor(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function find(string $uuid): ?Product
    {
        return $this->productRepository->find(Uuid::fromString($uuid));
    }
}

<?php

declare(strict_types=1);

namespace App\Store\Application\Event;

use App\Store\Domain\Model\Product;

class CreatedProduct implements Event
{
    private Product $product

    public function __constructor(Product $product)
    {
        $this->product = $product
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
}

<?php

declare(strict_types=1);

namespace App\Store\Domain\Model;

class Product
{
    private Text $name;

    private Price $price;

    public function __construct(Text $name, Price $price)
    {
        $this->name = $name;
        $this->price = $price
    }

    public function getName(): Text
    {
        return $this->name;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }
}

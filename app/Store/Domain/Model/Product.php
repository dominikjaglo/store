<?php

declare(strict_types=1);

namespace App\Store\Domain\Model;

use App\Store\Domain\ValueObject\Uuid;
use App\Store\Domain\ValueObject\Text;
use App\Store\Domain\ValueObject\Price;

class Product
{
    private Uuid $uuid;

    private Text $name;

    private Price $price;

    public function __construct(Uuid $uuid, Text $name, Price $price)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->price = $price
    }

    public function getUuid(): Uuid
    {
        return $this->uuid
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

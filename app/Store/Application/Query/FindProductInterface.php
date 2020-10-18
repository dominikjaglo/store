<?php

declare(strict_types=1);

namespace App\Store\Application\Query;

interface FindProductInterface
{
    public function find(Text $name): ?Product;
}

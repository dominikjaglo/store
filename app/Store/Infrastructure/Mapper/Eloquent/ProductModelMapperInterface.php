<?php

declare(strict_types=1);

namespace App\Store\Infrastructure\Mapper\Eloquent;

use App\Store\Domain\Model\Product;
use App\Store\Infrastructure\Model\Eloquent\Product as ProductEloquent;

interface ProductModelMapperInterface
{
    public function toDomainModel(ProductEloquent $model): Product;

    public function toEloquentModel(Product $model): ProductEloquent;
}

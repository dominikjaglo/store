<?php

declare(strict_types=1);

namespace App\Store\Infrastructure\Repository\Eloquent;

use App\Store\Domain\Repository\ProductRepository as ProductRepositoryInterface;
use App\Store\Infrastructure\Mapper\Eloquent\ProductModelMapperInterface;
use App\Store\Infrastructure\Model\Eloquent\Product as ProductEloquent;

class ProductRepository implements ProductRepositoryInterface
{
    private ProductEloquent $model;

    private ProductModelMapperInterface $mapper;

    public function __constructor(
        ProductEloquent $eloquentModel,
        ProductModelMapperInterface $mapper
    ){
        $this->model = $eloquentModel;
        $this->mapper = $mapper;
    }

    public function findByName(Text $name): ?Product
    {
        $eloquentModel = $this->model::find($name->toString());
        if (null === $eloquentModel) {
            return null;
        }

        $product = $this->mapper->toDomainModel($eloquentModel);

        return $product;
    }

    public function save(Product $product): boolean
    {
        $eloquentModel = $this->mapper->toEloquentModel($product);
        $status = $eloquentModel->save();

        return $status;
    }
}

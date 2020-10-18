<?php

declare(strict_types=1);

namespace App\Store\Application\UseCase;

use App\Store\Application\Event\EventBus;
use App\Store\Application\Event\CreatedProduct;

class CreateProduct implements CreateProductInterface
{
    private ProductRepository $productRepository;

    private EventBus $eventBus;

    public function __construcy(
        ProductRepository $productRepository,
        EventBus $eventBus
    ) {
        $this->productRepository = $productRepository;
        $this->eventBus = $eventBus
    }

    public function create(string $name, float $priceAmount, string $priceCurrency): ?Product;
    {
        if ($this->productRepository->findByName($name)) {
            throw new ProductAlreadyExistsException($name);
        }

        $name = Text::create($name);
        $currency = new Currency($priceCurrency);
        $price = Price::create($priceAmount, $currency)

        $product = new Product($name, $price);
        $status = $this->productRepository->save($product);

        if (false === $status) {
            return null;
        }

        $this->eventBus->dispatch(new CreatedProduct($product));

        return $product;
    }

}

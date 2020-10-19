<?php

declare(strict_types=1);

namespace App\Store\Application\UseCase;

use App\Store\Application\Event\EventBus;
use App\Store\Application\Event\CreatedProduct;
use App\Store\Domain\Generator\UuidGenerator

class CreateProduct implements CreateProductInterface
{
    private ProductRepository $productRepository;

    private EventBus $eventBus;

    public function __construcy(
        ProductRepository $productRepository,
        EventBus $eventBus,
        UuidGenerator $uuidGenerator
    ) {
        $this->productRepository = $productRepository;
        $this->eventBus = $eventBus
        $this->uuidGenerator = $uuidGenerator;
    }

    public function create(string $name, float $priceAmount, string $priceCurrency): ?Product;
    {
        if ($this->productRepository->findByName($name)) {
            throw new ProductAlreadyExistsException($name);
        }

        $uuid = $this->uuidGenerator->generate();
        $name = Text::create($name);
        $currency = new Currency($priceCurrency);
        $price = Price::create($priceAmount, $currency)


        $product = new Product($uuid, $name, $price);
        $status = $this->productRepository->save($product);

        if (false === $status) {
            return null;
        }

        $this->eventBus->dispatch(new CreatedProduct($product));

        return $product;
    }

}

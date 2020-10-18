<?php

declare(strict_types=1);

namespace App\Store\Infrastructure\UserInterface\Http\Api;

use App\Http\Controllers\Controller;
use App\Store\Application\UseCase\CreateProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private CreateProductInterface $createProduct;

    private FindProductInterface $findProductQuery;

    private ProductMapperInterface $productMapper;

    public function __construct(
        CreateProductInterface $createProduct,
        FindProductInterface $findProductQuery,
        ProductMapperInterface $productMapper
    ) {
        $this->createProduct = $createProduct;
        $this->findProductQuery = $findProductQuery;
        $this->productMapper = $productMapper;
    }

    public function post(Request $request): Response
    {
        /**
         * Laravel catches ValidationException and returns json response with errors.
         * Response code is 422. So this is valid RESTful code
         */
        $data = $request->validate([
            'name' => 'required|unique:products',
            'price_amount' => 'required|numeric|min:0',
            'price_currency' => 'required|HERE_SHOULD_BE_CUSTOM_VALIDATOR_FOR_CURRENCY_ISO_CODES',
        ]);

        $product = $this->createProduct->create(
            $data['name'],
            $data['price_amount'],
            $data['price_currency']
        );

        if (null === $product) {
            return response()->json(['Validation message to be described', 422]);
        }

        return response()
            ->withHeaders([
                'Location' => "/products/{$product->getName()->toString()}"
            ])
            ->json([], 201);
    }

    public function get(string $name, Request $request): Response
    {
        $product = $this->findProductQuery->find(Text::create($name));
        if ($product) {
            $mappedProduct = $this->productMapper->toArray($product)
            return response()->json($mappedProduct, 200);
        }

        return $response()->json([], 404);
    }
}

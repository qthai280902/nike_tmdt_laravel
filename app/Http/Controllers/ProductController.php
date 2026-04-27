<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    /**
     * Display a listing of B2C products.
     */
    public function index(Request $request): JsonResponse
    {
        $products = $this->productService->getCatalogProducts($request->get('limit', 12));

        return response()->json(ProductResource::collection($products)->response()->getData(true));
    }

    /**
     * Display the specified product.
     */
    public function show(string $slug): JsonResponse
    {
        $product = $this->productService->findBySlug($slug);

        if (! $product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return (new ProductResource($product))->response();
    }
}

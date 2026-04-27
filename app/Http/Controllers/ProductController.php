<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    /**
     * Display a listing of B2C products.
     */
    public function index(Request $request): JsonResponse|View
    {
        $products = $this->productService->getCatalogProducts($request->all(), $request->get('limit', 12));

        if ($request->expectsJson()) {
            return response()->json(ProductResource::collection($products)->response()->getData(true));
        }

        $categories = Category::all();

        return view('catalog.index', compact('products', 'categories'));
    }

    /**
     * Display the specified product.
     */
    public function show(Request $request, string $slug): JsonResponse|View
    {
        $product = $this->productService->findBySlug($slug);

        if (! $product) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Product not found'], 404);
            }
            abort(404);
        }

        if ($request->expectsJson()) {
            return (new ProductResource($product))->response();
        }

        return view('catalog.show', compact('product'));
    }
}

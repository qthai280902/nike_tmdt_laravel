<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * Get paginated products for the B2C catalog.
     */
    public function getCatalogProducts(int $perPage = 12): LengthAwarePaginator
    {
        return Product::with(['category', 'variants'])
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Get products by category slug.
     */
    public function getProductsByCategory(string $categorySlug, int $perPage = 12): LengthAwarePaginator
    {
        return Product::whereHas('category', function ($query) use ($categorySlug) {
            $query->where('slug', $categorySlug);
        })
            ->with(['category', 'variants'])
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Find a single product by slug with its variants.
     */
    public function findBySlug(string $slug): ?Product
    {
        return Product::where('slug', $slug)
            ->with(['category', 'variants'])
            ->first();
    }

    /**
     * Check if a product variant has stock.
     */
    public function checkStock(string $variantId, int $quantity = 1): bool
    {
        $product = Product::whereHas('variants', function ($query) use ($variantId, $quantity) {
            $query->where('id', $variantId)->where('stock', '>=', $quantity);
        })->exists();

        return $product;
    }
}

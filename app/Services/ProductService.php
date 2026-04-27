<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
    /**
     * Get paginated products with filtering and sorting for the B2C catalog.
     */
    public function getCatalogProducts(array $filters = [], int $perPage = 12): LengthAwarePaginator
    {
        $query = Product::with(['category', 'variants']);

        // Filter by Category Slug
        if (! empty($filters['category'])) {
            $query->whereHas('category', function (Builder $q) use ($filters) {
                $q->where('slug', $filters['category']);
            });
        }

        // Filter by Size
        if (! empty($filters['size'])) {
            $query->whereHas('variants', function (Builder $q) use ($filters) {
                $q->where('size', $filters['size'])->where('stock', '>', 0);
            });
        }

        // Filter by Color
        if (! empty($filters['color'])) {
            $query->whereHas('variants', function (Builder $q) use ($filters) {
                $q->where('color', $filters['color']);
            });
        }

        // Sorting
        $sort = $filters['sort'] ?? 'latest';
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            default => $query->latest(),
        };

        return $query->paginate($perPage);
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
        return Product::whereHas('variants', function ($query) use ($variantId, $quantity) {
            $query->where('id', $variantId)->where('stock', '>=', $quantity);
        })->exists();
    }
}

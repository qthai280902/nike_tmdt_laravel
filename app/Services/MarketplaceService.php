<?php

namespace App\Services;

use App\Models\MarketplaceListing;
use App\Models\Product;
use Illuminate\Support\Collection;

class MarketplaceService
{
    /**
     * Get active listings with their variants and products.
     */
    public function getActiveListings()
    {
        return MarketplaceListing::active()
            ->with(['user', 'variant.product.category'])
            ->latest()
            ->paginate(12);
    }

    /**
     * Create a new marketplace listing.
     */
    public function createListing(array $data, $userId): MarketplaceListing
    {
        return MarketplaceListing::create([
            'user_id' => $userId,
            'product_variant_id' => $data['product_variant_id'],
            'asking_price' => $data['asking_price'],
            'condition' => $data['condition'],
            'seller_description' => $data['seller_description'],
            'status' => 'pending', // Awaiting admin approval
        ]);
    }

    /**
     * Search B2C products for the "Sell Item" flow.
     */
    public function searchProducts(string $query): Collection
    {
        return Product::where('name', 'like', "%{$query}%")
            ->with('variants')
            ->limit(5)
            ->get();
    }
}

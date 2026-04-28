<?php

namespace App\Http\Controllers;

use App\Services\MarketplaceService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarketplaceController extends Controller
{
    public function __construct(
        protected MarketplaceService $marketplaceService
    ) {}

    /**
     * Display the Marketplace feed.
     */
    public function index(): View
    {
        $listings = $this->marketplaceService->getActiveListings();

        return view('marketplace.index', compact('listings'));
    }

    /**
     * Show the form to create a new listing.
     */
    public function create(): View
    {
        return view('marketplace.create');
    }

    /**
     * Store a new listing.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'asking_price' => 'required|numeric|min:0',
            'condition' => 'required|in:new_with_box,like_new,good,fair',
            'seller_description' => 'nullable|string|max:1000',
        ]);

        $this->marketplaceService->createListing($validated, auth()->id());

        return redirect()->route('marketplace.index')
            ->with('success', 'Tin đăng của bạn đã được gửi và đang chờ kiểm duyệt.');
    }

    /**
     * AJAX search for products.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        if (! $query) {
            return response()->json([]);
        }

        $products = $this->marketplaceService->searchProducts($query);

        return response()->json($products);
    }
}

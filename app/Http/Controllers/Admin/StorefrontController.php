<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    /**
     * Display a listing of products to manage storefront.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.storefront.index', compact('products'));
    }

    /**
     * Update the featured position of a product.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'featured_position' => 'nullable|in:hero,secondary'
        ]);

        // If setting as hero, remove existing hero
        if ($request->featured_position === 'hero') {
            Product::where('featured_position', 'hero')->update(['featured_position' => null]);
        }

        $product->update([
            'featured_position' => $request->featured_position
        ]);

        return redirect()->back()->with('success', 'Storefront updated for ' . $product->name);
    }
}

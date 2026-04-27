<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Add a product variant to the cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);
        $variantId = $request->variant_id;
        $variant = ProductVariant::with('product')->find($variantId);

        if (isset($cart[$variantId])) {
            $cart[$variantId]['quantity'] += $request->quantity;
        } else {
            $cart[$variantId] = [
                'name' => $variant->product->name,
                'quantity' => $request->quantity,
                'price' => $variant->product->price,
                'size' => $variant->size,
                'color' => $variant->color,
                'image' => $variant->product->image_url,
                'slug' => $variant->product->slug
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to bag!');
    }
}

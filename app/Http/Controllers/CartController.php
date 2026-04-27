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

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to bag!',
                'cart_count' => count($cart)
            ]);
        }

        return redirect()->back()->with('success', 'Product added to bag!');
    }

    /**
     * Remove an item from the cart.
     */
    public function remove(Request $request)
    {
        $request->validate([
            'variant_id' => 'required'
        ]);

        $cart = session()->get('cart', []);
        
        if (isset($cart[$request->variant_id])) {
            unset($cart[$request->variant_id]);
            session()->put('cart', $cart);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'cart_count' => count($cart)
            ]);
        }

        return redirect()->back();
    }

    /**
     * Return the cart items HTML fragment for dynamic update.
     */
    public function fragment()
    {
        return view('components.cart-items-fragment');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Toggle a product in the user's wishlist.
     */
    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $user = Auth::user();
        $productId = $request->product_id;

        $exists = $user->wishlistProducts()->where('product_id', $productId)->exists();

        if ($exists) {
            $user->wishlistProducts()->detach($productId);
            $status = 'removed';
        } else {
            $user->wishlistProducts()->attach($productId);
            $status = 'added';
        }

        return response()->json([
            'status' => $status,
            'message' => $status === 'added' ? 'Đã thêm vào danh sách yêu thích' : 'Đã xóa khỏi danh sách yêu thích',
        ]);
    }
}

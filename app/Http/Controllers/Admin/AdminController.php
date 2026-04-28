<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarketplaceListing;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the Admin Dashboard.
     */
    public function index(): View
    {
        return view('admin.dashboard');
    }

    /**
     * List pending marketplace listings.
     */
    public function marketplaceIndex(): View
    {
        $listings = MarketplaceListing::where('status', 'pending')
            ->with(['user', 'variant.product'])
            ->latest()
            ->paginate(15);

        return view('admin.marketplace.index', compact('listings'));
    }

    /**
     * Approve or reject a listing.
     */
    public function updateListingStatus(MarketplaceListing $listing, string $status)
    {
        if (! in_array($status, ['active', 'rejected'])) {
            return back()->with('error', 'Trạng thái không hợp lệ.');
        }

        $listing->update(['status' => $status]);

        return back()->with('success', 'Đã cập nhật trạng thái tin đăng.');
    }
}

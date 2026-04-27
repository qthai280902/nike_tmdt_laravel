<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the dynamic dynamic storefront.
     */
    public function index(): View
    {
        $heroProduct = Product::where('featured_position', 'hero')->first();
        
        $secondaryProducts = Product::where('featured_position', 'secondary')
            ->with('category')
            ->take(3)
            ->get();

        return view('welcome', compact('heroProduct', 'secondaryProducts'));
    }
}

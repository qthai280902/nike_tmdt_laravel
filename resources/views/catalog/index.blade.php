<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nike Catalog | All Products</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="selection:bg-nike-black selection:text-white">
        {{-- Navigation (Reused or Componentized) --}}
        <nav class="sticky top-0 z-50 bg-white border-b border-nike-gray-200">
            <div class="max-w-[1920px] mx-auto px-6 md:px-12 h-16 flex items-center justify-between">
                <a href="/" class="flex-shrink-0">
                    <svg class="w-16 h-16 fill-nike-black" viewBox="0 0 24 24"><path d="M21 8.75c0 0-4.5 6-12.5 6s-6.5-2-6.5-2 1.5 4 7.5 4 11.5-8 11.5-8z"/></svg>
                </a>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="font-nike-body font-medium text-nike-black uppercase">Men</a>
                    <a href="#" class="font-nike-body font-medium text-nike-black uppercase">Women</a>
                    <a href="#" class="font-nike-body font-medium text-nike-black uppercase">Kids</a>
                </div>
                <div class="flex items-center space-x-6">
                    <button class="text-nike-black"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg></button>
                </div>
            </div>
        </nav>

        <main class="max-w-[1920px] mx-auto px-6 md:px-12 py-12">
            <div class="flex flex-col md:flex-row gap-12">
                {{-- Sidebar Filters --}}
                <aside class="w-full md:w-64 flex-shrink-0">
                    <h1 class="text-2xl font-nike-display uppercase mb-8">All Shoes ({{ $products->total() }})</h1>
                    <div class="space-y-8">
                        <div>
                            <h3 class="font-nike-body font-medium mb-4 uppercase text-sm tracking-wider">Sort By</h3>
                            <select onchange="window.location.href='?sort='+this.value" class="w-full bg-nike-gray-100 rounded-lg p-2 border-none">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low-High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High-Low</option>
                            </select>
                        </div>

                        <div>
                            <h3 class="font-nike-body font-medium mb-4 uppercase text-sm tracking-wider">Size</h3>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['US 7', 'US 8', 'US 9', 'US 10', 'US 11', 'US 12'] as $size)
                                    <a href="?size={{ $size }}" class="border border-nike-gray-200 py-2 text-center rounded-md hover:border-nike-black transition-colors {{ request('size') == $size ? 'bg-nike-black text-white' : '' }}">
                                        {{ str_replace('US ', '', $size) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>

                {{-- Product Grid --}}
                <div class="flex-grow">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach($products as $product)
                            <a href="{{ route('catalog.show', $product->slug) }}" class="group block">
                                <div class="aspect-square bg-nike-gray-100 overflow-hidden mb-4 relative">
                                    {{-- Realistic image mock --}}
                                    <div class="w-full h-full flex items-center justify-center bg-nike-gray-100 text-nike-gray-300 font-nike-display text-2xl px-6 text-center">
                                        {{ $product->name }}
                                    </div>
                                    @if($product->price > 150)
                                        <div class="absolute top-4 left-4 bg-white px-3 py-1 text-xs font-nike-body font-medium uppercase">Sustainable Materials</div>
                                    @endif
                                </div>
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-nike-body font-medium text-nike-black group-hover:text-nike-gray-500 transition-colors">{{ $product->name }}</h3>
                                        <p class="text-nike-gray-500 text-sm">{{ $product->category->name }}</p>
                                    </div>
                                    <p class="font-nike-body font-medium text-nike-black">${{ number_format($product->price, 2) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-24 flex justify-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-nike-black text-white py-12 px-6 md:px-12 mt-24">
             {{-- ... Same footer as welcome or layout ... --}}
             <p class="text-xs text-nike-gray-500 text-center">&copy; 2026 Nike Hybrid, Inc. All Rights Reserved</p>
        </footer>
    </body>
</html>

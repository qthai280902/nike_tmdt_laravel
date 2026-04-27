@extends('layouts.app')

@section('title', 'Nike Catalog | All Products')

@section('content')
<div class="max-w-[1920px] mx-auto px-6 md:px-12 py-12">
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
                            <a href="?size={{ urlencode($size) }}" class="border border-nike-gray-200 py-2 text-center rounded-md hover:border-nike-black transition-colors {{ request('size') == $size ? 'bg-nike-black text-white' : '' }}">
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
                            <div class="w-full h-full flex items-center justify-center bg-nike-gray-100 text-nike-gray-300 font-nike-display text-2xl px-6 text-center">
                                {{ $product->name }}
                            </div>
                            @if($product->price > 150)
                                <div class="absolute top-4 left-4 bg-white px-3 py-1 text-xs font-nike-body font-medium uppercase">Podium Selection</div>
                            @endif
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-nike-body font-medium text-nike-black group-hover:text-nike-gray-500 transition-colors uppercase leading-tight">{{ $product->name }}</h3>
                                <p class="text-nike-gray-500 text-sm italic">{{ $product->category->name }}</p>
                            </div>
                            <p class="font-nike-body font-medium text-nike-black">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-24">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

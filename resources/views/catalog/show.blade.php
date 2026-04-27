<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $product->name }} | Nike Hybrid</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="selection:bg-nike-black selection:text-white">
        <nav class="bg-white border-b border-nike-gray-200">
            <div class="max-w-[1920px] mx-auto px-6 md:px-12 h-16 flex items-center justify-between">
                <a href="/" class="flex-shrink-0"><svg class="w-16 h-16 fill-nike-black" viewBox="0 0 24 24"><path d="M21 8.75c0 0-4.5 6-12.5 6s-6.5-2-6.5-2 1.5 4 7.5 4 11.5-8 11.5-8z"/></svg></a>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('products.index') }}" class="font-nike-body font-medium uppercase text-sm">Back to Catalog</a>
                </div>
            </div>
        </nav>

        <main class="max-w-[1920px] mx-auto min-h-screen">
            <div class="flex flex-col lg:flex-row">
                {{-- Left: Full-bleed Image Gallery --}}
                <div class="w-full lg:w-[60%] bg-nike-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1 px-1">
                        <div class="aspect-square bg-nike-gray-200 flex items-center justify-center text-nike-gray-400 font-nike-display text-4xl uppercase">Image 1</div>
                        <div class="aspect-square bg-nike-gray-200 flex items-center justify-center text-nike-gray-400 font-nike-display text-4xl uppercase">Image 2</div>
                        <div class="aspect-square bg-nike-gray-200 flex items-center justify-center text-nike-gray-400 font-nike-display text-4xl uppercase">Image 3</div>
                        <div class="aspect-square bg-nike-gray-200 flex items-center justify-center text-nike-gray-400 font-nike-display text-4xl uppercase">Image 4</div>
                    </div>
                </div>

                {{-- Right: Sticky Product Info --}}
                <div class="w-full lg:w-[40%] px-6 md:px-12 py-12 lg:sticky lg:top-16 lg:h-screen overflow-y-auto">
                    <div class="max-w-md">
                        <h1 class="text-3xl font-nike-display uppercase mb-2">{{ $product->name }}</h1>
                        <p class="font-nike-body font-medium text-lg mb-8">${{ number_format($product->price, 2) }}</p>

                        <div class="mb-12">
                            <h3 class="font-nike-body font-medium mb-4 uppercase text-sm tracking-wider">Select Size</h3>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach($product->variants->unique('size') as $variant)
                                    <button class="border border-nike-gray-200 py-4 rounded-md hover:border-nike-black transition-all font-nike-body font-medium {{ $variant->stock == 0 ? 'opacity-30 cursor-not-allowed bg-nike-gray-100' : '' }}">
                                        {{ str_replace('US ', '', $variant->size) }}
                                    </button>
                                @endforeach
                            </div>
                            <p class="mt-4 text-xs text-nike-gray-500 font-nike-body">Size Guide</p>
                        </div>

                        <div class="space-y-4 mb-12">
                            <x-pill-button class="w-full py-5 text-lg">Add to Bag</x-pill-button>
                            <x-pill-button variant="secondary" class="w-full py-5 text-lg">Favorite <span class="ml-2">♡</span></x-pill-button>
                        </div>

                        <div class="border-t border-nike-gray-200 pt-8">
                            <p class="font-nike-body leading-relaxed text-nike-black mb-8">
                                {{ $product->description }}
                            </p>
                            <ul class="list-disc pl-5 font-nike-body text-sm space-y-2 text-nike-gray-500">
                                <li>Shown: {{ $product->variants->first()->color ?? 'Classic' }}</li>
                                <li>Style: {{ $product->variants->first()->sku ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-nike-black text-white py-12 px-6 md:px-12 mt-24">
             <p class="text-xs text-nike-gray-500 text-center">&copy; 2026 Nike Hybrid, Inc. All Rights Reserved</p>
        </footer>
    </body>
</html>

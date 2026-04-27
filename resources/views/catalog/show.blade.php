@extends('layouts.app')

@section('title', $product->name . ' | Nike Hybrid')

@section('content')
<section class="max-w-[1920px] mx-auto px-6 md:px-12 py-12">
    <div class="flex flex-col lg:flex-row gap-16">
        {{-- Image Gallery --}}
        <div class="w-full lg:w-2/3 space-y-4">
            <div class="aspect-square bg-nike-gray-100 flex items-center justify-center text-nike-gray-300 font-nike-display text-6xl">
                {{ $product->name }}
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="aspect-square bg-nike-gray-100"></div>
                <div class="aspect-square bg-nike-gray-100"></div>
            </div>
        </div>

        {{-- Product Info --}}
        <div class="w-full lg:w-1/3">
            <div class="sticky top-28">
                <h1 class="text-3xl font-nike-display uppercase leading-tight mb-2">{{ $product->name }}</h1>
                <p class="text-nike-gray-500 font-nike-body mb-6">{{ $product->category->name }}</p>
                <p class="text-xl font-nike-body font-medium mb-12">${{ number_format($product->price, 2) }}</p>

                {{-- Sizing --}}
                <div class="mb-12">
                    <div class="flex justify-between items-center mb-4">
                        <span class="font-nike-body font-medium uppercase text-sm">Select Size</span>
                        <a href="#" class="text-nike-gray-500 text-sm underline">Size Guide</a>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach($product->variants as $variant)
                            <button 
                                onclick="selectVariant('{{ $variant->id }}')"
                                id="variant-btn-{{ $variant->id }}"
                                class="variant-selector-btn border border-nike-gray-200 py-3 rounded-md font-nike-body hover:border-nike-black transition-colors"
                            >
                                {{ str_replace('US ', '', $variant->size) }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="space-y-3">
                    <x-pill-button 
                        onclick="handleAddToCart()"
                        class="w-full py-5 text-lg"
                    >
                        Add to Bag
                    </x-pill-button>
                    <button class="w-full py-5 border border-nike-gray-200 rounded-full font-nike-body font-medium flex items-center justify-center hover:border-nike-black">
                        Favourite
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                </div>

                <div class="mt-12 prose prose-sm font-nike-body text-nike-gray-500 leading-relaxed">
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let selectedVariantId = null;

    function selectVariant(id) {
        selectedVariantId = id;
        document.querySelectorAll('.variant-selector-btn').forEach(btn => {
            btn.classList.remove('border-nike-black', 'bg-nike-black', 'text-white');
        });
        document.getElementById('variant-btn-' + id).classList.add('border-nike-black', 'bg-nike-black', 'text-white');
    }

    function handleAddToCart() {
        if (!selectedVariantId) {
            alert('Please select a size first.');
            return;
        }
        // Gọi hàm từ component cart-drawer
        addToCart(selectedVariantId);
    }
</script>
@endsection

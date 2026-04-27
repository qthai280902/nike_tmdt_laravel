@extends('layouts.app')

@section('title', 'Nike Hybrid | Feel the Future')

@section('content')
    {{-- Hero Section (Full-bleed, Dynamic Content) --}}
    @if($heroProduct)
    <div class="relative min-h-[90vh] flex items-center overflow-hidden bg-nike-black">
        {{-- Background Image --}}
        <img src="{{ $heroProduct->image_url }}" class="absolute inset-0 w-full h-full object-cover opacity-80" alt="{{ $heroProduct->name }}">
        
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

        <div class="relative z-10 px-6 md:px-12 max-w-[1920px] mx-auto w-full">
            <div class="max-w-3xl">
                <p class="font-medium text-white mb-4 uppercase tracking-widest animate-[fade-in-up_0.6s_forwards]">{{ $heroProduct->category->name ?? 'New Arrival' }}</p>
                <h1 class="text-nike-hero text-white mb-8 animate-[fade-in-up_0.8s_forwards_0.2s]">{{ $heroProduct->name }}</h1>
                <p class="text-white/80 font-nike-body text-xl mb-10 max-w-xl animate-[fade-in-up_1s_forwards_0.3s]">
                    {{ Str::limit($heroProduct->description, 120) }}
                </p>
                <div class="flex space-x-3 animate-[fade-in-up_1.2s_forwards_0.4s]">
                    <x-pill-button href="{{ route('catalog.show', $heroProduct->slug) }}" class="py-4 px-10 bg-white text-nike-black hover:bg-nike-gray-200">Shop Now</x-pill-button>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Secondary Section: Featured Products (Dynamic Gaps) --}}
    <section class="py-24 px-6 md:px-12 max-w-[1920px] mx-auto">
        <div class="flex justify-between items-end mb-12">
            <h2 class="text-nike-section">The Latest & Greatest</h2>
            <x-pill-button href="{{ route('catalog.index') }}" class="bg-transparent text-nike-black border border-nike-gray-300 hover:bg-nike-gray-100">Shop All</x-pill-button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            @foreach($secondaryProducts as $product)
                <div class="group cursor-pointer">
                    <a href="{{ route('catalog.show', $product->slug) }}">
                        <div class="aspect-square bg-nike-gray-100 overflow-hidden mb-6 no-border-radius">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="flex justify-between items-start">
                            <div class="space-y-1">
                                <h3 class="font-medium text-nike-black uppercase text-sm group-hover:text-nike-gray-500 transition-colors">{{ $product->name }}</h3>
                                <p class="text-nike-gray-500 text-sm italic">{{ $product->category->name }}</p>
                            </div>
                            <span class="text-sm font-medium">${{ number_format($product->price, 0) }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <style>
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection

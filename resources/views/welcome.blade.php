@extends('layouts.app')

@section('title', 'Nike Hybrid | Feel the Future')

@section('content')
    {{-- Hero Section (Full-bleed, 96px Headline) --}}
    <div class="relative bg-nike-gray-100 min-h-[80vh] flex items-center overflow-hidden">
        {{-- Background Imagery Simulation (Principle 1) --}}
        <div class="absolute inset-0 bg-nike-gray-100 flex items-center justify-center">
            <div class="w-full h-full flex items-center justify-center text-nike-gray-200 font-nike-display text-[20vw] opacity-50 uppercase tracking-tighter leading-none select-none">
                NIKE AIR
            </div>
        </div>
        
        <div class="relative z-10 px-6 md:px-12 max-w-[1920px] mx-auto w-full">
            <div class="max-w-2xl">
                <p class="font-medium text-nike-black mb-4 uppercase translate-y-4 opacity-0 animate-[fade-in-up_0.6s_forwards]">Nike Air Max Pulse</p>
                <h1 class="text-nike-hero mb-8 translate-y-4 opacity-0 animate-[fade-in-up_0.8s_forwards_0.2s]">Feel the Future.</h1>
                <div class="flex space-x-3 translate-y-4 opacity-0 animate-[fade-in-up_1s_forwards_0.4s]">
                    <x-pill-button href="{{ route('catalog.index') }}" class="py-4 px-8">Shop Now</x-pill-button>
                    <x-pill-button href="{{ route('catalog.index') }}" class="py-4 px-8 border border-nike-gray-300 bg-white text-nike-black hover:bg-nike-gray-100">Browse Features</x-pill-button>
                </div>
            </div>
        </div>
    </div>

    {{-- Secondary Section: Athletic Discipline Grid (4-12px Gaps) --}}
    <section class="py-24 px-6 md:px-12 max-w-[1920px] mx-auto">
        <div class="flex justify-between items-end mb-12">
            <h2 class="text-nike-section">New Arrivals</h2>
            <div class="flex space-x-2">
                <button class="p-4 bg-nike-gray-100 rounded-full hover:bg-nike-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button class="p-4 bg-nike-gray-100 rounded-full hover:bg-nike-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>

        {{-- Tight Grid: No border radius on imagery (Rule 4) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
            @for ($i = 1; $i <= 3; $i++)
                <div class="group cursor-pointer">
                    <div class="aspect-square bg-nike-gray-100 flex items-center justify-center relative overflow-hidden mb-4 no-border-radius">
                        <span class="text-nike-gray-300 font-nike-display text-4xl">PODIUM {{ $i }}</span>
                        <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div class="space-y-1">
                            <h3 class="font-medium text-nike-black uppercase text-sm">Nike Style Exclusive</h3>
                            <p class="text-nike-gray-500 text-sm italic">Men's Lifestyle</p>
                        </div>
                        <span class="text-sm font-medium">$160</span>
                    </div>
                </div>
            @endfor
        </div>
    </section>

    <style>
        @keyframes fade-in-up {
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection

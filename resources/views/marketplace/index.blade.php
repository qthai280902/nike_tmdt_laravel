@extends('layouts.app')

@section('title', 'Chợ đồ cũ | Nike Hybrid')

@section('content')
<section class="max-w-[1920px] mx-auto px-6 md:px-12 py-12">
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
        <div class="max-w-2xl">
            <h1 class="text-nike-hero leading-none tracking-tighter mb-6">Marketplace.</h1>
            <p class="text-nike-gray-500 font-medium text-lg">Chợ dành cho cộng đồng Nike. Đăng bán và tìm mua những đôi giày hiếm từ những người dùng khác.</p>
        </div>
        <div class="flex-shrink-0">
            <a href="{{ route('marketplace.create') }}" class="inline-block bg-nike-black text-white px-10 py-5 rounded-full font-bold uppercase text-xs tracking-widest hover:bg-nike-gray-800 transition-all">
                Đăng bán ngay
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-nike-snow border border-nike-gray-100 p-6 mb-12 flex items-center animate-pulse">
            <div class="w-2 h-2 bg-green-500 rounded-full mr-4"></div>
            <p class="text-xs font-bold uppercase tracking-widest">{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-16">
        @forelse($listings as $listing)
            <div class="group">
                <div class="aspect-square bg-nike-gray-100 mb-6 overflow-hidden relative">
                    <img src="{{ $listing->variant->product->image_url }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="">
                    
                    {{-- Condition Badge --}}
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-md text-nike-black px-3 py-1.5 text-[9px] font-black uppercase tracking-[0.2em] shadow-sm">
                            {{ $listing->condition_label }}
                        </span>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-nike-black uppercase text-sm tracking-tight leading-tight">
                            {{ $listing->variant->product->name }}
                        </h3>
                        <span class="font-black text-sm tracking-tighter">{{ number_format($listing->asking_price, 0, ',', '.') }}₫</span>
                    </div>
                    
                    <p class="text-nike-gray-500 text-[11px] font-medium uppercase tracking-tight">
                        Size: {{ $listing->variant->size }} | Màu: {{ $listing->variant->color }}
                    </p>
                    
                    <div class="pt-4 border-t border-nike-gray-100 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-nike-gray-200 rounded-full flex items-center justify-center text-[8px] font-black mr-2">
                                {{ strtoupper(substr($listing->user->name, 0, 1)) }}
                            </div>
                            <span class="text-[10px] font-bold text-nike-gray-400 uppercase tracking-widest">{{ $listing->user->name }}</span>
                        </div>
                        <a href="#" class="text-[10px] font-black uppercase underline tracking-widest hover:text-nike-gray-400">Chi tiết</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-32 text-center border-2 border-dashed border-nike-gray-100">
                <p class="text-nike-gray-400 font-bold uppercase tracking-[0.3em] text-xs">Hiện chưa có tin đăng nào.</p>
                <a href="{{ route('marketplace.create') }}" class="mt-8 inline-block text-nike-black font-black uppercase underline text-sm">Hãy là người đầu tiên đăng bán</a>
            </div>
        @endforelse
    </div>

    <div class="mt-24">
        {{ $listings->links() }}
    </div>
</section>
@endsection

@extends('layouts.admin')

@section('page_title', 'Quản lý Trưng bày (Storefront)')

@section('admin_content')
<div class="space-y-8">
    {{-- Alerts --}}
    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/20 text-green-500 px-6 py-4 rounded-xl flex items-center">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Products Table Card --}}
    <div class="type-card rounded-xl overflow-hidden">
        <div class="p-6 border-b border-zinc-800 flex justify-between items-center">
            <h3 class="font-bold">Danh sách sản phẩm</h3>
            <p class="text-xs text-zinc-500">Cấu hình vị trí hiển thị trên trang chủ</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-zinc-900/50 text-zinc-500 uppercase text-[10px] tracking-widest">
                    <tr>
                        <th class="px-6 py-4 font-medium">Sản phẩm</th>
                        <th class="px-6 py-4 font-medium">Danh mục</th>
                        <th class="px-6 py-4 font-medium">Vị trí hiện tại</th>
                        <th class="px-6 py-4 font-medium text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @foreach($products as $product)
                    <tr class="hover:bg-zinc-900/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-zinc-800 rounded overflow-hidden flex-shrink-0">
                                    <img src="{{ $product->image_url }}" class="w-full h-full object-cover" alt="{{ $product->name }}">
                                </div>
                                <span class="font-medium text-white">{{ $product->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-zinc-400 uppercase text-[10px] font-bold tracking-tight">
                            {{ $product->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            @if($product->featured_position)
                                <span class="px-3 py-1 rounded-full bg-white text-black text-[9px] font-black uppercase tracking-widest">
                                    {{ $product->featured_position }}
                                </span>
                            @else
                                <span class="text-zinc-600 text-xs uppercase tracking-widest text-[9px] font-bold">Trống</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('admin.storefront.update', $product->id) }}" method="POST" class="flex justify-end items-center">
                                @csrf
                                @method('PATCH')
                                <div class="relative">
                                    <select name="featured_position" onchange="this.form.submit()" 
                                        class="appearance-none bg-zinc-900 border border-zinc-800 text-zinc-300 text-[11px] font-bold uppercase tracking-widest rounded-lg pl-4 pr-10 py-2 focus:ring-1 focus:ring-white focus:border-white cursor-pointer transition-all">
                                        <option value="">Gỡ bỏ</option>
                                        <option value="hero" {{ $product->featured_position == 'hero' ? 'selected' : '' }}>Hero (Chính)</option>
                                        <option value="secondary" {{ $product->featured_position == 'secondary' ? 'selected' : '' }}>Secondary (Phụ)</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-zinc-500">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Admin | Storefront Management')

@section('content')
<section class="max-w-[1920px] mx-auto px-6 md:px-12 py-12">
    <h1 class="text-nike-hero mb-12">Storefront.</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white border border-nike-gray-200">
        <table class="w-full text-left font-nike-body border-collapse">
            <thead>
                <tr class="bg-nike-gray-100 uppercase text-xs tracking-wider border-b border-nike-gray-200">
                    <th class="px-6 py-4 font-medium">Product</th>
                    <th class="px-6 py-4 font-medium">Category</th>
                    <th class="px-6 py-4 font-medium">Current Position</th>
                    <th class="px-6 py-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-nike-gray-200">
                @foreach($products as $product)
                <tr class="hover:bg-nike-snow transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            <img src="{{ $product->image_url }}" class="w-12 h-12 object-cover" alt="">
                            <span class="font-medium">{{ $product->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-nike-gray-500 uppercase text-xs">{{ $product->category->name }}</td>
                    <td class="px-6 py-4">
                        @if($product->featured_position)
                            <span class="bg-nike-black text-white px-3 py-1 rounded-full text-[10px] uppercase font-bold tracking-widest">
                                {{ $product->featured_position }}
                            </span>
                        @else
                            <span class="text-nike-gray-300 text-xs italic">none</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <form action="{{ route('admin.storefront.update', $product->id) }}" method="POST" class="flex justify-end space-x-2">
                            @csrf
                            @method('PATCH')
                            <select name="featured_position" onchange="this.form.submit()" class="text-xs bg-nike-gray-100 border-none rounded-lg p-2 focus:ring-1 focus:ring-nike-black">
                                <option value="">Remove</option>
                                <option value="hero" {{ $product->featured_position == 'hero' ? 'selected' : '' }}>Set as Hero</option>
                                <option value="secondary" {{ $product->featured_position == 'secondary' ? 'selected' : '' }}>Set as Secondary</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Nike Hybrid')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="selection:bg-nike-black selection:text-white overflow-x-hidden">
        {{-- Promotional Banner (Principle 4) --}}
        <div class="bg-nike-black text-white text-[12px] font-medium py-2 px-4 text-center uppercase tracking-wide">
            Free Shipping for Members. Join Us.
        </div>

        {{-- Desktop Navigation (60px height) --}}
        <nav class="sticky top-0 z-50 bg-white border-b border-nike-gray-200">
            <div class="max-w-[1920px] mx-auto px-6 md:px-12 h-[60px] flex items-center justify-between">
                {{-- Logo Swoosh --}}
                <a href="/" class="flex-shrink-0">
                    <svg class="w-14 h-14 fill-nike-black" viewBox="0 0 24 24"><path d="M21 8.75c0 0-4.5 6-12.5 6s-6.5-2-6.5-2 1.5 4 7.5 4 11.5-8 11.5-8z"/></svg>
                </a>

                {{-- Center Links (Rule 4) --}}
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('catalog.index') }}" class="text-[16px] font-medium text-nike-black hover:text-nike-gray-500 uppercase">All Products</a>
                    <a href="{{ route('catalog.index', ['category' => 'men']) }}" class="text-[16px] font-medium text-nike-black hover:text-nike-gray-500 uppercase">Men</a>
                    <a href="{{ route('catalog.index', ['category' => 'women']) }}" class="text-[16px] font-medium text-nike-black hover:text-nike-gray-500 uppercase">Women</a>
                    <a href="{{ route('catalog.index', ['category' => 'kids']) }}" class="text-[16px] font-medium text-nike-black hover:text-nike-gray-500 uppercase">Kids</a>
                    <a href="{{ route('catalog.index', ['sort' => 'price_asc']) }}" class="text-[16px] font-medium text-nike-red hover:text-red-700 uppercase">Sale</a>
                </div>

                {{-- Right Interaction Cluster --}}
                <div class="flex items-center space-x-4">
                    {{-- Search (24px radius, #F5F5F5) --}}
                    <div class="hidden lg:flex relative group">
                        <input type="text" placeholder="Search" class="bg-nike-gray-100 rounded-[24px] px-4 py-2 pl-10 border-none focus:ring-1 focus:ring-nike-black w-40 hover:bg-nike-gray-200 transition-all font-medium text-sm">
                        <svg class="w-5 h-5 absolute left-3 top-2 text-nike-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    {{-- Auth Toggles --}}
                    @guest
                        <a href="{{ route('login') }}" class="text-sm font-medium uppercase hover:text-nike-gray-500">Sign In</a>
                    @else
                        <a href="{{ route('profile.index') }}" class="hover:text-nike-gray-500 uppercase text-xs font-medium">Account</a>
                    @endguest

                    <button onclick="toggleCart()" class="relative text-nike-black group">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        <span id="cart-count-badge" class="hidden absolute -top-1 -right-1 bg-nike-red text-white text-[8px] px-1.5 rounded-full font-bold">0</span>
                    </button>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <x-cart-drawer />

        <footer class="bg-nike-black text-white py-12 px-6 md:px-12 mt-24">
            <div class="max-w-[1920px] mx-auto text-xs text-nike-gray-500 flex justify-between items-center border-t border-nike-gray-800 pt-8">
                <p>&copy; 2026 Nike Hybrid, Inc. All Rights Reserved</p>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-white uppercase">Guides</a>
                    <a href="#" class="hover:text-white uppercase">Terms of Sale</a>
                    <a href="#" class="hover:text-white uppercase">Terms of Use</a>
                    <a href="#" class="hover:text-white uppercase">Privacy Policy</a>
                </div>
            </div>
        </footer>
    </body>
</html>

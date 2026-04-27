<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Nike Hybrid')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="selection:bg-nike-black selection:text-white">
        {{-- Navigation --}}
        <nav class="sticky top-0 z-50 bg-white border-b border-nike-gray-200">
            <div class="max-w-[1920px] mx-auto px-6 md:px-12 h-16 flex items-center justify-between">
                <a href="/" class="flex-shrink-0">
                    <svg class="w-16 h-16 fill-nike-black" viewBox="0 0 24 24"><path d="M21 8.75c0 0-4.5 6-12.5 6s-6.5-2-6.5-2 1.5 4 7.5 4 11.5-8 11.5-8z"/></svg>
                </a>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('products.index') }}" class="font-nike-body font-medium text-nike-black hover:text-nike-gray-500 uppercase">Catalog</a>
                    @guest
                        <a href="{{ route('login') }}" class="font-nike-body font-medium text-nike-black hover:text-nike-gray-500 uppercase">Sign In</a>
                    @else
                        <a href="#" class="font-nike-body font-medium text-nike-black hover:text-nike-gray-500 uppercase">Account</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="font-nike-body font-medium text-nike-black hover:text-nike-gray-500 uppercase uppercase">Logout</button>
                        </form>
                    @endguest
                </div>
                <div class="flex items-center space-x-6">
                    <button class="text-nike-black hover:text-nike-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                    <button onclick="toggleCart()" class="text-nike-black hover:text-nike-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </button>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <x-cart-drawer />

        <footer class="bg-nike-black text-white py-12 px-6 md:px-12 mt-24">
            <div class="max-w-[1920px] mx-auto flex flex-col md:flex-row justify-between text-xs text-nike-gray-500">
                <p>&copy; 2026 Nike Hybrid, Inc. All Rights Reserved</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#">Terms of Use</a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
        </footer>
    </body>
</html>

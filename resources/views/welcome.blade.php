<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nike Hybrid | Feel the Future</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="selection:bg-nike-black selection:text-white">
        {{-- Navigation --}}
        <nav class="sticky top-0 z-50 bg-white border-b border-nike-gray-200">
            <div class="max-w-[1920px] mx-auto px-6 md:px-12 h-16 flex items-center justify-between">
                {{-- Logo --}}
                <div class="flex-shrink-0">
                    <svg class="w-16 h-16 fill-nike-black" viewBox="0 0 24 24">
                        <path d="M21 8.75c0 0-4.5 6-12.5 6s-6.5-2-6.5-2 1.5 4 7.5 4 11.5-8 11.5-8z"/>
                    </svg>
                </div>

                {{-- Center Links --}}
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="font-nike-body font-medium text-nike-black hover:text-nike-gray-500 uppercase">New & Featured</a>
                    <a href="#" class="font-nike-body font-medium text-nike-black hover:text-nike-gray-500 uppercase">Men</a>
                    <a href="#" class="font-nike-body font-medium text-nike-black hover:text-nike-gray-500 uppercase">Women</a>
                    <a href="#" class="font-nike-body font-medium text-nike-black hover:text-nike-gray-500 uppercase">Kids</a>
                    <a href="#" class="font-nike-body font-medium text-nike-red hover:text-red-700 uppercase">Sale</a>
                </div>

                {{-- Right Icons --}}
                <div class="flex items-center space-x-6">
                    <div class="hidden lg:block relative">
                        <input type="text" placeholder="Search" class="bg-nike-gray-100 rounded-full px-4 py-2 pl-10 border-none focus:ring-1 focus:ring-nike-black w-48 transition-all duration-300">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-nike-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <button class="text-nike-black hover:text-nike-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                    <button class="text-nike-black hover:text-nike-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </button>
                </div>
            </div>
        </nav>

        {{-- Main Content --}}
        <main>
            {{-- Hero Section --}}
            <x-hero-banner 
                :image="asset('images/hero.png')" 
                title="FEEL THE FUTURE." 
                subtitle="Nike Air Max Pulse"
                ctaText="Shop Now"
                ctaHref="#"
            />

            {{-- Secondary Section: Clean Product Reveal --}}
            <section class="py-24 px-6 md:px-12 max-w-[1920px] mx-auto">
                <div class="flex justify-between items-end mb-12">
                    <h2 class="text-display-section uppercase">New Arrivals</h2>
                    <div class="flex space-x-2">
                        <button class="p-4 bg-nike-gray-100 rounded-full hover:bg-nike-gray-200"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>
                        <button class="p-4 bg-nike-gray-100 rounded-full hover:bg-nike-gray-200"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>
                    </div>
                </div>

                {{-- Placeholder Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @final_mockup_items
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="group cursor-pointer">
                            <div class="aspect-square bg-nike-gray-100 overflow-hidden mb-4">
                                <div class="w-full h-full flex items-center justify-center text-nike-gray-300 font-nike-display text-4xl">PRODUCT {{ $i }}</div>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-nike-body font-medium text-nike-black">Nike Air Max Dn</h3>
                                    <p class="text-nike-gray-500">Unisex Shoes</p>
                                </div>
                                <div class="font-nike-body font-medium text-nike-black font-semibold">
                                    $160
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </section>
        </main>

        <footer class="bg-nike-black text-white py-12 px-6 md:px-12 mt-24">
            <div class="max-w-[1920px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <h4 class="font-nike-display text-lg mb-6 tracking-wider">Resources</h4>
                    <ul class="space-y-4 text-nike-gray-300 font-nike-body text-sm">
                        <li><a href="#" class="hover:text-white uppercase">Gift Cards</a></li>
                        <li><a href="#" class="hover:text-white uppercase">Find a Store</a></li>
                        <li><a href="#" class="hover:text-white uppercase">Membership</a></li>
                        <li><a href="#" class="hover:text-white uppercase">Site Feedback</a></li>
                    </ul>
                </div>
                {{-- More links... --}}
            </div>
            <div class="max-w-[1920px] mx-auto mt-12 pt-12 border-t border-nike-gray-500 flex flex-col md:flex-row justify-between text-xs text-nike-gray-500">
                <p>&copy; 2026 Nike Hybrid, Inc. All Rights Reserved</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#">Guides</a>
                    <a href="#">Terms of Sale</a>
                    <a href="#">Terms of Use</a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
        </footer>
    </body>
</html>

@extends('layouts.app')

@section('title', 'Checkout | Nike Hybrid')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-nike-display uppercase mb-12">Checkout</h1>

    <form action="#" method="POST" class="flex flex-col lg:flex-row gap-16">
        @csrf
        {{-- Shipping Details --}}
        <div class="flex-grow space-y-8">
            <div>
                <h2 class="text-xl font-nike-display uppercase mb-6">Shipping Address</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="name" placeholder="Full Name" class="bg-nike-gray-100 rounded-lg p-4 border-none col-span-2">
                    <input type="email" name="email" placeholder="Email" class="bg-nike-gray-100 rounded-lg p-4 border-none">
                    <input type="text" name="phone" placeholder="Phone Number" class="bg-nike-gray-100 rounded-lg p-4 border-none">
                    <textarea name="address" placeholder="Residential Address" class="bg-nike-gray-100 rounded-lg p-4 border-none col-span-2 h-32"></textarea>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-nike-display uppercase mb-6">Payment Method</h2>
                <div class="space-y-3">
                    <label class="flex items-center p-4 bg-nike-gray-100 rounded-lg cursor-pointer border border-transparent hover:border-nike-black transition-all">
                        <input type="radio" name="payment_method" value="cod" checked class="w-5 h-5 mr-4 accent-nike-black">
                        <span class="font-nike-body">Cash on Delivery (COD)</span>
                    </label>
                    <label class="flex items-center p-4 bg-nike-gray-100 rounded-lg opacity-50 cursor-not-allowed">
                        <input type="radio" name="payment_method" value="stripe" disabled class="w-5 h-5 mr-4">
                        <span class="font-nike-body">Credit/Debit Card (Coming Soon)</span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Order Summary --}}
        <div class="w-full lg:w-[400px] flex-shrink-0">
            <div class="bg-nike-snow p-8 rounded-2xl sticky top-24">
                <h2 class="text-xl font-nike-display uppercase mb-8">Summary</h2>
                <div class="space-y-4 mb-8">
                    <div class="flex justify-between text-sm font-nike-body text-nike-gray-500">
                        <span>Subtotal</span>
                        <span>$0.00</span>
                    </div>
                    <div class="flex justify-between text-sm font-nike-body text-nike-gray-500">
                        <span>Estimated Shipping & Handling</span>
                        <span>Free</span>
                    </div>
                    <div class="flex justify-between pt-4 border-t border-nike-gray-200 font-nike-body font-medium">
                        <span>Total</span>
                        <span>$0.00</span>
                    </div>
                </div>
                
                <x-pill-button class="w-full py-5 text-lg">Place Order</x-pill-button>
                
                <p class="mt-6 text-xs text-nike-gray-500 leading-relaxed">
                    By placing your order, you agree to Nike's Terms of Use and Privacy Policy. All orders are subject to availability.
                </p>
            </div>
        </div>
    </form>
</section>
@endsection

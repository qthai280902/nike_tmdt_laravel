<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Join Us | Nike Hybrid</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white flex items-center justify-center min-h-screen p-8">
        <div class="w-full max-w-sm">
            <div class="text-center mb-10">
                <svg class="w-16 h-16 fill-nike-black mx-auto mb-8" viewBox="0 0 24 24"><path d="M21 8.75c0 0-4.5 6-12.5 6s-6.5-2-6.5-2 1.5 4 7.5 4 11.5-8 11.5-8z"/></svg>
                <h2 class="text-3xl font-nike-display uppercase">Become a Nike Member</h2>
                <p class="text-nike-gray-500 font-nike-body mt-4">Create your Nike Member profile and get first access to the very best of Nike products, inspiration and community.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Full Name" required class="w-full bg-transparent border border-nike-gray-200 py-3 px-4 rounded-md focus:border-nike-black focus:outline-none font-nike-body">
                <input type="email" name="email" placeholder="Email Address" required class="w-full bg-transparent border border-nike-gray-200 py-3 px-4 rounded-md focus:border-nike-black focus:outline-none font-nike-body">
                <input type="password" name="password" placeholder="Password" required class="w-full bg-transparent border border-nike-gray-200 py-3 px-4 rounded-md focus:border-nike-black focus:outline-none font-nike-body">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full bg-transparent border border-nike-gray-200 py-3 px-4 rounded-md focus:border-nike-black focus:outline-none font-nike-body">
                
                <p class="text-[10px] text-nike-gray-500 text-center leading-relaxed py-4 px-2">
                    By creating an account, you agree to Nike's <a href="#" class="underline">Privacy Policy</a> and <a href="#" class="underline">Terms of Use</a>.
                </p>

                <x-pill-button type="submit" class="w-full py-4 text-center">Join Us</x-pill-button>
            </form>

            <p class="mt-8 text-sm text-nike-gray-500 font-nike-body text-center">
                Already a member? <a href="{{ route('login') }}" class="text-nike-black font-medium underline">Sign In.</a>
            </p>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Nike Hybrid</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white">
        <div class="flex min-h-screen">
            {{-- Left Side: Branding/Image --}}
            <div class="hidden lg:flex w-1/2 bg-nike-black items-center justify-center p-24">
                <div class="max-w-md">
                    <svg class="w-32 h-32 fill-white mb-12" viewBox="0 0 24 24"><path d="M21 8.75c0 0-4.5 6-12.5 6s-6.5-2-6.5-2 1.5 4 7.5 4 11.5-8 11.5-8z"/></svg>
                    <h1 class="text-6xl font-nike-display text-white uppercase leading-tight mb-8">It's better as a member.</h1>
                    <p class="text-nike-gray-500 font-nike-body text-lg">Move, shop, and celebrate with the best of Nike.</p>
                </div>
            </div>

            {{-- Right Side: Form --}}
            <div class="w-full lg:w-1/2 flex items-center justify-center p-8 md:p-24">
                <div class="w-full max-w-sm">
                    <h2 class="text-3xl font-nike-display uppercase mb-10">Enter your email to join us or sign in.</h2>
                    
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <div>
                            <input type="email" name="email" placeholder="Email" required autofocus class="w-full bg-transparent border-b border-nike-gray-200 py-4 focus:border-nike-black focus:outline-none font-nike-body transition-colors">
                            @error('email') <p class="text-nike-red text-xs mt-2">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
                            <input type="password" name="password" placeholder="Password" required class="w-full bg-transparent border-b border-nike-gray-200 py-4 focus:border-nike-black focus:outline-none font-nike-body transition-colors">
                        </div>

                        <div class="flex items-center justify-between text-xs text-nike-gray-500 font-nike-body">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember" class="mr-2 accent-nike-black"> Keep me signed in
                            </label>
                            <a href="#" class="underline">Forgot password?</a>
                        </div>

                        <p class="text-[10px] text-nike-gray-500 leading-relaxed py-4">
                            By continuing, I agree to Nike's <a href="#" class="underline">Privacy Policy</a> and <a href="#" class="underline">Terms of Use</a>.
                        </p>

                        <x-pill-button type="submit" class="w-full py-4 text-center">Sign In</x-pill-button>
                    </form>

                    <p class="mt-12 text-sm text-nike-gray-500 font-nike-body text-center">
                        Not a member? <a href="{{ route('register') }}" class="text-nike-black font-medium underline">Join Us.</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>

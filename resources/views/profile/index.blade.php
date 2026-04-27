@extends('layouts.app')

@section('title', 'Member Profile | Nike Hybrid')

@section('content')
<section class="max-w-[1920px] mx-auto px-6 md:px-12 py-24">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-nike-hero mb-16">Profile.</h1>

        <div class="space-y-12">
            {{-- Account Details --}}
            <div class="border-b border-nike-gray-200 pb-12">
                <h2 class="text-nike-section mb-8">Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-nike-body">
                    <div>
                        <p class="text-nike-gray-500 uppercase text-xs mb-1">Full Name</p>
                        <p class="text-lg font-medium">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="text-nike-gray-500 uppercase text-xs mb-1">Email Address</p>
                        <p class="text-lg font-medium">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="text-nike-gray-500 uppercase text-xs mb-1">Account Role</p>
                        <p class="text-lg font-medium uppercase">{{ $user->role }}</p>
                    </div>
                    <div>
                        <p class="text-nike-gray-500 uppercase text-xs mb-1">Member Since</p>
                        <p class="text-lg font-medium">{{ $user->created_at->format('M Y') }}</p>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <x-pill-button class="bg-white text-nike-black border border-nike-gray-300 hover:bg-nike-gray-100">
                    Edit Profile
                </x-pill-button>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-pill-button type="submit" class="bg-nike-red hover:bg-red-700">
                        Log Out
                    </x-pill-button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

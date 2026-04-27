@extends('layouts.app')

@section('title', 'Hồ sơ thành viên | Nike Hybrid')

@section('content')
<section class="max-w-[1920px] mx-auto px-6 md:px-12 py-24">
    <div class="max-w-3xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
            <h1 class="text-nike-hero tracking-tighter">Hồ sơ.</h1>
            <p class="text-nike-gray-400 font-black text-2xl uppercase italic tracking-tighter">{{ $user->display_id }}</p>
        </div>

        <div class="space-y-12">
            {{-- Account Details --}}
            <div class="border-b border-nike-gray-200 pb-12">
                <h2 class="text-3xl font-bold uppercase mb-8 italic">Thông tin chi tiết</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-nike-body">
                    <div>
                        <p class="text-nike-gray-500 uppercase text-[10px] font-bold tracking-widest mb-1">Họ và Tên</p>
                        <p class="text-lg font-medium">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="text-nike-gray-500 uppercase text-[10px] font-bold tracking-widest mb-1">Địa chỉ Email</p>
                        <p class="text-lg font-medium">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="text-nike-gray-500 uppercase text-[10px] font-bold tracking-widest mb-1">Vai trò tài khoản</p>
                        <p class="text-lg font-medium uppercase font-bold text-nike-red italic">{{ $user->role }}</p>
                    </div>
                    <div>
                        <p class="text-nike-gray-500 uppercase text-[10px] font-bold tracking-widest mb-1">Thành viên từ</p>
                        <p class="text-lg font-medium">{{ $user->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <x-pill-button class="bg-white text-nike-black border border-nike-gray-300 hover:bg-nike-gray-100 py-4 px-8 uppercase font-bold text-xs tracking-widest">
                    Chỉnh sửa hồ sơ
                </x-pill-button>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-pill-button type="submit" class="bg-nike-red text-white hover:bg-red-800 py-4 px-8 uppercase font-bold text-xs tracking-widest">
                        Đăng xuất
                    </x-pill-button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

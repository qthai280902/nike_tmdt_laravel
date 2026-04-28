@extends('layouts.app')

@section('title', 'Tham gia làm thành viên | Nike Hybrid')

@section('content')
<section class="min-h-screen flex items-center justify-center py-24 px-6 bg-white">
    <div class="max-w-[460px] w-full mx-auto">
        {{-- Logo & Header --}}
        <div class="text-center mb-10">
            <svg class="w-16 mx-auto mb-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z"></path>
            </svg>
            <h1 class="text-3xl font-bold uppercase tracking-tighter mb-2 font-nike-display">Trở thành thành viên Nike</h1>
            <p class="text-nike-gray-500 text-sm font-medium font-nike-body">Tạo hồ sơ Nike Member của bạn để nhận quyền truy cập sớm vào các sản phẩm tốt nhất.</p>
        </div>

        {{-- Register Form --}}
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Full Name --}}
            <div>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Họ và Tên" required
                    class="w-full px-4 py-3 border border-nike-gray-200 rounded-md focus:border-nike-black focus:ring-0 transition-colors placeholder:text-nike-gray-400 font-medium">
                @error('name') <p class="text-nike-red text-[11px] mt-1 font-bold  uppercase">{{ $message }}</p> @enderror
            </div>

            {{-- Email --}}
            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Địa chỉ Email" required
                    class="w-full px-4 py-3 border border-nike-gray-200 rounded-md focus:border-nike-black focus:ring-0 transition-colors placeholder:text-nike-gray-400 font-medium">
                @error('email') <p class="text-nike-red text-[11px] mt-1 font-bold  uppercase">{{ $message }}</p> @enderror
            </div>

            {{-- Password --}}
            <div>
                <input type="password" name="password" placeholder="Mật khẩu" required
                    class="w-full px-4 py-3 border border-nike-gray-200 rounded-md focus:border-nike-black focus:ring-0 transition-colors placeholder:text-nike-gray-400 font-medium">
                @error('password') <p class="text-nike-red text-[11px] mt-1 font-bold  uppercase">{{ $message }}</p> @enderror
            </div>

            {{-- Password Confirmation --}}
            <div>
                <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required
                    class="w-full px-4 py-3 border border-nike-gray-200 rounded-md focus:border-nike-black focus:ring-0 transition-colors placeholder:text-nike-gray-400 font-medium">
            </div>

            <div class="text-[12px] text-nike-gray-500 text-center py-4 px-2 leading-relaxed">
                Bằng cách tạo tài khoản, bạn đồng ý với <a href="#" class="underline text-nike-black">Chính sách Bảo mật</a> và <a href="#" class="underline text-nike-black">Điều khoản Sử dụng</a> của Nike.
            </div>

            <button type="submit" class="w-full bg-nike-black text-white py-4 rounded-md font-bold uppercase text-xs tracking-widest hover:bg-nike-gray-800 transition-colors">
                Tham gia ngay
            </button>
        </form>

        <div class="text-center mt-6 text-sm">
            <span class="text-nike-gray-500">Đã là thành viên?</span>
            <a href="{{ route('login') }}" class="text-nike-black font-bold underline ml-1">Đăng nhập.</a>
        </div>
    </div>
</section>
@endsection

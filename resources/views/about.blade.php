@extends('layouts.app')

@section('title', 'Về Chúng Tôi | Nike Hybrid')

@section('content')
<section class="max-w-[1920px] mx-auto">
    {{-- Hero Narrative --}}
    <div class="px-6 md:px-12 py-32 bg-nike-black text-white relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-nike-hero tracking-tighter leading-none mb-16 animate-[fade-in-up_0.8s_forwards]">NIKE HYBRID.</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <p class="text-4xl font-bold uppercase italic tracking-tighter leading-tight animate-[fade-in-up_1s_forwards_0.2s]">
                    Nơi sự chính xác của B2C gặp gỡ di sản của C2C.
                </p>
                <div class="space-y-8 text-nike-gray-400 font-medium leading-relaxed animate-[fade-in-up_1.2s_forwards_0.4s]">
                    <p>Sứ mệnh của chúng tôi là mang những đôi giày Nike chính hãng tốt nhất đến tay mọi người, đồng thời xây dựng một hệ sinh thái bền vững cho cộng đồng Sneakerhead tại Việt Nam.</p>
                    <p>Tại Nike Hybrid, chúng tôi không chỉ bán giày. Chúng tôi kể câu chuyện về văn hóa sát mặt đất, nơi mỗi đôi giày là một di sản, và mỗi bước chân là một hành trình chinh phục.</p>
                </div>
            </div>
        </div>
        {{-- Decorative Swoosh or Graphic could go here --}}
        <div class="absolute bottom-0 right-0 opacity-10 pointer-events-none">
            <svg class="w-[800px] h-auto" viewBox="0 0 24 24" fill="currentColor">
                <path d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z"></path>
            </svg>
        </div>
    </div>

    {{-- Core Values --}}
    <div class="px-6 md:px-12 py-32 bg-white">
        <div class="max-w-4xl">
            <h2 class="text-6xl font-bold lowercase tracking-tighter mb-20">Sứ mệnh cốt lõi.</h2>
            <div class="space-y-24">
                <div class="flex flex-col md:flex-row gap-8 items-start border-l-4 border-nike-black pl-8">
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-nike-gray-400">01</span>
                    <div>
                        <h3 class="text-2xl font-black uppercase mb-4">Uy tín tuyệt đối</h3>
                        <p class="text-nike-gray-500 font-medium leading-relaxed">Chúng tôi cam kết 100% sản phẩm là hàng chính hãng. Mỗi sản phẩm B2C được nhập trực tiếp, và mỗi sản phẩm C2C (sắp ra mắt) sẽ được kiểm định nghiêm ngặt bởi đội ngũ chuyên gia.</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-8 items-start border-l-4 border-nike-black pl-8">
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-nike-gray-400">02</span>
                    <div>
                        <h3 class="text-2xl font-black uppercase mb-4">Cộng đồng Sneakerhead</h3>
                        <p class="text-nike-gray-500 font-medium leading-relaxed">Xây dựng sân chơi lành mạnh cho những người yêu giày. Nơi bạn không chỉ mua sắm, mà còn trao đổi văn hóa, kiến thức và niềm đam mê.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

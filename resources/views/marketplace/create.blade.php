@extends('layouts.app')

@section('title', 'Đăng bán sản phẩm | Nike Marketplace')

@section('content')
<section class="max-w-[1920px] mx-auto px-6 md:px-12 py-16 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto">
        {{-- Header & Stepper --}}
        <div class="mb-16">
            <h1 class="text-5xl md:text-7xl font-black uppercase tracking-tighter mb-8 leading-none">Rao bán<br>Sản phẩm.</h1>
            
            <div class="flex items-center space-x-4">
                <div id="step-dot-1" class="w-12 h-1.5 bg-nike-black transition-all duration-500"></div>
                <div id="step-dot-2" class="w-12 h-1.5 bg-nike-gray-100 transition-all duration-500"></div>
                <div id="step-dot-3" class="w-12 h-1.5 bg-nike-gray-100 transition-all duration-500"></div>
            </div>
        </div>

        <form action="{{ route('marketplace.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            @csrf

            {{-- Left Column: Form Fields --}}
            <div class="lg:col-span-7 space-y-20">
                
                {{-- Step 1: Search --}}
                <div class="space-y-8">
                    <div class="flex items-center space-x-4">
                        <span class="w-8 h-8 rounded-full bg-nike-black text-white flex items-center justify-center font-black text-xs">01</span>
                        <label class="text-xs font-black uppercase tracking-[0.2em] text-nike-black">Chọn mẫu giày từ Catalog</label>
                    </div>
                    
                    <div class="relative" id="search-container">
                        <input type="text" id="product-search" placeholder="Gõ tên giày (VD: Jordan 1, Pegasus...)" autocomplete="off"
                            class="w-full border-b-2 border-nike-gray-100 p-0 py-6 text-2xl font-bold uppercase tracking-tight focus:border-nike-black focus:outline-none transition-all placeholder:text-nike-gray-200">
                        
                        <div id="search-results" class="absolute top-full left-0 right-0 bg-white shadow-2xl z-50 hidden border border-nike-gray-50 mt-2">
                            <!-- AJAX results here -->
                        </div>
                    </div>
                </div>

                {{-- Step 2: Size Selection --}}
                <div id="step-variant-container" class="space-y-8 opacity-20 pointer-events-none transition-all duration-700">
                    <div class="flex items-center space-x-4">
                        <span id="step-num-2" class="w-8 h-8 rounded-full bg-nike-gray-100 text-nike-gray-400 flex items-center justify-center font-black text-xs transition-colors">02</span>
                        <label class="text-xs font-black uppercase tracking-[0.2em] text-nike-black">Chọn Size giày của bạn</label>
                    </div>

                    <div id="variant-grid" class="grid grid-cols-3 sm:grid-cols-5 gap-3">
                        <!-- Sizes injected here -->
                    </div>
                    <input type="hidden" name="product_variant_id" id="variant-input" required>
                </div>

                {{-- Step 3: Listing Details --}}
                <div id="step-details-container" class="space-y-12 opacity-20 pointer-events-none transition-all duration-700">
                    <div class="flex items-center space-x-4">
                        <span id="step-num-3" class="w-8 h-8 rounded-full bg-nike-gray-100 text-nike-gray-400 flex items-center justify-center font-black text-xs transition-colors">03</span>
                        <label class="text-xs font-black uppercase tracking-[0.2em] text-nike-black">Thông tin rao bán</label>
                    </div>

                    <div class="space-y-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black uppercase tracking-widest text-nike-gray-400">Giá bán mong muốn (VNĐ)</label>
                                <input type="number" name="asking_price" placeholder="Ví dụ: 2500000" required
                                    class="w-full border-b border-nike-gray-100 py-4 text-2xl font-black tracking-tighter focus:border-nike-black focus:outline-none transition-all">
                            </div>

                            <div class="space-y-3">
                                <label class="text-[10px] font-black uppercase tracking-widest text-nike-gray-400">Tình trạng giày</label>
                                <select name="condition" required class="w-full border-b border-nike-gray-100 py-5 text-xs font-black uppercase tracking-widest focus:border-nike-black focus:outline-none cursor-pointer">
                                    <option value="new_with_box">Mới (Nguyên hộp)</option>
                                    <option value="like_new">Như mới (99%)</option>
                                    <option value="good">Đã qua sử dụng (Tốt)</option>
                                    <option value="fair">Đã qua sử dụng (Cũ)</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[10px] font-black uppercase tracking-widest text-nike-gray-400">Mô tả thêm (Tùy chọn)</label>
                            <textarea name="seller_description" rows="3" placeholder="Chia sẻ thêm về lịch sử đôi giày..."
                                class="w-full bg-nike-snow p-6 text-sm font-medium focus:ring-1 focus:ring-nike-black focus:outline-none transition-all"></textarea>
                        </div>

                        <button type="submit" class="group w-full bg-nike-black text-white py-6 rounded-full font-black uppercase text-sm tracking-[0.3em] hover:bg-nike-gray-800 transition-all flex items-center justify-center">
                            Đăng tin kiểm duyệt
                            <svg class="w-4 h-4 ml-4 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Right Column: Dynamic Preview --}}
            <div class="lg:col-span-5">
                <div class="sticky top-32">
                    <div id="product-card-preview" class="border border-nike-gray-100 p-8 text-center bg-nike-snow/50 opacity-40 transition-all duration-700">
                        <div id="preview-placeholder" class="py-20 flex flex-col items-center">
                            <svg class="w-16 h-16 text-nike-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-[10px] font-black uppercase tracking-widest text-nike-gray-300">Chưa chọn sản phẩm</p>
                        </div>

                        <div id="preview-content" class="hidden">
                            <div class="aspect-square bg-white mb-8 overflow-hidden">
                                <img id="preview-img" src="" class="w-full h-full object-cover">
                            </div>
                            <h3 id="preview-name" class="text-xl font-black uppercase tracking-tight mb-2"></h3>
                            <p id="preview-variant" class="text-[10px] font-bold text-nike-gray-400 uppercase tracking-widest mb-6"></p>
                            
                            <button type="button" onclick="resetSearch()" class="text-[10px] font-black uppercase tracking-widest border-b-2 border-nike-black pb-1 hover:text-nike-gray-400 hover:border-nike-gray-400 transition-all">
                                Thay đổi mẫu khác
                            </button>
                        </div>
                    </div>
                    
                    <div class="mt-8 p-6 bg-nike-snow rounded-xl border border-nike-gray-100">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-nike-black mt-1 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="text-[11px] font-medium text-nike-gray-500 leading-relaxed">
                                <strong>Lưu ý:</strong> Mọi sản phẩm đăng trên Chợ đều được Admin kiểm duyệt về độ xác thực của thông tin trước khi hiển thị công khai.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    let searchTimeout;
    let currentResults = [];

    const searchInput = document.getElementById('product-search');
    const resultsBox = document.getElementById('search-results');
    const previewContent = document.getElementById('preview-content');
    const previewPlaceholder = document.getElementById('preview-placeholder');
    const productCard = document.getElementById('product-card-preview');
    
    const variantStep = document.getElementById('step-variant-container');
    const detailsStep = document.getElementById('step-details-container');
    const variantGrid = document.getElementById('variant-grid');
    const variantInput = document.getElementById('variant-input');

    const stepDots = [
        document.getElementById('step-dot-1'),
        document.getElementById('step-dot-2'),
        document.getElementById('step-dot-3')
    ];
    const stepNums = [
        null,
        document.getElementById('step-num-2'),
        document.getElementById('step-num-3')
    ];

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        if (query.length < 2) {
            resultsBox.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(async () => {
            const response = await fetch(`{{ route('marketplace.search') }}?q=${encodeURIComponent(query)}`);
            currentResults = await response.json();
            
            if (currentResults.length > 0) {
                resultsBox.innerHTML = currentResults.map((p, index) => `
                    <div onclick="handleProductSelect(${index})" 
                         class="flex items-center p-6 hover:bg-nike-gray-50 cursor-pointer transition-colors border-b border-nike-gray-50 group">
                        <div class="w-16 h-16 bg-nike-snow overflow-hidden mr-6 flex-shrink-0">
                            <img src="${p.image_url}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <h4 class="font-black uppercase text-sm tracking-tight">${p.name}</h4>
                            <p class="text-[10px] text-nike-gray-400 uppercase font-bold tracking-widest">${p.variants.length} Phiên bản có sẵn</p>
                        </div>
                        <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                `).join('');
                resultsBox.classList.remove('hidden');
            } else {
                resultsBox.innerHTML = '<div class="p-8 text-center text-[10px] font-black uppercase tracking-widest text-nike-gray-300">Không tìm thấy sản phẩm</div>';
                resultsBox.classList.remove('hidden');
            }
        }, 300);
    });

    window.handleProductSelect = function(index) {
        const product = currentResults[index];
        resultsBox.classList.add('hidden');
        searchInput.value = product.name;
        
        // Update Preview
        previewPlaceholder.classList.add('hidden');
        previewContent.classList.remove('hidden');
        productCard.classList.remove('opacity-40');
        document.getElementById('preview-img').src = product.image_url;
        document.getElementById('preview-name').innerText = product.name;
        document.getElementById('preview-variant').innerText = "Vui lòng chọn Size";

        // Enable Step 2
        variantStep.classList.remove('opacity-20', 'pointer-events-none');
        stepDots[1].classList.replace('bg-nike-gray-100', 'bg-nike-black');
        stepNums[1].classList.replace('bg-nike-gray-100', 'bg-nike-black');
        stepNums[1].classList.replace('text-nike-gray-400', 'text-white');
        
        // Inject Variants
        variantGrid.innerHTML = product.variants.map(v => `
            <button type="button" onclick="handleVariantSelect('${v.id}', '${v.size}', '${v.color}')" id="v-${v.id}"
                class="variant-item border-2 border-nike-gray-100 py-4 text-xs font-black uppercase tracking-widest hover:border-nike-black transition-all">
                ${v.size}
            </button>
        `).join('');

        variantStep.scrollIntoView({ behavior: 'smooth', block: 'center' });
    };

    window.handleVariantSelect = function(id, size, color) {
        variantInput.value = id;
        
        // Highlight active
        document.querySelectorAll('.variant-item').forEach(el => {
            el.classList.remove('bg-nike-black', 'text-white', 'border-nike-black');
        });
        document.getElementById(`v-${id}`).classList.add('bg-nike-black', 'text-white', 'border-nike-black');

        // Update Preview
        document.getElementById('preview-variant').innerText = `Size: ${size} | Màu: ${color}`;

        // Enable Step 3
        detailsStep.classList.remove('opacity-20', 'pointer-events-none');
        stepDots[2].classList.replace('bg-nike-gray-100', 'bg-nike-black');
        stepNums[2].classList.replace('bg-nike-gray-100', 'bg-nike-black');
        stepNums[2].classList.replace('text-nike-gray-400', 'text-white');

        detailsStep.scrollIntoView({ behavior: 'smooth', block: 'center' });
    };

    window.resetSearch = function() {
        previewPlaceholder.classList.remove('hidden');
        previewContent.classList.add('hidden');
        productCard.classList.add('opacity-40');
        
        searchInput.value = '';
        variantStep.classList.add('opacity-20', 'pointer-events-none');
        detailsStep.classList.add('opacity-20', 'pointer-events-none');
        
        stepDots[1].classList.replace('bg-nike-black', 'bg-nike-gray-100');
        stepDots[2].classList.replace('bg-nike-black', 'bg-nike-gray-100');
        stepNums[1].classList.replace('bg-nike-black', 'bg-nike-gray-100');
        stepNums[1].classList.replace('text-white', 'text-nike-gray-400');
        stepNums[2].classList.replace('bg-nike-black', 'bg-nike-gray-100');
        stepNums[2].classList.replace('text-white', 'text-nike-gray-400');
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    // Close results when clicking outside
    document.addEventListener('click', function(e) {
        if (!document.getElementById('search-container').contains(e.target)) {
            resultsBox.classList.add('hidden');
        }
    });
</script>
@endsection

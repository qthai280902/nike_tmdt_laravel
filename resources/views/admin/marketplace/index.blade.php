@extends('layouts.admin')

@section('page_title', 'Kiểm duyệt Chợ C2C')

@section('admin_content')
<div class="space-y-8">
    {{-- Alerts --}}
    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/20 text-green-500 px-6 py-4 rounded-xl flex items-center">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Pending Listings Table --}}
    <div class="type-card rounded-xl overflow-hidden">
        <div class="p-6 border-b border-zinc-800 flex justify-between items-center">
            <h3 class="font-bold">Tin đăng đang chờ duyệt</h3>
            <p class="text-xs text-zinc-500">Xem xét và phê duyệt các mặt hàng đồ cũ từ cộng đồng</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-zinc-900/50 text-zinc-500 uppercase text-[10px] tracking-widest">
                    <tr>
                        <th class="px-6 py-4 font-medium">Sản phẩm (B2C)</th>
                        <th class="px-6 py-4 font-medium">Người bán</th>
                        <th class="px-6 py-4 font-medium">Giá bán</th>
                        <th class="px-6 py-4 font-medium">Tình trạng</th>
                        <th class="px-6 py-4 font-medium text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @forelse($listings as $listing)
                    <tr class="hover:bg-zinc-900/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-zinc-800 rounded overflow-hidden flex-shrink-0">
                                    <img src="{{ $listing->variant->product->image_url }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <span class="font-medium text-white block">{{ $listing->variant->product->name }}</span>
                                    <span class="text-[10px] text-zinc-500 uppercase">Size: {{ $listing->variant->size }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-zinc-300">{{ $listing->user->name }}</span>
                            <span class="block text-[10px] text-zinc-500">{{ $listing->user->email }}</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-white">
                            {{ number_format($listing->asking_price, 0, ',', '.') }}₫
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded bg-zinc-800 text-zinc-300 text-[10px] font-bold uppercase">
                                {{ $listing->condition_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end space-x-2">
                                <form action="{{ route('admin.marketplace.update', [$listing->id, 'active']) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 bg-green-500/10 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-all" title="Duyệt bài">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </form>
                                <form action="{{ route('admin.marketplace.update', [$listing->id, 'rejected']) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all" title="Từ chối">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-zinc-500 italic">Hiện không có tin đăng nào đang chờ duyệt.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

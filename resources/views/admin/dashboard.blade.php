@extends('layouts.admin')

@section('page_title', 'Hệ thống Quản trị')

@section('admin_content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    {{-- Stats Cards --}}
    <div class="type-card p-6 rounded-xl">
        <p class="text-xs font-medium text-zinc-500 uppercase tracking-widest mb-4">Tổng Doanh Thu</p>
        <div class="flex items-end justify-between">
            <h3 class="text-2xl font-bold">1.280.000.000₫</h3>
            <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded">+12%</span>
        </div>
    </div>

    <div class="type-card p-6 rounded-xl">
        <p class="text-xs font-medium text-zinc-500 uppercase tracking-widest mb-4">Đơn Hàng Mới</p>
        <div class="flex items-end justify-between">
            <h3 class="text-2xl font-bold">482</h3>
            <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded">+5%</span>
        </div>
    </div>

    <div class="type-card p-6 rounded-xl">
        <p class="text-xs font-medium text-zinc-500 uppercase tracking-widest mb-4">Sản Phẩm Đang Bán</p>
        <div class="flex items-end justify-between">
            <h3 class="text-2xl font-bold">124</h3>
            <span class="text-xs font-bold text-zinc-500 bg-zinc-500/10 px-2 py-1 rounded">0%</span>
        </div>
    </div>

    <div class="type-card p-6 rounded-xl">
        <p class="text-xs font-medium text-zinc-500 uppercase tracking-widest mb-4">Thành Viên Mới</p>
        <div class="flex items-end justify-between">
            <h3 class="text-2xl font-bold">+1,200</h3>
            <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded">+18%</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Recent Orders --}}
    <div class="lg:col-span-2 type-card rounded-xl overflow-hidden">
        <div class="p-6 border-b border-zinc-800 flex justify-between items-center">
            <h4 class="font-bold">Đơn hàng gần đây</h4>
            <button class="text-xs text-zinc-500 hover:text-white transition-all">Xem tất cả</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-zinc-900/50 text-zinc-500 uppercase text-[10px] tracking-widest">
                    <tr>
                        <th class="px-6 py-4 font-medium">Mã Đơn</th>
                        <th class="px-6 py-4 font-medium">Khách Hàng</th>
                        <th class="px-6 py-4 font-medium">Tổng Tiền</th>
                        <th class="px-6 py-4 font-medium">Trạng Thái</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    <tr class="hover:bg-zinc-900/30">
                        <td class="px-6 py-4 font-medium text-white">#ORD-2831</td>
                        <td class="px-6 py-4 text-zinc-400">Nguyễn Văn A</td>
                        <td class="px-6 py-4 text-white">2.400.000₫</td>
                        <td class="px-6 py-4"><span class="px-2 py-0.5 rounded-full bg-blue-500/10 text-blue-500 text-[10px] font-bold uppercase">Processing</span></td>
                    </tr>
                    <tr class="hover:bg-zinc-900/30">
                        <td class="px-6 py-4 font-medium text-white">#ORD-2830</td>
                        <td class="px-6 py-4 text-zinc-400">Lê Thị B</td>
                        <td class="px-6 py-4 text-white">1.850.000₫</td>
                        <td class="px-6 py-4"><span class="px-2 py-0.5 rounded-full bg-green-500/10 text-green-500 text-[10px] font-bold uppercase">Shipped</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- System Status --}}
    <div class="type-card p-6 rounded-xl">
        <h4 class="font-bold mb-6">Trạng thái hệ thống</h4>
        <div class="space-y-6">
            <div>
                <div class="flex justify-between text-xs mb-2">
                    <span class="text-zinc-500">Database Server</span>
                    <span class="text-green-500">Healthy</span>
                </div>
                <div class="w-full h-1 bg-zinc-800 rounded-full overflow-hidden">
                    <div class="w-full h-full bg-green-500"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-xs mb-2">
                    <span class="text-zinc-500">Storage Usage</span>
                    <span class="text-zinc-300">68%</span>
                </div>
                <div class="w-full h-1 bg-zinc-800 rounded-full overflow-hidden">
                    <div class="w-[68%] h-full bg-zinc-400"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

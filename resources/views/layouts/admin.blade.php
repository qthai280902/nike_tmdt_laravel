<!DOCTYPE html>
<html lang="vi" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | TypeUI System</title>
    
    {{-- TypeUI Fonts: IBM Plex Sans --}}
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'IBM Plex Sans', sans-serif !important;
        }
        .type-sidebar {
            background-color: #09090b;
            border-right: 1px solid #27272a;
        }
        .type-card {
            background-color: #18181b;
            border: 1px solid #27272a;
        }
        .type-nav-link:hover {
            background-color: #27272a;
        }
        .type-nav-link.active {
            background-color: #27272a;
            color: #ffffff;
        }
    </style>
</head>
<body class="bg-[#09090b] text-[#fafafa] antialiased overflow-x-hidden min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="type-sidebar w-64 flex-shrink-0 flex flex-col fixed inset-y-0 z-50">
        <div class="p-6 flex items-center space-x-3">
            <div class="w-8 h-8 bg-white rounded flex items-center justify-center">
                <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
            </div>
            <span class="text-lg font-bold tracking-tight">TypeUI Admin</span>
        </div>

        <nav class="flex-grow px-4 space-y-1 mt-4">
            <a href="{{ route('admin.dashboard') }}" class="type-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center px-4 py-2.5 text-sm font-medium text-zinc-400 rounded-lg transition-all">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.storefront.index') }}" class="type-nav-link {{ request()->routeIs('admin.storefront.*') ? 'active' : '' }} flex items-center px-4 py-2.5 text-sm font-medium text-zinc-400 rounded-lg transition-all">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                Storefront
            </a>
            <a href="{{ route('admin.marketplace.index') }}" class="type-nav-link {{ request()->routeIs('admin.marketplace.*') ? 'active' : '' }} flex items-center px-4 py-2.5 text-sm font-medium text-zinc-400 rounded-lg transition-all">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                Duyệt Chợ C2C
            </a>
            <a href="#" class="type-nav-link flex items-center px-4 py-2.5 text-sm font-medium text-zinc-400 rounded-lg transition-all">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Users
            </a>
            <a href="#" class="type-nav-link flex items-center px-4 py-2.5 text-sm font-medium text-zinc-400 rounded-lg transition-all">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Sales Report
            </a>
        </nav>

        <div class="p-4 border-t border-zinc-800">
            <a href="/" class="flex items-center px-4 py-2 text-xs font-medium text-zinc-500 hover:text-white transition-all">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Nike Store
            </a>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-grow ml-64 p-8">
        {{-- Topbar --}}
        <header class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-2xl font-bold tracking-tight">@yield('page_title', 'Dashboard')</h2>
                <p class="text-sm text-zinc-500">Welcome back, {{ auth()->user()->name }}</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="p-2 bg-zinc-900 border border-zinc-800 rounded-full text-zinc-400 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
                <div class="w-10 h-10 bg-gradient-to-tr from-zinc-700 to-zinc-900 rounded-full border border-zinc-700 flex items-center justify-center text-xs font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
            </div>
        </header>

        {{-- Content Area --}}
        @yield('admin_content')
    </main>

</body>
</html>

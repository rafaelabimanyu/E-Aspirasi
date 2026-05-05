<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Aspirasi | @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800" x-data="{ sidebarOpen: false }">

    <!-- Mobile sidebar backdrop -->
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-20 bg-gray-900 bg-opacity-50 lg:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-gray-200 transition-all duration-300 ease-in-out lg:translate-x-0 lg:fixed lg:inset-y-0 flex flex-col">
        <!-- Brand -->
        <div class="flex items-center justify-between h-16 px-5 border-b border-gray-200">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center shadow-sm">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </div>
                <span class="text-lg font-bold tracking-tight text-gray-900">E-Aspirasi</span>
            </div>
            <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            @if(in_array(auth()->user()->role ?? '', ['admin', 'petugas']))
                {{-- ====== ADMIN / PETUGAS SIDEBAR ====== --}}
                <p class="px-3 pt-2 pb-2 text-[10px] font-bold text-gray-400 uppercase tracking-[0.15em]">Menu Utama</p>

                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 text-[13px] font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 border-l-3 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-[18px] h-[18px] mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('pengaduan.create') }}" class="flex items-center px-3 py-2 text-[13px] font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('pengaduan.create') ? 'bg-blue-50 text-blue-700 border-l-3 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-[18px] h-[18px] mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Pengaduan
                </a>

                <p class="px-3 pt-5 pb-2 text-[10px] font-bold text-gray-400 uppercase tracking-[0.15em]">Manajemen</p>

                <a href="{{ route('admin.berita.index') }}" class="flex items-center px-3 py-2 text-[13px] font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('admin.berita.*') ? 'bg-blue-50 text-blue-700 border-l-3 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-[18px] h-[18px] mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 6z"></path></svg>
                    Manajemen Berita
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-3 py-2 text-[13px] font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-700 border-l-3 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-[18px] h-[18px] mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Manajemen User
                </a>

                <p class="px-3 pt-5 pb-2 text-[10px] font-bold text-gray-400 uppercase tracking-[0.15em]">Sistem</p>

                <a href="{{ route('admin.settings') }}" class="flex items-center px-3 py-2 text-[13px] font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('admin.settings') ? 'bg-blue-50 text-blue-700 border-l-3 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-[18px] h-[18px] mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Pengaturan Sistem
                </a>
            @else
                {{-- ====== MASYARAKAT SIDEBAR ====== --}}
                <a href="{{ route('masyarakat.pengaduan.index') }}" class="flex items-center px-3 py-2 text-[13px] font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('masyarakat.pengaduan.index') ? 'bg-blue-50 text-blue-700 border-l-3 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-[18px] h-[18px] mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('masyarakat.pengaduan.create') }}" class="flex items-center px-3 py-2 text-[13px] font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('masyarakat.pengaduan.create') ? 'bg-blue-50 text-blue-700 border-l-3 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-[18px] h-[18px] mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Pengaduan
                </a>
            @endif
        </nav>
        
        <!-- User info + logout -->
        <div class="p-3 border-t border-gray-200">
            <div class="flex items-center gap-3 px-3 py-2 mb-2">
                <img class="w-8 h-8 rounded-full object-cover ring-2 ring-gray-100" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&color=1D4ED8&background=EFF6FF&bold=true&size=64" alt="">
                <div class="flex-1 min-w-0">
                    <p class="text-[13px] font-semibold text-gray-900 truncate">{{ auth()->user()->name ?? 'User' }}</p>
                    <p class="text-[11px] text-gray-400 uppercase tracking-wider">{{ auth()->user()->role ?? 'masyarakat' }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') ?? '#' }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-3 py-2 text-[13px] font-medium text-red-500 transition-all duration-200 rounded-lg hover:bg-red-50">
                    <svg class="w-[18px] h-[18px] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen lg:ml-64">
        <!-- Top Navbar -->
        <header class="sticky top-0 z-30 flex items-center justify-between h-14 px-6 bg-white/80 backdrop-blur-xl border-b border-gray-200 transition-all duration-300 ease-in-out">
            <div class="flex items-center">
                <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
            
            <div class="flex items-center gap-3">

                <div class="flex items-center" x-data="{ dropdownOpen: false }">
                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center focus:outline-none">
                        <img class="w-8 h-8 rounded-full object-cover border border-gray-200" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&color=1D4ED8&background=EFF6FF" alt="Avatar">
                        <span class="ml-2 text-sm font-medium text-gray-700 hidden md:block">{{ auth()->user()->name ?? 'Masyarakat' }}</span>
                        <svg class="w-4 h-4 ml-1 text-gray-500 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-6 top-14 w-48 bg-white rounded-md shadow-lg py-1 z-20 border border-gray-100" x-transition>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                        <form method="POST" action="{{ route('logout') ?? '#' }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 lg:p-8">
            @if(session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 flex items-start" x-data="{ show: true }" x-show="show">
                <svg class="w-5 h-5 text-green-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div class="flex-1">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="text-green-500 hover:text-green-700"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>

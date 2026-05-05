<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Aspirasi | Portal Informasi & Pengaduan Masyarakat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-extrabold text-blue-600 tracking-tight">E-Aspirasi</span>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('masyarakat.pengaduan.index') }}" class="text-gray-600 hover:text-blue-600 font-medium text-sm transition-colors">Dashboard Saya</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium text-sm transition-colors">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-sm">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden border-b border-gray-200">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-16 lg:pt-24 px-4 sm:px-6 lg:px-8">
                <main class="mx-auto max-w-7xl">
                    <div class="sm:text-center lg:text-left">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Portal Resmi Warga</span>
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Sampaikan Aspirasi,</span>
                            <span class="block text-blue-600">Bangun Lingkungan Kita</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Wadah interaktif bagi warga untuk menyampaikan keluhan, mendapatkan informasi terkini, dan memantau perkembangan lingkungan sekitar secara transparan.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition-colors">
                                    Buat Laporan Sekarang
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#statistik" class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 transition-colors">
                                    Lihat Statistik
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-blue-50 flex items-center justify-center">
            <!-- Illustration / Abstract Pattern placeholder -->
            <div class="grid grid-cols-2 gap-4 p-8 transform rotate-3">
                <div class="w-48 h-64 bg-blue-200 rounded-2xl shadow-lg opacity-80"></div>
                <div class="w-48 h-64 bg-blue-400 rounded-2xl shadow-xl mt-12 opacity-90"></div>
            </div>
        </div>
    </div>

    <!-- Statistik Section -->
    <div id="statistik" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Transparansi</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Statistik Penanganan</p>
            </div>
            <div class="mt-10">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white overflow-hidden shadow rounded-xl border border-gray-200 text-center p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Aduan Selesai</dt>
                        <dd class="mt-2 text-5xl font-extrabold text-green-600">{{ $totalSelesai }}</dd>
                    </div>
                    <div class="bg-white overflow-hidden shadow rounded-xl border border-gray-200 text-center p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Sedang Diproses/Verifikasi</dt>
                        <dd class="mt-2 text-5xl font-extrabold text-yellow-500">{{ $totalProses }}</dd>
                    </div>
                    <div class="bg-white overflow-hidden shadow rounded-xl border border-gray-200 text-center p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Kepuasan Warga</dt>
                        <dd class="mt-2 text-5xl font-extrabold text-blue-600">98%</dd>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita & Pengumuman -->
    <div class="py-12 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Informasi Terkini</h2>
                    <p class="mt-2 text-gray-500">Berita dan pengumuman terbaru di lingkungan kita.</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($news as $item)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gray-200 {{ $item->image ? '' : 'flex items-center justify-center' }}">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 6z"></path></svg>
                        @endif
                    </div>
                    <div class="p-6">
                        <span class="inline-block px-2 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded mb-3 uppercase tracking-wider">{{ $item->type }}</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($item->content, 100) }}</p>
                        <span class="text-xs text-gray-400">{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12 text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                    <p>Belum ada informasi terkini saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} E-Aspirasi. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

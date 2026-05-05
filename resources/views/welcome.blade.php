<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Aspirasi | Portal Integritas & Pelayanan Publik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .hero-gradient {
            background: radial-gradient(circle at top right, #eff6ff 0%, #ffffff 100%);
        }
    </style>
</head>

<body class="bg-[#fcfdfe] text-slate-900 antialiased">

    <!-- Premium Navbar -->
    <nav class="sticky top-0 z-[60] glass-effect border-b border-slate-200/60">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div
                    class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                        </path>
                    </svg>
                </div>
                <span
                    class="text-xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-600">E-ASPIRASI</span>
            </div>

            <div class="hidden md:flex items-center gap-8">
                <a href="#statistik"
                    class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-all">Statistik</a>
                <a href="#berita"
                    class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-all">Informasi</a>
                <div class="h-6 w-px bg-slate-200"></div>
                @auth
                    <a href="{{ route('masyarakat.pengaduan.index') }}"
                        class="bg-slate-900 text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-slate-800 transition-all shadow-md">Dashboard
                        Saya</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-700 hover:text-blue-600">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-100">Mulai
                        Lapor</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Elevated Hero Section -->
    <section class="relative hero-gradient overflow-hidden pt-12 pb-24">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative z-10">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-xs font-bold mb-8 animate-fade-in">
                    <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                    </span>
                    SISTEM PENGADUAN TERINTEGRASI
                </div>
                <h1 class="text-5xl lg:text-7xl font-extrabold leading-[1.1] text-slate-900 mb-8">
                    Suara Anda adalah <span class="text-blue-600 italic">Perubahan.</span>
                </h1>
                <p class="text-lg text-slate-600 leading-relaxed max-w-xl mb-10">
                    Platform digital profesional untuk menyampaikan aspirasi dan pengaduan demi kemajuan lingkungan yang
                    lebih transparan dan akuntabel.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-xl shadow-blue-200 group">
                        Buat Pengaduan
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="#berita"
                        class="inline-flex items-center justify-center px-8 py-4 bg-white border border-slate-200 text-slate-700 font-bold rounded-2xl hover:bg-slate-50 transition-all">
                        Pelajari Prosedur
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -top-20 -right-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
                <div class="relative grid grid-cols-12 gap-4">
                    <div class="col-span-8">
                        <div
                            class="aspect-video bg-white rounded-[2rem] shadow-2xl border border-slate-100 p-2 overflow-hidden transform hover:-rotate-1 transition-transform duration-500">
                            <div class="w-full h-full bg-slate-50 rounded-[1.5rem] flex items-center justify-center">
                                <svg class="w-20 h-20 text-blue-100" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 mt-12">
                        <div
                            class="aspect-square bg-blue-600 rounded-[2rem] shadow-xl flex flex-col items-center justify-center text-white p-6 transform hover:rotate-3 transition-transform duration-500">
                            <div class="text-3xl font-black mb-1">98%</div>
                            <div
                                class="text-[10px] font-bold opacity-80 text-center uppercase tracking-widest leading-tight">
                                Kepuasan Pelayanan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bento Grid Stats Section -->
    <section id="statistik" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <h2 class="text-blue-600 font-black tracking-[0.2em] text-xs uppercase mb-4">Dashboard Live</h2>
                    <p class="text-4xl font-bold text-slate-900">Transparansi Data Publik</p>
                </div>
                <p class="text-slate-500 max-w-sm">Data riil penanganan laporan warga yang masuk ke sistem kami secara
                    berkala.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div
                    class="bg-emerald-50 rounded-[2.5rem] p-10 border border-emerald-100 transition-all hover:shadow-2xl hover:shadow-emerald-100 group">
                    <div
                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-8 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-slate-900 mb-2">{{ $totalSelesai }}</div>
                    <div class="text-slate-600 font-semibold italic">Aduan Tuntas</div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-amber-50 rounded-[2.5rem] p-10 border border-amber-100 transition-all hover:shadow-2xl hover:shadow-amber-100 group">
                    <div
                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-8 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-slate-900 mb-2">{{ $totalProses }}</div>
                    <div class="text-slate-600 font-semibold italic">Dalam Proses</div>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-blue-600 rounded-[2.5rem] p-10 shadow-2xl shadow-blue-200 flex flex-col justify-between group overflow-hidden relative">
                    <svg class="absolute -right-4 -bottom-4 w-40 h-40 text-blue-500 opacity-20 transform rotate-12"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                    </svg>
                    <div class="text-white relative z-10">
                        <div class="text-lg font-bold mb-6">Butuh Bantuan?</div>
                        <p class="text-blue-100 text-sm leading-relaxed mb-8">Pelayanan informasi aktif 24/7 untuk
                            membantu kendala teknis Anda.</p>
                        <a href="#"
                            class="bg-white text-blue-600 px-6 py-3 rounded-xl font-bold text-sm inline-block">Hubungi
                            Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid Section -->
    <section id="berita" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-slate-900 text-4xl font-black mb-4">Warta Komunitas</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @forelse($news as $item)
                    <div
                        class="group bg-white rounded-[2rem] overflow-hidden border border-slate-200 transition-all hover:-translate-y-2 hover:shadow-2xl">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute top-4 left-4 z-20">
                                <span
                                    class="px-3 py-1.5 bg-blue-600/90 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-lg">
                                    {{ $item->type }}
                                </span>
                            </div>
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-slate-200 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">
                                {{ $item->created_at->format('d M Y') }}</div>
                            <h3 class="text-xl font-extrabold text-slate-900 mb-4 line-clamp-2 leading-tight">
                                {{ $item->title }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ Str::limit($item->content, 120) }}
                            </p>
                            <a href="#"
                                class="inline-flex items-center text-blue-600 font-bold text-sm group-hover:gap-2 transition-all">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3">
                        <div
                            class="bg-white rounded-[2.5rem] border-2 border-dashed border-slate-200 p-20 text-center">
                            <div
                                class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300 text-4xl">
                                ?</div>
                            <h3 class="text-slate-400 font-bold">Belum ada pengumuman hari ini.</h3>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Professional Footer -->
    <footer class="bg-slate-900 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-12 gap-12 pb-20 border-b border-slate-800">
                <div class="md:col-span-5">
                    <div class="flex items-center gap-2 mb-8 text-white">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-lg font-black tracking-tight">E-ASPIRASI</span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        Berdedikasi untuk menciptakan kanal aspirasi yang transparan, aman, dan solutif bagi seluruh
                        lapisan masyarakat Indonesia.
                    </p>
                </div>
                <div class="md:col-span-7 grid grid-cols-2 md:grid-cols-3 gap-8">
                    <div>
                        <h4 class="text-white font-bold mb-6">Tautan Cepat</h4>
                        <ul class="space-y-4 text-slate-400 text-sm">
                            <li><a href="#" class="hover:text-blue-400">Statistik Penanganan</a></li>
                            <li><a href="#" class="hover:text-blue-400">Informasi Berita</a></li>
                            <li><a href="#" class="hover:text-blue-400">Pusat Bantuan</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-6">Legalitas</h4>
                        <ul class="space-y-4 text-slate-400 text-sm">
                            <li><a href="#" class="hover:text-blue-400">Kebijakan Privasi</a></li>
                            <li><a href="#" class="hover:text-blue-400">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-10 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-xs uppercase font-black tracking-widest">&copy; {{ date('Y') }}
                    E-Aspirasi Digital Portal</p>
                <div class="flex gap-6">
                    <div class="w-8 h-8 bg-slate-800 rounded-full"></div>
                    <div class="w-8 h-8 bg-slate-800 rounded-full"></div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

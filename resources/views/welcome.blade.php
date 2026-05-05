<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Aspirasi | Portal Integritas & Pelayanan Publik</title>
    <!-- Dark Mode Init -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark-mode');
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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

<body class="bg-[#fcfdfe] text-slate-900 antialiased transition-colors duration-300" :class="{'dark-mode': document.documentElement.classList.contains('dark-mode')}">

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
                
                <!-- Dark Mode Toggle -->
                <button id="theme-toggle" class="p-2 text-slate-500 hover:bg-slate-100 rounded-lg focus:outline-none transition-colors">
                    <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                </button>

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

    <!-- Alur Pelayanan (How It Works) -->
    <section id="alur-pelayanan" class="py-24 bg-white border-b border-slate-100" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-blue-600 font-black tracking-[0.2em] text-xs uppercase mb-4">Cara Kerja</h2>
                <h3 class="text-3xl md:text-4xl font-black text-slate-900 mb-4">Alur Pelayanan Kami</h3>
                <p class="text-slate-500 max-w-2xl mx-auto">Proses pelaporan yang mudah, transparan, dan terukur. Kami memastikan setiap suara Anda didengar dan ditindaklanjuti.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="relative text-center group">
                    <div class="hidden md:block absolute top-1/4 left-1/2 w-full border-t-2 border-dashed border-slate-200 -z-10 group-hover:border-blue-400 transition-colors"></div>
                    <div class="w-20 h-20 mx-auto bg-blue-50 border-2 border-blue-100 rounded-full flex items-center justify-center mb-6 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-lg shadow-blue-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">1. Daftar/Login</h4>
                    <p class="text-sm text-slate-500">Buat akun menggunakan data diri yang valid untuk mulai melapor.</p>
                </div>
                <!-- Step 2 -->
                <div class="relative text-center group">
                    <div class="hidden md:block absolute top-1/4 left-1/2 w-full border-t-2 border-dashed border-slate-200 -z-10 group-hover:border-blue-400 transition-colors"></div>
                    <div class="w-20 h-20 mx-auto bg-blue-50 border-2 border-blue-100 rounded-full flex items-center justify-center mb-6 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-lg shadow-blue-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">2. Tulis Laporan</h4>
                    <p class="text-sm text-slate-500">Sampaikan keluhan atau aspirasi dengan detail dan lampirkan bukti.</p>
                </div>
                <!-- Step 3 -->
                <div class="relative text-center group">
                    <div class="hidden md:block absolute top-1/4 left-1/2 w-full border-t-2 border-dashed border-slate-200 -z-10 group-hover:border-blue-400 transition-colors"></div>
                    <div class="w-20 h-20 mx-auto bg-blue-50 border-2 border-blue-100 rounded-full flex items-center justify-center mb-6 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-lg shadow-blue-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">3. Proses Verifikasi</h4>
                    <p class="text-sm text-slate-500">Laporan Anda akan diverifikasi oleh petugas untuk ditindaklanjuti.</p>
                </div>
                <!-- Step 4 -->
                <div class="relative text-center group">
                    <div class="w-20 h-20 mx-auto bg-emerald-50 border-2 border-emerald-100 rounded-full flex items-center justify-center mb-6 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-lg shadow-emerald-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">4. Selesai</h4>
                    <p class="text-sm text-slate-500">Instansi terkait telah menyelesaikan laporan Anda. Anda dapat memberi tanggapan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bento Grid Stats Section -->
    <section id="statistik" class="py-24 bg-slate-50" data-aos="fade-up">
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
    <section id="berita" class="py-24 bg-white border-t border-slate-100" data-aos="fade-up">
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
                            <a href="{{ route('news.show', $item->slug) }}" class="block">
                                <h3 class="text-xl font-extrabold text-slate-900 mb-4 line-clamp-2 leading-tight hover:text-blue-600 transition-colors">
                                    {{ $item->title }}
                                </h3>
                            </a>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ Str::limit($item->content, 120) }}
                            </p>
                            <a href="{{ route('news.show', $item->slug) }}"
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

    <!-- FAQ Section -->
    <section id="faq" class="py-24 bg-slate-50 border-t border-slate-100">
        <div class="max-w-3xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-blue-600 font-black tracking-[0.2em] text-xs uppercase mb-4">FAQ</h2>
                <h3 class="text-3xl md:text-4xl font-black text-slate-900 mb-4">Pertanyaan Seputar Layanan</h3>
                <p class="text-slate-500">Temukan jawaban dari pertanyaan yang sering diajukan terkait E-Aspirasi.</p>
            </div>

            <div class="space-y-4" x-data="{ activeAccordion: null }">
                <!-- FAQ Item 1 -->
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="activeAccordion = activeAccordion === 1 ? null : 1" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-bold text-slate-900">Apakah identitas saya sebagai pelapor aman?</span>
                        <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" :class="{ 'rotate-180': activeAccordion === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="activeAccordion === 1" x-collapse x-cloak>
                        <div class="px-6 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-50 mt-2 pt-4">
                            Ya, sistem E-Aspirasi dilengkapi dengan opsi "Laporan Rahasia" (Anonim) yang memastikan data diri Anda tidak akan ditampilkan kepada publik maupun instansi terkait jika Anda memilih opsi tersebut.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="activeAccordion = activeAccordion === 2 ? null : 2" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-bold text-slate-900">Berapa lama laporan saya akan diproses?</span>
                        <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" :class="{ 'rotate-180': activeAccordion === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="activeAccordion === 2" x-collapse x-cloak>
                        <div class="px-6 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-50 mt-2 pt-4">
                            Sesuai dengan SOP standar pelayanan, laporan akan diverifikasi paling lambat 1x24 jam hari kerja. Setelah diteruskan ke instansi terkait, proses penyelesaian sangat bergantung pada jenis masalah, namun Anda dapat selalu memantau status secara real-time.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="activeAccordion = activeAccordion === 3 ? null : 3" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-bold text-slate-900">Apakah saya bisa mengubah atau menghapus laporan?</span>
                        <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" :class="{ 'rotate-180': activeAccordion === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="activeAccordion === 3" x-collapse x-cloak>
                        <div class="px-6 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-50 mt-2 pt-4">
                            Laporan yang sudah berstatus "Diverifikasi" atau "Diproses" tidak dapat lagi diubah atau dihapus untuk menjaga keutuhan data pelayanan publik. Namun Anda dapat menambahkan tanggapan pada laporan tersebut.
                        </div>
                    </div>
                </div>
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
                <div class="md:col-span-7 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="text-white font-bold mb-6">Informasi Kontak</h4>
                        <ul class="space-y-4 text-slate-400 text-sm">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>Gedung Pelayanan Publik Terpadu Lt. 2<br>Jl. Merdeka No. 1, Kota Administratif</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <span>(021) 123-4567</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <span>layanan@e-aspirasi.go.id</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-6">Lokasi Kami</h4>
                        <div class="w-full h-40 bg-slate-800 rounded-xl overflow-hidden relative border border-slate-700">
                            <!-- Placeholder Map -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-30">
                                <svg class="w-20 h-20 text-slate-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <div class="absolute bottom-2 left-2 right-2 text-center text-[10px] text-slate-400 font-medium">
                                Peta Interaktif Sedang Dimuat...
                            </div>
                        </div>
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
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

    <!-- Dark Mode Script -->
    <script>
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
            document.body.classList.add('dark-mode');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        const themeToggleBtn = document.getElementById('theme-toggle');
        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', function() {
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                if (localStorage.getItem('theme')) {
                    if (localStorage.getItem('theme') === 'light') {
                        document.body.classList.add('dark-mode');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        document.body.classList.remove('dark-mode');
                        localStorage.setItem('theme', 'light');
                    }
                } else {
                    if (document.body.classList.contains('dark-mode')) {
                        document.body.classList.remove('dark-mode');
                        localStorage.setItem('theme', 'light');
                    } else {
                        document.body.classList.add('dark-mode');
                        localStorage.setItem('theme', 'dark');
                    }
                }
            });
        }
    </script>
</body>

</html>

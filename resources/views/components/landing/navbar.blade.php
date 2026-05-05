<!-- Premium Navbar -->
<nav class="sticky top-0 z-[60] glass-effect border-b border-slate-200/60 transition-all duration-300 bg-white/80 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                    </path>
                </svg>
            </div>
            <span class="text-xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-600">E-ASPIRASI</span>
        </div>

        <div class="hidden md:flex items-center gap-8">
            <a href="#statistik" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-all">Statistik</a>
            <a href="#alur-pelayanan" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-all">Cara Kerja</a>
            <a href="#berita" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-all">Informasi</a>
            <a href="#faq" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-all">FAQ</a>

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

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('nav');
        if (window.scrollY > 10) {
            nav.classList.add('shadow-sm', 'bg-white/95');
            nav.classList.remove('bg-white/80');
        } else {
            nav.classList.remove('shadow-sm', 'bg-white/95');
            nav.classList.add('bg-white/80');
        }
    });
</script>

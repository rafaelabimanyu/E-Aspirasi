<!-- Elevated Hero Section -->
<section class="relative hero-gradient overflow-hidden pt-12 pb-24">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
        <div class="relative z-10" data-aos="fade-right">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-xs font-bold mb-8">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
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
                    class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-xl shadow-blue-200 hover:shadow-blue-300 group">
                    Buat Laporan
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="#alur-pelayanan"
                    class="inline-flex items-center justify-center px-8 py-4 bg-white border border-slate-200 text-slate-700 font-bold rounded-2xl hover:bg-slate-50 transition-all shadow-sm">
                    Pelajari Prosedur
                </a>
            </div>
        </div>

        <div class="relative" data-aos="fade-left">
            <div class="absolute -top-20 -right-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
            <div class="relative grid grid-cols-12 gap-4">
                <div class="col-span-8">
                    <div class="aspect-video bg-white rounded-[2rem] shadow-2xl border border-slate-100 p-2 overflow-hidden transform hover:-rotate-1 transition-transform duration-500">
                        <div class="w-full h-full bg-slate-50 rounded-[1.5rem] flex items-center justify-center overflow-hidden relative group">
                            <!-- Hero Image from Unsplash -->
                            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" alt="Public Service" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-blue-900/10 mix-blend-multiply"></div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 mt-12">
                    <div class="aspect-square bg-blue-600 rounded-[2rem] shadow-xl shadow-blue-200 flex flex-col items-center justify-center text-white p-6 transform hover:rotate-3 transition-transform duration-500">
                        <div class="text-3xl font-black mb-1">98%</div>
                        <div class="text-[10px] font-bold opacity-80 text-center uppercase tracking-widest leading-tight">
                            Kepuasan Pelayanan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

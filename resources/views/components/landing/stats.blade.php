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
                <svg class="absolute -right-4 -bottom-4 w-40 h-40 text-blue-500 opacity-20 transform rotate-12 transition-transform duration-700 group-hover:rotate-45"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                </svg>
                <div class="text-white relative z-10">
                    <div class="text-lg font-bold mb-6">Butuh Bantuan?</div>
                    <p class="text-blue-100 text-sm leading-relaxed mb-8">Pelayanan informasi aktif 24/7 untuk
                        membantu kendala teknis Anda.</p>
                    <a href="#"
                        class="bg-white text-blue-600 px-6 py-3 rounded-xl font-bold text-sm inline-block shadow-sm hover:shadow-md transition-shadow">Hubungi
                        Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>

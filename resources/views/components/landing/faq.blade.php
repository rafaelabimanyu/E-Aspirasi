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
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-blue-200 hover:shadow-md">
                <button @click="activeAccordion = activeAccordion === 1 ? null : 1" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                    <span class="font-bold text-slate-900">Apakah identitas saya sebagai pelapor aman?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" :class="{ 'rotate-180 text-blue-600': activeAccordion === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="activeAccordion === 1" x-collapse x-cloak>
                    <div class="px-6 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-50 mt-2 pt-4">
                        Ya, sistem E-Aspirasi dilengkapi dengan opsi "Laporan Rahasia" (Anonim) yang memastikan data diri Anda tidak akan ditampilkan kepada publik maupun instansi terkait jika Anda memilih opsi tersebut.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-blue-200 hover:shadow-md">
                <button @click="activeAccordion = activeAccordion === 2 ? null : 2" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                    <span class="font-bold text-slate-900">Berapa lama laporan saya akan diproses?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" :class="{ 'rotate-180 text-blue-600': activeAccordion === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="activeAccordion === 2" x-collapse x-cloak>
                    <div class="px-6 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-50 mt-2 pt-4">
                        Sesuai dengan SOP standar pelayanan, laporan akan diverifikasi paling lambat 1x24 jam hari kerja. Setelah diteruskan ke instansi terkait, proses penyelesaian sangat bergantung pada jenis masalah, namun Anda dapat selalu memantau status secara real-time.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-blue-200 hover:shadow-md">
                <button @click="activeAccordion = activeAccordion === 3 ? null : 3" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                    <span class="font-bold text-slate-900">Apakah saya bisa mengubah atau menghapus laporan?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" :class="{ 'rotate-180 text-blue-600': activeAccordion === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
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

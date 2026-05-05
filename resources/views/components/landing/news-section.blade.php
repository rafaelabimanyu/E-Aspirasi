<!-- News Grid Section -->
<section id="berita" class="py-24 bg-white border-t border-slate-100" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-slate-900 text-4xl font-black mb-4">Warta Komunitas</h2>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            @forelse($news as $item)
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-200 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-100 hover:border-blue-100">
                    <div class="relative h-64 overflow-hidden bg-slate-100">
                        <div class="absolute top-4 left-4 z-20">
                            <span class="px-3 py-1.5 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-lg shadow-sm
                                {{ $item->type === 'pengumuman' ? 'bg-blue-600/90' : ($item->type === 'berita' ? 'bg-emerald-600/90' : 'bg-amber-500/90') }}">
                                {{ $item->type }}
                            </span>
                        </div>
                        @if ($item->image)
                            <!-- Make sure image has object-cover and group-hover scale -->
                            <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}"
                                class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110" alt="{{ $item->title }}">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-8">
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                        <a href="{{ route('news.show', $item->slug) }}" class="block">
                            <h3 class="text-xl font-extrabold text-slate-900 mb-4 line-clamp-2 leading-tight group-hover:text-blue-600 transition-colors">
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
                    <div class="bg-white rounded-[2.5rem] border-2 border-dashed border-slate-200 p-20 text-center">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300 text-4xl">
                            ?</div>
                        <h3 class="text-slate-400 font-bold">Belum ada pengumuman hari ini.</h3>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

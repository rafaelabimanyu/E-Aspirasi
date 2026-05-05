@extends('layouts.app')

@section('title', 'Pelacakan Laporan - ' . $pengaduan->tracking_id)

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('masyarakat.pengaduan.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-4 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dashboard
        </a>
        <h1 class="text-2xl font-bold text-gray-900">Pelacakan Laporan</h1>
        <p class="text-sm text-gray-500 mt-1">Lacak progres penanganan laporan Anda secara real-time.</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Kolom Kiri: Detail Laporan & Timeline -->
    <div class="lg:col-span-2 space-y-8">
        
        <!-- Informasi Header -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4 pb-4 border-b border-gray-100">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Tracking ID</p>
                    <p class="text-xl font-bold text-gray-900 tracking-wider">{{ $pengaduan->tracking_id }}</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full uppercase tracking-wide">{{ $pengaduan->classification }}</span>
                    @if($pengaduan->is_anonymous)
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg> Anonim</span>
                    @endif
                    @if($pengaduan->is_secret)
                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-semibold rounded-full flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg> Rahasia</span>
                    @endif
                </div>
            </div>
            
            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $pengaduan->title }}</h2>
            <div class="prose max-w-none text-gray-600 text-sm mb-6">
                {!! nl2br(e($pengaduan->description)) !!}
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm bg-gray-50 p-4 rounded-lg border border-gray-100">
                <div>
                    <p class="text-gray-500 mb-1 font-medium">Tanggal Kejadian</p>
                    <p class="text-gray-900 font-semibold">{{ \Carbon\Carbon::parse($pengaduan->incident_date)->format('d M Y') }}</p>
                </div>
                <div>
                    <p class="text-gray-500 mb-1 font-medium">Kategori</p>
                    <p class="text-gray-900 font-semibold">{{ $pengaduan->category }}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-500 mb-1 font-medium">Lokasi</p>
                    <p class="text-gray-900 font-semibold truncate">{{ $pengaduan->location }}</p>
                </div>
            </div>
            
            @if($pengaduan->attachment)
            <div class="mt-6">
                <p class="text-sm font-medium text-gray-700 mb-3">Lampiran Bukti Fisik</p>
                <a href="{{ asset('storage/' . $pengaduan->attachment) }}" target="_blank" class="block overflow-hidden rounded-lg border border-gray-200 w-full sm:w-64 relative group cursor-pointer">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center">
                        <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    </div>
                    <img src="{{ asset('storage/' . $pengaduan->attachment) }}" alt="Lampiran" class="w-full h-40 object-cover">
                </a>
            </div>
            @endif
        </div>

        <!-- CRM Timeline Section -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Timeline Penanganan Laporan
            </h3>
            
            <div class="relative border-l-2 border-gray-200 ml-3 md:ml-4 space-y-8">
                <!-- Step 1: Diterima -->
                <div class="relative pl-6 md:pl-8">
                    <span class="absolute -left-[11px] top-1 h-5 w-5 rounded-full bg-blue-600 ring-4 ring-white"></span>
                    <h4 class="font-bold text-gray-900 text-sm md:text-base">Laporan Diterima</h4>
                    <p class="text-xs text-gray-500 mb-1">{{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
                    <p class="text-sm text-gray-600 mt-1">Laporan Anda telah terdaftar dalam sistem dan menunggu verifikasi admin.</p>
                </div>

                <!-- Step 2: Verifikasi -->
                <div class="relative pl-6 md:pl-8">
                    @php $isVerif = in_array($pengaduan->status, ['diverifikasi', 'diproses', 'selesai']); @endphp
                    <span class="absolute -left-[11px] top-1 h-5 w-5 rounded-full ring-4 ring-white {{ $isVerif ? 'bg-blue-600' : 'bg-gray-300' }}"></span>
                    <h4 class="font-bold {{ $isVerif ? 'text-gray-900' : 'text-gray-500' }} text-sm md:text-base">Verifikasi & Klasifikasi</h4>
                    <p class="text-sm {{ $isVerif ? 'text-gray-600' : 'text-gray-400' }} mt-1">Admin memverifikasi keabsahan laporan dan meneruskan ke instansi berwenang.</p>
                </div>

                <!-- Step 3: Koordinasi & Diproses -->
                <div class="relative pl-6 md:pl-8">
                    @php $isProses = in_array($pengaduan->status, ['diproses', 'selesai']); @endphp
                    <span class="absolute -left-[11px] top-1 h-5 w-5 rounded-full ring-4 ring-white {{ $isProses ? 'bg-yellow-500' : 'bg-gray-300' }}"></span>
                    <h4 class="font-bold {{ $isProses ? 'text-gray-900' : 'text-gray-500' }} text-sm md:text-base">Tindak Lanjut Instansi (Diproses)</h4>
                    <p class="text-sm {{ $isProses ? 'text-gray-600' : 'text-gray-400' }} mt-1">Instansi terkait sedang memproses dan mengambil tindakan atas laporan Anda.</p>
                </div>

                <!-- Step 4: Selesai -->
                <div class="relative pl-6 md:pl-8">
                    @php $isSelesai = $pengaduan->status == 'selesai'; @endphp
                    <span class="absolute -left-[11px] top-1 h-5 w-5 rounded-full ring-4 ring-white {{ $isSelesai ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                    <h4 class="font-bold {{ $isSelesai ? 'text-gray-900' : 'text-gray-500' }} text-sm md:text-base">Selesai</h4>
                    <p class="text-sm {{ $isSelesai ? 'text-gray-600' : 'text-gray-400' }} mt-1">Laporan telah diselesaikan. Anda dapat membaca rincian penyelesaian di kolom tanggapan.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Kolom Kanan: Tanggapan -->
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col h-[700px]">
            <div class="px-5 py-4 border-b border-gray-200 bg-gray-50/50">
                <h2 class="text-lg font-semibold text-gray-800">Tanggapan & Komunikasi</h2>
            </div>
            
            <div class="flex-1 p-5 overflow-y-auto space-y-4 bg-gray-50/30">
                @forelse($pengaduan->tanggapans as $tanggapan)
                    <div class="flex flex-col {{ $tanggapan->user_id === Auth::id() ? 'items-end' : 'items-start' }}">
                        <div class="flex items-center mb-1">
                            @if($tanggapan->user_id !== Auth::id())
                                <span class="text-xs font-semibold text-gray-500 mr-2">{{ $tanggapan->user->name }} <span class="bg-indigo-100 text-indigo-700 px-1.5 py-0.5 rounded text-[10px] ml-1 uppercase">{{ $tanggapan->user->role }}</span></span>
                            @endif
                        </div>
                        <div class="max-w-[90%] rounded-2xl px-4 py-3 shadow-sm {{ $tanggapan->user_id === Auth::id() ? 'bg-blue-600 text-white rounded-br-none' : 'bg-white border border-gray-200 text-gray-800 rounded-bl-none' }}">
                            <p class="text-sm whitespace-pre-wrap">{{ $tanggapan->response }}</p>
                        </div>
                        <span class="text-[10px] text-gray-400 mt-1">{{ $tanggapan->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center h-full text-center text-gray-400">
                        <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <p class="text-sm">Belum ada tanggapan atau komunikasi dari instansi terkait.</p>
                    </div>
                @endforelse
            </div>

            <!-- Form Balasan -->
            <div class="p-4 border-t border-gray-200 bg-white">
                <form action="{{ route('masyarakat.pengaduan.tanggapan', $pengaduan->id) }}" method="POST">
                    @csrf
                    <div class="flex items-end gap-2">
                        <div class="flex-1">
                            <textarea name="response" rows="2" required placeholder="Tulis balasan atau pertanyaan Anda..." 
                                class="w-full text-sm rounded-lg border border-gray-300 px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"></textarea>
                        </div>
                        <button type="submit" class="p-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors shadow-sm flex-shrink-0 mb-[2px]">
                            <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </div>
                    @error('response') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

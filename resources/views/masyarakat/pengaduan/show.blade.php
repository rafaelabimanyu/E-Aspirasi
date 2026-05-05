@extends('layouts.app')

@section('title', 'Detail Pengaduan - ' . $pengaduan->tracking_id)

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('masyarakat.pengaduan.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-4 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dashboard
        </a>
        <h1 class="text-2xl font-bold text-gray-900">Detail Laporan</h1>
        <p class="text-sm text-gray-500 mt-1">Tracking ID: <span class="font-semibold text-gray-700">{{ $pengaduan->tracking_id }}</span></p>
    </div>
    
    <div>
        @if($pengaduan->status == 'pending')
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">Status: Pending</span>
        @elseif($pengaduan->status == 'diverifikasi')
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">Status: Diverifikasi</span>
        @elseif($pengaduan->status == 'diproses')
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">Status: Diproses</span>
        @elseif($pengaduan->status == 'selesai')
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">Status: Selesai</span>
        @endif
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Kolom Kiri: Detail Pengaduan -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50/50">
                <h2 class="text-lg font-semibold text-gray-800">{{ $pengaduan->title }}</h2>
                <div class="mt-2 flex flex-wrap gap-3 text-sm text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ \Carbon\Carbon::parse($pengaduan->incident_date)->format('d M Y') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        {{ $pengaduan->category }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $pengaduan->location }}
                    </div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Deskripsi Kejadian</h3>
                <div class="prose max-w-none text-gray-600">
                    {!! nl2br(e($pengaduan->description)) !!}
                </div>

                @if($pengaduan->attachment)
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <h3 class="text-sm font-medium text-gray-700 mb-3">Lampiran Foto</h3>
                    <div class="rounded-lg overflow-hidden border border-gray-200 inline-block max-w-full">
                        <img src="{{ asset('storage/' . $pengaduan->attachment) }}" alt="Lampiran" class="max-h-96 object-contain">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Tanggapan / Diskusi -->
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col h-[600px]">
            <div class="px-5 py-4 border-b border-gray-200 bg-gray-50/50">
                <h2 class="text-lg font-semibold text-gray-800">Tanggapan & Diskusi</h2>
            </div>
            
            <div class="flex-1 p-5 overflow-y-auto space-y-4">
                @forelse($pengaduan->tanggapans as $tanggapan)
                    <div class="flex flex-col {{ $tanggapan->user_id === Auth::id() ? 'items-end' : 'items-start' }}">
                        <div class="flex items-center mb-1">
                            @if($tanggapan->user_id !== Auth::id())
                                <span class="text-xs font-semibold text-gray-500 mr-2">{{ $tanggapan->user->name }} ({{ ucfirst($tanggapan->user->role) }})</span>
                            @endif
                        </div>
                        <div class="max-w-[85%] rounded-2xl px-4 py-2.5 {{ $tanggapan->user_id === Auth::id() ? 'bg-blue-600 text-white rounded-br-none' : 'bg-gray-100 text-gray-800 rounded-bl-none' }}">
                            <p class="text-sm whitespace-pre-wrap">{{ $tanggapan->response }}</p>
                        </div>
                        <span class="text-[10px] text-gray-400 mt-1">{{ $tanggapan->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center h-full text-center text-gray-500">
                        <svg class="w-10 h-10 mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <p class="text-sm">Belum ada tanggapan untuk laporan ini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Form Balasan -->
            <div class="p-4 border-t border-gray-200 bg-gray-50">
                <form action="{{ route('masyarakat.pengaduan.tanggapan', $pengaduan->id) }}" method="POST">
                    @csrf
                    <div class="flex items-end gap-2">
                        <div class="flex-1">
                            <textarea name="response" rows="2" required placeholder="Tulis balasan Anda..." 
                                class="w-full text-sm rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"></textarea>
                        </div>
                        <button type="submit" class="p-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors shadow-sm flex-shrink-0 mb-[2px]">
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

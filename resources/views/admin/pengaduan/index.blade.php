@extends('layouts.app')

@section('title', 'Dashboard Admin & Petugas')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Dashboard Manajemen Laporan</h1>
    <p class="text-sm text-gray-500 mt-1">Kelola dan tindak lanjuti laporan dari masyarakat.</p>
</div>

<!-- Filter Section -->
<div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 mb-6">
    <form action="{{ route('admin.dashboard') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
        <div class="flex-1 w-full">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Klasifikasi</label>
            <select name="classification" class="w-full rounded-lg border-gray-300 px-4 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="semua" {{ request('classification') == 'semua' ? 'selected' : '' }}>Semua Klasifikasi</option>
                <option value="pengaduan" {{ request('classification') == 'pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                <option value="aspirasi" {{ request('classification') == 'aspirasi' ? 'selected' : '' }}>Aspirasi</option>
                <option value="informasi" {{ request('classification') == 'informasi' ? 'selected' : '' }}>Informasi</option>
            </select>
        </div>
        <div class="flex-1 w-full">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Status</label>
            <select name="status" class="w-full rounded-lg border-gray-300 px-4 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="semua" {{ request('status') == 'semua' ? 'selected' : '' }}>Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diverifikasi" {{ request('status') == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div>
            <button type="submit" class="px-6 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 font-medium text-sm transition-colors">Terapkan Filter</button>
        </div>
    </form>
</div>

<!-- Laporan Table -->
<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-gray-700 text-xs uppercase font-semibold border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">ID & Pelapor</th>
                    <th class="px-6 py-4">Klasifikasi</th>
                    <th class="px-6 py-4 w-1/3">Detail Laporan</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Aksi (Proses)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($pengaduans as $aduan)
                <tr class="hover:bg-gray-50 {{ $aduan->is_secret ? 'bg-red-50/30' : '' }}" x-data="{ openModal: false }">
                    <td class="px-6 py-4 align-top">
                        <div class="font-bold text-gray-900">{{ $aduan->tracking_id }}</div>
                        <div class="text-xs mt-1 text-gray-500">
                            @if($aduan->is_anonymous)
                                <span class="italic">Anonim</span>
                            @else
                                {{ $aduan->user->name ?? 'User Dihapus' }}
                            @endif
                        </div>
                        <div class="text-xs text-gray-400 mt-1">{{ \Carbon\Carbon::parse($aduan->created_at)->format('d M Y, H:i') }}</div>
                    </td>
                    <td class="px-6 py-4 align-top">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-bold bg-gray-100 text-gray-700 uppercase tracking-wider">
                            {{ $aduan->classification }}
                        </span>
                        @if($aduan->is_secret)
                        <div class="mt-2">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-700 border border-red-200">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                RAHASIA
                            </span>
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 align-top">
                        <div class="font-bold text-gray-800 mb-1 line-clamp-1">{{ $aduan->title }}</div>
                        <div class="text-xs text-gray-500 line-clamp-2 mb-2">{{ $aduan->description }}</div>
                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-0.5 rounded">{{ $aduan->category }}</span>
                        <span class="text-xs text-gray-500 ml-2"><svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>{{ $aduan->location }}</span>
                    </td>
                    <td class="px-6 py-4 align-top">
                        @if($aduan->status == 'pending')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                        @elseif($aduan->status == 'diverifikasi')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">Verifikasi</span>
                        @elseif($aduan->status == 'diproses')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Diproses</span>
                        @elseif($aduan->status == 'selesai')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 align-top text-center">
                        <button @click="openModal = true" class="px-3 py-1.5 bg-blue-600 text-white rounded text-xs font-medium hover:bg-blue-700 transition-colors">Tindak Lanjut</button>

                        <!-- Modal Tindak Lanjut -->
                        <div x-show="openModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                                <div x-show="openModal" @click="openModal = false" class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-50" aria-hidden="true"></div>

                                <div x-show="openModal" class="relative inline-block w-full max-w-lg p-6 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                                        <h3 class="text-lg font-bold text-gray-900">Tindak Lanjut Laporan</h3>
                                        <button @click="openModal = false" class="text-gray-400 hover:text-gray-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                                    </div>
                                    
                                    <form action="{{ route('admin.pengaduan.status', $aduan->id) }}" method="POST">
                                        @csrf
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Ubah Status</label>
                                                <select name="status" class="w-full rounded-lg border-gray-300 px-3 py-2 text-sm">
                                                    <option value="pending" {{ $aduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="diverifikasi" {{ $aduan->status == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi (Teruskan ke Instansi)</option>
                                                    <option value="diproses" {{ $aduan->status == 'diproses' ? 'selected' : '' }}>Diproses (Sedang Dikerjakan)</option>
                                                    <option value="selesai" {{ $aduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggapan Resmi (Opsional)</label>
                                                <p class="text-[10px] text-gray-500 mb-2">Tanggapan ini akan dikirim ke warga pembuat laporan dan tercatat di timeline.</p>
                                                <textarea name="response" rows="4" class="w-full rounded-lg border-gray-300 px-3 py-2 text-sm" placeholder="Tuliskan respon resmi instansi..."></textarea>
                                            </div>
                                        </div>
                                        <div class="mt-6 flex justify-end gap-3">
                                            <button type="button" @click="openModal = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
                                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">Belum ada laporan yang sesuai kriteria.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $pengaduans->links() }}
    </div>
</div>
@endsection

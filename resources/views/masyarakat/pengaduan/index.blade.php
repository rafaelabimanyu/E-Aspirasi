@extends('layouts.app')

@section('title', 'Dashboard Masyarakat')

@section('content')
<div class="mb-6 flex justify-between items-end">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Selamat datang, {{ auth()->user()->name }}!</h1>
        <p class="text-sm text-gray-500 mt-1">Portal informasi dan aspirasi terpadu warga.</p>
    </div>
    <a href="{{ route('masyarakat.pengaduan.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Buat Laporan Baru
    </a>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    <!-- Kolom Kiri: Statistik & Riwayat (Lebar 2/3) -->
    <div class="xl:col-span-2 space-y-8">
        
        <!-- Stats -->
        @php
            $total = $pengaduans->count();
            $diproses = $pengaduans->where('status', 'diproses')->count();
            $selesai = $pengaduans->where('status', 'selesai')->count();
            $menunggu = $total - $diproses - $selesai;
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center">
                <div class="p-3 rounded-full bg-blue-50 text-blue-600 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Total Aduan</p>
                    <p class="text-xl font-bold text-gray-900">{{ $total }}</p>
                </div>
            </div>
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center">
                <div class="p-3 rounded-full bg-yellow-50 text-yellow-600 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Sedang Diproses</p>
                    <p class="text-xl font-bold text-gray-900">{{ $diproses }}</p>
                </div>
            </div>
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center">
                <div class="p-3 rounded-full bg-green-50 text-green-600 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Selesai</p>
                    <p class="text-xl font-bold text-gray-900">{{ $selesai }}</p>
                </div>
            </div>
        </div>

        <!-- History Table -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">Riwayat Pengaduan Anda</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700 text-xs uppercase font-semibold">
                        <tr>
                            <th scope="col" class="px-6 py-3">Tracking ID</th>
                            <th scope="col" class="px-6 py-3">Judul Aduan</th>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($pengaduans as $aduan)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-3 font-medium text-gray-900">{{ $aduan->tracking_id }}</td>
                            <td class="px-6 py-3">
                                <p class="truncate w-32 md:w-auto font-medium text-gray-800">{{ $aduan->title }}</p>
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($aduan->incident_date)->format('d M Y') }}</td>
                            <td class="px-6 py-3 whitespace-nowrap">
                                @if($aduan->status == 'pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-yellow-100 text-yellow-800 uppercase tracking-wide">Pending</span>
                                @elseif($aduan->status == 'diverifikasi')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-indigo-100 text-indigo-800 uppercase tracking-wide">Verifikasi</span>
                                @elseif($aduan->status == 'diproses')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-blue-100 text-blue-800 uppercase tracking-wide">Diproses</span>
                                @elseif($aduan->status == 'selesai')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-green-100 text-green-800 uppercase tracking-wide">Selesai</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-right">
                                <a href="{{ route('masyarakat.pengaduan.show', $aduan->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-xs bg-blue-50 px-3 py-1.5 rounded-lg transition-colors">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                <p>Belum ada laporan pengaduan yang diajukan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Edukasi & Informasi (Lebar 1/3) -->
    <div class="xl:col-span-1 space-y-6">
        
        <!-- Informasi Terkini (News) -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                <h2 class="text-base font-semibold text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 6z"></path></svg>
                    Informasi Terkini
                </h2>
            </div>
            <div class="p-5 space-y-4">
                @forelse($news ?? collect() as $item)
                <a href="{{ route('news.show', $item->slug) }}" class="block group">
                    <span class="inline-block px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] font-bold rounded mb-1 uppercase tracking-wider">{{ $item->type }}</span>
                    <h3 class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $item->title }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ $item->created_at->format('d M Y') }}</p>
                </a>
                @if(!$loop->last) <hr class="border-gray-100"> @endif
                @empty
                <p class="text-sm text-gray-500 italic">Belum ada pengumuman terbaru.</p>
                @endforelse
            </div>
        </div>

        <!-- Poster Edukasi (Carousel/Grid) -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-200 bg-gray-50/50">
                <h2 class="text-base font-semibold text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Edukasi Warga
                </h2>
            </div>
            <div class="p-5" x-data="{ activeSlide: 1, slides: [1, 2] }">
                <!-- Carousel Container -->
                <div class="relative overflow-hidden rounded-lg aspect-[4/3] bg-gray-100">
                    
                    <!-- Slide 1 -->
                    <div x-show="activeSlide === 1" x-transition.opacity class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-blue-500 to-indigo-600 p-6 text-center text-white">
                        <svg class="w-16 h-16 mb-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <h3 class="font-bold text-xl mb-2">Stop Penyebaran Hoax</h3>
                        <p class="text-sm opacity-90">Saring sebelum sharing. Laporkan berita bohong yang meresahkan warga.</p>
                    </div>

                    <!-- Slide 2 -->
                    <div x-show="activeSlide === 2" x-transition.opacity class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-green-500 to-emerald-600 p-6 text-center text-white" style="display: none;">
                        <svg class="w-16 h-16 mb-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        <h3 class="font-bold text-xl mb-2">Jaga Kebersihan</h3>
                        <p class="text-sm opacity-90">Buang sampah pada tempatnya. Lingkungan bersih, warga sehat.</p>
                    </div>

                </div>
                
                <!-- Carousel Indicators -->
                <div class="flex justify-center mt-4 space-x-2">
                    <button @click="activeSlide = 1" :class="{'bg-blue-600': activeSlide === 1, 'bg-gray-300': activeSlide !== 1}" class="w-2 h-2 rounded-full transition-colors"></button>
                    <button @click="activeSlide = 2" :class="{'bg-blue-600': activeSlide === 2, 'bg-gray-300': activeSlide !== 2}" class="w-2 h-2 rounded-full transition-colors"></button>
                </div>
            </div>
        </div>

    </div>
</div>

@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            html: `{{ session('success') }}<br><br><span class="text-sm text-gray-600"><strong>Catat Tracking ID ini!</strong> Anda dapat menggunakannya di halaman depan (Cari Laporan) untuk melacak status penanganan laporan Anda secara real-time.</span>`,
            confirmButtonColor: '#2563eb',
            confirmButtonText: 'Mengerti'
        });
    });
</script>
@endif

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('statusChart').getContext('2d');
        const dataMenunggu = {{ $menunggu }};
        const dataDiproses = {{ $diproses }};
        const dataSelesai = {{ $selesai }};
        
        // Hanya render jika ada data
        if (dataMenunggu > 0 || dataDiproses > 0 || dataSelesai > 0) {
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Menunggu', 'Diproses', 'Selesai'],
                    datasets: [{
                        data: [dataMenunggu, dataDiproses, dataSelesai],
                        backgroundColor: [
                            '#eab308', // Yellow/Orange
                            '#2563eb', // Blue
                            '#16a34a'  // Green
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    family: "'Inter', sans-serif",
                                    size: 12
                                }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
        } else {
            // Tampilkan placeholder jika kosong
            document.getElementById('statusChart').parentElement.innerHTML = 
                '<div class="flex flex-col items-center justify-center h-full text-gray-400">' +
                '<svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>' +
                '<p class="text-sm">Belum ada data untuk ditampilkan</p></div>';
        }
    });
</script>

@endsection

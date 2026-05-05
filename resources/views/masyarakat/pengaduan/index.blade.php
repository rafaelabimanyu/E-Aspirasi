@extends('layouts.app')

@section('title', 'Dashboard Masyarakat')

@section('content')
<div class="mb-6 flex justify-between items-end">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-sm text-gray-500 mt-1">Pantau status laporan dan aspirasi Anda.</p>
    </div>
    <a href="{{ route('masyarakat.pengaduan.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Buat Laporan Baru
    </a>
</div>

<!-- Stats -->
@php
    $total = $pengaduans->count();
    $diproses = $pengaduans->where('status', 'diproses')->count();
    $selesai = $pengaduans->where('status', 'selesai')->count();
@endphp
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center">
        <div class="p-3 rounded-full bg-blue-50 text-blue-600 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Total Aduan</p>
            <p class="text-2xl font-bold text-gray-900">{{ $total }}</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center">
        <div class="p-3 rounded-full bg-yellow-50 text-yellow-600 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Sedang Diproses</p>
            <p class="text-2xl font-bold text-gray-900">{{ $diproses }}</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center">
        <div class="p-3 rounded-full bg-green-50 text-green-600 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Selesai</p>
            <p class="text-2xl font-bold text-gray-900">{{ $selesai }}</p>
        </div>
    </div>
</div>

<!-- History Table -->
<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
        <h2 class="text-lg font-semibold text-gray-800">Riwayat Pengaduan Anda</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-gray-700 text-xs uppercase font-semibold">
                <tr>
                    <th scope="col" class="px-6 py-4">Tracking ID</th>
                    <th scope="col" class="px-6 py-4">Judul Aduan</th>
                    <th scope="col" class="px-6 py-4">Tanggal</th>
                    <th scope="col" class="px-6 py-4">Kategori</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($pengaduans as $aduan)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $aduan->tracking_id }}</td>
                    <td class="px-6 py-4">
                        <p class="truncate w-48 md:w-auto font-medium text-gray-800">{{ $aduan->title }}</p>
                    </td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($aduan->incident_date)->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $aduan->category }}</td>
                    <td class="px-6 py-4">
                        @if($aduan->status == 'pending')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                        @elseif($aduan->status == 'diverifikasi')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">Diverifikasi</span>
                        @elseif($aduan->status == 'diproses')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Diproses</span>
                        @elseif($aduan->status == 'selesai')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('masyarakat.pengaduan.show', $aduan->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm inline-flex items-center">
                            Detail <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            <p>Belum ada laporan pengaduan yang diajukan.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

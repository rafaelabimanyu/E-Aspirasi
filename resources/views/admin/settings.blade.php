@extends('layouts.app')

@section('title', 'Pengaturan Sistem')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Pengaturan Sistem</h1>
    <p class="text-sm text-gray-500 mt-1">Kelola profil instansi dan konfigurasi aplikasi E-Aspirasi.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Profil Instansi -->
    <div class="card border border-gray-200 rounded-xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            Profil Instansi
        </h2>
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Instansi</label>
                <input type="text" value="Dinas Komunikasi & Informatika" class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea rows="2" class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:ring-blue-500 focus:border-blue-500">Gedung Pelayanan Publik Terpadu Lt. 2, Jl. Merdeka No. 1</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" value="(021) 123-4567" class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" value="layanan@e-aspirasi.go.id" class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            <div class="pt-2">
                <button type="button" class="btn px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium text-sm shadow-sm">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <!-- Konfigurasi Aplikasi -->
    <div class="card border border-gray-200 rounded-xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Konfigurasi Aplikasi
        </h2>
        <div class="space-y-5">
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                <div>
                    <p class="font-medium text-gray-900 text-sm">Mode Pemeliharaan</p>
                    <p class="text-xs text-gray-500 mt-0.5">Nonaktifkan akses publik sementara waktu.</p>
                </div>
                <div class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-300 transition-colors cursor-pointer">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
                </div>
            </div>
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                <div>
                    <p class="font-medium text-gray-900 text-sm">Registrasi Publik</p>
                    <p class="text-xs text-gray-500 mt-0.5">Izinkan masyarakat mendaftar akun baru.</p>
                </div>
                <div class="relative inline-flex h-6 w-11 items-center rounded-full bg-blue-600 transition-colors cursor-pointer">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                </div>
            </div>
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                <div>
                    <p class="font-medium text-gray-900 text-sm">Notifikasi Email</p>
                    <p class="text-xs text-gray-500 mt-0.5">Kirim notifikasi ke pelapor saat status berubah.</p>
                </div>
                <div class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-300 transition-colors cursor-pointer">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Sistem -->
<div class="card border border-gray-200 rounded-xl shadow-sm p-6 mt-8">
    <h2 class="text-lg font-bold text-gray-900 mb-4">Informasi Sistem</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-sm">
        <div>
            <p class="text-gray-500">Versi Aplikasi</p>
            <p class="font-bold text-gray-900 mt-1">v2.1.0</p>
        </div>
        <div>
            <p class="text-gray-500">Framework</p>
            <p class="font-bold text-gray-900 mt-1">Laravel {{ app()->version() }}</p>
        </div>
        <div>
            <p class="text-gray-500">PHP Version</p>
            <p class="font-bold text-gray-900 mt-1">{{ phpversion() }}</p>
        </div>
        <div>
            <p class="text-gray-500">Environment</p>
            <p class="font-bold text-gray-900 mt-1">{{ app()->environment() }}</p>
        </div>
    </div>
</div>
@endsection

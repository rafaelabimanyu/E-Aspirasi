@extends('layouts.app')

@section('title', 'Buat Laporan Baru')

@section('content')
<div class="mb-6">
    <a href="{{ route('masyarakat.pengaduan.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-4 transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Dashboard
    </a>
    <h1 class="text-2xl font-bold text-gray-900">Buat Laporan Pengaduan</h1>
    <p class="text-sm text-gray-500 mt-1">Sampaikan aspirasi atau keluhan Anda dengan mengisi formulir di bawah ini.</p>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden max-w-4xl">
    <form action="{{ route('masyarakat.pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Judul -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Laporan <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Ketik judul laporan Anda" 
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('title') border-red-500 @enderror">
                @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <select id="category" name="category" required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <option value="" disabled selected>Pilih kategori aduan</option>
                    <option value="Infrastruktur" {{ old('category') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                    <option value="Kesehatan" {{ old('category') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                    <option value="Pendidikan" {{ old('category') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                    <option value="Keamanan" {{ old('category') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                    <option value="Lingkungan" {{ old('category') == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                    <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('category') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Tanggal Kejadian -->
            <div>
                <label for="incident_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kejadian <span class="text-red-500">*</span></label>
                <input type="date" id="incident_date" name="incident_date" value="{{ old('incident_date') }}" required 
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                @error('incident_date') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Lokasi -->
            <div class="md:col-span-2">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi Kejadian <span class="text-red-500">*</span></label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" required placeholder="Contoh: Jl. Merdeka No.1, Kec. Sukamaju" 
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                @error('location') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Isi Laporan -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Isi Laporan <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="5" required placeholder="Ceritakan detail kejadian secara jelas dan lengkap..." 
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Upload Lampiran dengan AlpineJS untuk Preview -->
            <div class="md:col-span-2" x-data="{ photoName: null, photoPreview: null }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lampiran Foto (Opsional)</label>
                
                <input type="file" id="attachment" name="attachment" accept="image/jpeg,image/png,image/jpg" class="hidden" 
                    x-ref="photo"
                    x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                    ">
                
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition-colors cursor-pointer relative"
                    x-on:click="$refs.photo.click()">
                    
                    <div class="space-y-1 text-center" x-show="!photoPreview">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <span class="relative cursor-pointer bg-transparent rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                Pilih File
                            </span>
                            <p class="pl-1">atau drag & drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG maks 2MB</p>
                    </div>

                    <!-- Image Preview -->
                    <div x-show="photoPreview" class="text-center">
                        <span class="block w-full h-48 rounded-lg bg-cover bg-center bg-no-repeat shadow-sm"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                        <p class="text-sm text-gray-500 mt-2 truncate" x-text="photoName"></p>
                        <button type="button" class="mt-2 text-xs font-medium text-red-600 hover:text-red-800" 
                                x-on:click.stop="photoName = null; photoPreview = null; $refs.photo.value = null">
                            Hapus Foto
                        </button>
                    </div>
                </div>
                @error('attachment') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-gray-200 mt-4">
            <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
@endsection

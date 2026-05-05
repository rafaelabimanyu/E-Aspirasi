@extends('layouts.app')

@section('title', 'Sampaikan Laporan')

@section('content')
<div class="mb-6">
    <a href="{{ route('masyarakat.pengaduan.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-4 transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Dashboard
    </a>
    <h1 class="text-2xl font-bold text-gray-900">Sampaikan Laporan Anda</h1>
    <p class="text-sm text-gray-500 mt-1">Pilih klasifikasi yang tepat untuk mempercepat proses tindak lanjut instansi terkait.</p>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden max-w-4xl">
    <form action="{{ route('masyarakat.pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            
            <!-- Klasifikasi -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-3">Pilih Klasifikasi Laporan <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- Pengaduan -->
                    <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:bg-gray-50 transition-colors border-gray-300">
                        <input type="radio" name="classification" value="pengaduan" class="sr-only peer" required {{ old('classification') == 'pengaduan' ? 'checked' : '' }}>
                        <span class="peer-checked:border-blue-600 peer-checked:ring-1 peer-checked:ring-blue-600 absolute inset-0 rounded-lg pointer-events-none" aria-hidden="true"></span>
                        <div class="flex flex-1">
                            <div class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900">Pengaduan</span>
                                <span class="mt-1 flex items-center text-xs text-gray-500">Masalah konkret/pelanggaran.</span>
                            </div>
                        </div>
                        <svg class="h-5 w-5 text-blue-600 opacity-0 peer-checked:opacity-100 absolute right-4 top-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </label>

                    <!-- Aspirasi -->
                    <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:bg-gray-50 transition-colors border-gray-300">
                        <input type="radio" name="classification" value="aspirasi" class="sr-only peer" required {{ old('classification') == 'aspirasi' ? 'checked' : '' }}>
                        <span class="peer-checked:border-blue-600 peer-checked:ring-1 peer-checked:ring-blue-600 absolute inset-0 rounded-lg pointer-events-none" aria-hidden="true"></span>
                        <div class="flex flex-1">
                            <div class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900">Aspirasi</span>
                                <span class="mt-1 flex items-center text-xs text-gray-500">Saran, ide, atau usulan.</span>
                            </div>
                        </div>
                        <svg class="h-5 w-5 text-blue-600 opacity-0 peer-checked:opacity-100 absolute right-4 top-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </label>

                    <!-- Permintaan Informasi -->
                    <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:bg-gray-50 transition-colors border-gray-300">
                        <input type="radio" name="classification" value="informasi" class="sr-only peer" required {{ old('classification') == 'informasi' ? 'checked' : '' }}>
                        <span class="peer-checked:border-blue-600 peer-checked:ring-1 peer-checked:ring-blue-600 absolute inset-0 rounded-lg pointer-events-none" aria-hidden="true"></span>
                        <div class="flex flex-1">
                            <div class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900">Permintaan Informasi</span>
                                <span class="mt-1 flex items-center text-xs text-gray-500">Pertanyaan terkait layanan.</span>
                            </div>
                        </div>
                        <svg class="h-5 w-5 text-blue-600 opacity-0 peer-checked:opacity-100 absolute right-4 top-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </label>
                </div>
                @error('classification') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Judul -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Laporan <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Ketik judul laporan Anda" 
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('title') border-red-500 @enderror">
                @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori Topik <span class="text-red-500">*</span></label>
                <select id="category" name="category" required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <option value="" disabled selected>Pilih kategori yang sesuai</option>
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
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi Terperinci <span class="text-red-500">*</span></label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" required placeholder="Contoh: Jl. Merdeka No.1, Kec. Sukamaju (Sebutkan RT/RW jika ada)" 
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                @error('location') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Isi Laporan -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Laporan <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="5" required placeholder="Ceritakan kronologi atau detail aspirasi secara jelas dan komprehensif..." 
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Upload Lampiran -->
            <div class="md:col-span-2" x-data="{ photoName: null, photoPreview: null }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lampiran Bukti Fisik/Foto (Opsional)</label>
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
                            <span class="relative cursor-pointer bg-transparent rounded-md font-medium text-blue-600 hover:text-blue-500">Pilih File</span>
                            <p class="pl-1">atau drag & drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG maks 2MB</p>
                    </div>

                    <div x-show="photoPreview" class="text-center">
                        <span class="block w-full h-48 rounded-lg bg-cover bg-center bg-no-repeat shadow-sm" x-bind:style="'background-image: url(\'' + photoPreview + '\');'"></span>
                        <p class="text-sm text-gray-500 mt-2 truncate" x-text="photoName"></p>
                        <button type="button" class="mt-2 text-xs font-medium text-red-600 hover:text-red-800" x-on:click.stop="photoName = null; photoPreview = null; $refs.photo.value = null">Hapus Foto</button>
                    </div>
                </div>
                @error('attachment') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Opsi Privasi (Anonim & Rahasia) -->
            <div class="md:col-span-2 bg-blue-50 p-4 rounded-lg border border-blue-100 mt-2">
                <h4 class="text-sm font-semibold text-blue-800 mb-3">Pengaturan Privasi Laporan</h4>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_anonymous" name="is_anonymous" type="checkbox" value="1" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" {{ old('is_anonymous') ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_anonymous" class="font-medium text-gray-700">Anonim</label>
                            <p class="text-gray-500 text-xs">Identitas Anda tidak akan ditampilkan kepada publik atau instansi (tampil sebagai "Anonim").</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_secret" name="is_secret" type="checkbox" value="1" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" {{ old('is_secret') ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_secret" class="font-medium text-gray-700">Rahasia</label>
                            <p class="text-gray-500 text-xs">Laporan tidak akan ditampilkan di halaman publik/beranda. Hanya Anda dan petugas verifikasi yang dapat melihat.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex justify-between items-center pt-5 border-t border-gray-200 mt-6">
            <p class="text-xs text-gray-500"><span class="text-red-500">*</span> Wajib diisi</p>
            <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
@endsection

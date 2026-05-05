@extends('layouts.app')

@section('title', 'Manajemen Berita & Informasi')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Berita & Informasi</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola pengumuman, berita, dan edukasi publik.</p>
    </div>
    <button class="btn px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium text-sm flex items-center gap-2 shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Berita
    </button>
</div>

<!-- Berita Table -->
<div class="card border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-gray-700 text-xs uppercase font-semibold border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">#</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Tipe</th>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($news as $index => $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $news->firstItem() + $index }}</td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-800 line-clamp-1">{{ $item->title }}</div>
                        <div class="text-xs text-gray-500 line-clamp-1 mt-1">{{ Str::limit($item->content, 80) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                            {{ $item->type === 'pengumuman' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                            {{ $item->type }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button class="btn px-3 py-1.5 bg-yellow-500 text-white rounded text-xs font-medium hover:bg-yellow-600">Edit</button>
                            <button class="btn px-3 py-1.5 bg-red-600 text-white rounded text-xs font-medium hover:bg-red-700">Hapus</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">Belum ada data berita.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $news->links() }}
    </div>
</div>
@endsection

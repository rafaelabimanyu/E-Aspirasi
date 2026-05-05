<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | E-Aspirasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Abstract Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-blue-400/10 blur-3xl"></div>
        <div class="absolute top-[60%] -right-[10%] w-[40%] h-[60%] rounded-full bg-indigo-400/10 blur-3xl"></div>
    </div>

    <div class="max-w-2xl mx-auto px-6 py-12 text-center relative z-10">
        <div class="mb-8 flex justify-center">
            <div class="w-32 h-32 bg-white rounded-3xl shadow-xl shadow-slate-200/50 flex items-center justify-center border border-slate-100 transform rotate-3">
                <svg class="w-16 h-16 text-blue-600 -rotate-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <h1 class="text-7xl md:text-9xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-4 tracking-tighter">
            404
        </h1>
        <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-6">Oops! Halaman Tidak Ditemukan</h2>
        <p class="text-slate-600 mb-10 text-lg leading-relaxed max-w-lg mx-auto">
            Maaf, halaman atau berita yang Anda cari mungkin telah dipindahkan, dihapus, atau Anda salah memasukkan URL.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-blue-600/30">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Kembali ke Beranda
            </a>
            <a href="{{ url('/') }}#berita" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-white text-slate-700 font-bold rounded-xl hover:bg-slate-50 hover:-translate-y-1 transition-all duration-300 shadow-sm border border-slate-200">
                <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 6z"></path></svg>
                Baca Berita
            </a>
        </div>
    </div>
</body>
</html>

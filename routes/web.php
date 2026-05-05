<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/berita/{slug}', [\App\Http\Controllers\HomeController::class, 'show'])->name('news.show');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin & Petugas Routes
Route::middleware(['auth', 'role:admin,petugas'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/pengaduan/export', [\App\Http\Controllers\Admin\AdminController::class, 'exportPdf'])->name('pengaduan.export');
    Route::post('/pengaduan/{id}/status', [\App\Http\Controllers\Admin\AdminController::class, 'updateStatus'])->name('pengaduan.status');
});

// Masyarakat Routes
Route::middleware(['auth', 'role:masyarakat'])->prefix('masyarakat')->name('masyarakat.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Masyarakat\PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/create', [\App\Http\Controllers\Masyarakat\PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [\App\Http\Controllers\Masyarakat\PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan/{id}', [\App\Http\Controllers\Masyarakat\PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::post('/pengaduan/{id}/tanggapan', [\App\Http\Controllers\Masyarakat\PengaduanController::class, 'storeTanggapan'])->name('pengaduan.tanggapan');
});

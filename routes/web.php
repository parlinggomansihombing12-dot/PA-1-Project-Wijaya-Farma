<?php

use Illuminate\Support\Facades\Route;

// ================= CONTROLLER (PUBLIC / DEPAN) =================
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfilTokoController; 
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\KontakController;

// ================= CONTROLLER (ADMIN / BACKEND) =================
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminArtikelController;
use App\Http\Controllers\AdminLayananController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminProfilTokoController; 
use App\Http\Controllers\AdminKontakController; // Tambahkan controller baru ini
use App\Http\Controllers\ProfileController; 

/*
|--------------------------------------------------------------------------
| Web Routes - WIJAYA FARMA
|--------------------------------------------------------------------------
*/

// ==============================================
// 1. HALAMAN PUBLIK (BISA DIAKSES SIAPA SAJA)
// ==============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show'); 
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/profil', [ProfilTokoController::class, 'index'])->name('profil.index'); 
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

// ==============================================
// 2. HALAMAN ADMIN (WAJIB LOGIN & TERVERIFIKASI)
// ==============================================

// GRUP 2.A: DASHBOARD & AKUN
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// GRUP 2.B: RESOURCE CRUD & PENGATURAN TOKO
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.') 
    ->group(function () {

    // Kelola Konten (Resource)
    Route::resource('produk', AdminProdukController::class);
    Route::resource('kategori', AdminKategoriController::class)->except(['show']);
    Route::resource('artikel', AdminArtikelController::class)->except(['show']);
    Route::resource('layanan', AdminLayananController::class)->except(['show']);
    Route::resource('testimoni', AdminTestimoniController::class)->except(['show']);

    // ================= FITUR PROFIL TOKO ADMIN =================
    Route::get('profil-toko', [AdminProfilTokoController::class, 'index'])->name('profil-toko.index');
    Route::put('profil-toko/update', [AdminProfilTokoController::class, 'update'])->name('profil-toko.update');

    // ================= FITUR KONTAK & LOKASI ADMIN =================
    // Ini adalah fitur baru untuk mengelola alamat, no hp, dan map
    Route::get('kontak', [AdminKontakController::class, 'index'])->name('kontak.index');
    Route::put('kontak/update', [AdminKontakController::class, 'update'])->name('kontak.update');

});

// ==============================================
// SISTEM AUTHENTICATION (BREEZE)
// ==============================================
require __DIR__.'/auth.php';
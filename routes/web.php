<?php

use Illuminate\Support\Facades\Route;

// IMPORT SEMUA CONTROLLER PENGUNJUNG
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfilTokoController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\KontakController;

// IMPORT CONTROLLER ADMIN & PROFILE
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminKategoriController; 
use App\Http\Controllers\AdminLayananController;
use App\Http\Controllers\ProfileController;

// ==============================================
// 1. RUTE HALAMAN DEPAN (PENGUNJUNG)
// ==============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/profil', [ProfilTokoController::class, 'index'])->name('profil.index');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

// ==============================================
// 2. RUTE ADMIN & PROFILE (HANYA DIAKSES SETELAH LOGIN)
// ==============================================
Route::middleware(['auth'])->group(function () {

    // Rute Profile (Agar tidak error Route NotFound di Navigation)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute Grup Admin (Semua diawali /admin/...)
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // CRUD Kategori
        Route::get('/kategori', [AdminKategoriController::class, 'index'])->name('admin.kategori.index');
        
        // CRUD Produk
        Route::get('/produk', [AdminProdukController::class, 'index'])->name('admin.produk.index');

        // CRUD Layanan
        Route::get('/layanan', [AdminLayananController::class, 'index'])->name('admin.layanan.index');
        Route::post('/layanan', [AdminLayananController::class, 'store'])->name('admin.layanan.store');
        Route::put('/layanan/{id}', [AdminLayananController::class, 'update'])->name('admin.layanan.update');
        Route::delete('/layanan/{id}', [AdminLayananController::class, 'destroy'])->name('admin.layanan.destroy');
    });
});

// ==============================================
// 3. RUTE OTENTIKASI (BREEZE)
// ==============================================
require __DIR__.'/auth.php';
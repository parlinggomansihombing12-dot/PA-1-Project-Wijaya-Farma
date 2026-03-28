<?php

use Illuminate\Support\Facades\Route;

// ================= CONTROLLER (USER / PUBLIC) =================
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfilTokoController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\KontakController;

// ================= CONTROLLER (ADMIN) =================
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\ProfileController;

// ==============================================
// 1. HALAMAN PENGUNJUNG (PUBLIC - TANPA LOGIN)
// ==============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index'); // <-- Pastikan Controller ini tidak ada middleware auth
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/profil', [ProfilTokoController::class, 'index'])->name('profil.index');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');


// ==============================================
// 2. HALAMAN ADMIN (WAJIB LOGIN)
// ==============================================
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    // Dashboard Admin (Ganti nama agar tidak bentrok dengan default Breeze jika perlu)
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Profile Admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource Produk
    Route::resource('produk', AdminProdukController::class)->names('admin.produk');

    // Kategori Admin
    Route::prefix('kategori')->group(function () {
        Route::get('/', [AdminKategoriController::class, 'index'])->name('admin.kategori.index');
        Route::post('/', [AdminKategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/{id}/edit', [AdminKategoriController::class, 'edit'])->name('admin.kategori.edit'); // Tambahkan edit jika perlu
        Route::put('/{id}', [AdminKategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/{id}', [AdminKategoriController::class, 'destroy'])->name('admin.kategori.destroy');
    });

    // Artikel Admin
    Route::prefix('artikel')->group(function () {
        Route::get('/', [ArtikelController::class, 'index'])->name('admin.artikel.index');
        Route::post('/', [ArtikelController::class, 'store'])->name('admin.artikel.store');
        Route::put('/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
        Route::delete('/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');
    });

    // Layanan Admin
    Route::prefix('layanan')->group(function () {
        Route::get('/', [LayananController::class, 'index'])->name('admin.layanan.index');
        Route::post('/', [LayananController::class, 'store'])->name('admin.layanan.store');
        Route::put('/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
        Route::delete('/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
    });

    // Testimoni Admin
    Route::prefix('testimoni')->group(function () {
        Route::get('/', [AdminTestimoniController::class, 'index'])->name('admin.testimoni.index');
        Route::post('/', [AdminTestimoniController::class, 'store'])->name('admin.testimoni.store');
        Route::put('/{id}', [AdminTestimoniController::class, 'update'])->name('admin.testimoni.update');
        Route::delete('/{id}', [AdminTestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');
    });
});

require __DIR__.'/auth.php';
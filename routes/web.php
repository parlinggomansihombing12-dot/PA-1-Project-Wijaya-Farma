<?php

use Illuminate\Support\Facades\Route;

// ================= IMPORT CONTROLLER (USER) =================
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfilTokoController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\KontakController;

// ================= IMPORT CONTROLLER (ADMIN) =================
// Catatan: Saya sesuaikan dengan file yang sudah kamu buat sebelumnya
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\ProfileController;

// ==============================================
// 1. HALAMAN DEPAN (USER / PUBLIC)
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
// 2. ADMIN (HARUS LOGIN)
// ==============================================
Route::middleware(['auth'])->group(function () {

    // Profile Settings (Default Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Grouping dengan Prefix 'admin' (Contoh: /admin/produk)
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // ================= CRUD PRODUK =================
        Route::resource('produk', AdminProdukController::class)->names('admin.produk');

        // ================= CRUD KATEGORI =================
        // Menggunakan KategoriController yang sudah kamu buat tadi
        Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
        Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

        // ================= CRUD ARTIKEL =================
        // Menggunakan ArtikelController yang sudah kamu buat tadi
        Route::get('/artikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
        Route::post('/artikel', [ArtikelController::class, 'store'])->name('admin.artikel.store');
        Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
        Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');

        // ================= CRUD LAYANAN =================
        Route::get('/layanan', [LayananController::class, 'index'])->name('admin.layanan.index');
        Route::post('/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
        Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
        Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');

        // ================= CRUD TESTIMONI =================
        Route::get('/testimoni', [TestimoniController::class, 'index'])->name('admin.testimoni.index');
        Route::post('/testimoni', [TestimoniController::class, 'store'])->name('admin.testimoni.store');
        Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');
        
    });
});

require __DIR__.'/auth.php';
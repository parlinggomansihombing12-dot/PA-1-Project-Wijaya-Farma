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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminKategoriController; 
use App\Http\Controllers\AdminLayananController;
use App\Http\Controllers\AdminArtikelController; // Tambahkan ini
use App\Http\Controllers\AdminTestimoniController; // Tambahkan ini
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

    // Profile Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Grouping dengan Prefix 'admin' (Contoh: /admin/produk)
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // ================= CRUD PRODUK (LENGKAP) =================
        Route::resource('produk', AdminProdukController::class)->names('admin.produk');

        // ================= CRUD KATEGORI =================
        Route::get('/kategori', [AdminKategoriController::class, 'index'])->name('admin.kategori.index');
        Route::post('/kategori', [AdminKategoriController::class, 'store'])->name('admin.kategori.store');
        Route::put('/kategori/{id}', [AdminKategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/kategori/{id}', [AdminKategoriController::class, 'destroy'])->name('admin.kategori.destroy');

        // ================= CRUD LAYANAN =================
        Route::get('/layanan', [AdminLayananController::class, 'index'])->name('admin.layanan.index');
        Route::post('/layanan', [AdminLayananController::class, 'store'])->name('admin.layanan.store');
        Route::put('/layanan/{id}', [AdminLayananController::class, 'update'])->name('admin.layanan.update');
        Route::delete('/layanan/{id}', [AdminLayananController::class, 'destroy'])->name('admin.layanan.destroy');

        // ================= CRUD ARTIKEL (Mengatasi 404 Gambar 3) =================
        Route::get('/artikel', [AdminArtikelController::class, 'index'])->name('admin.artikel.index');
        Route::post('/artikel', [AdminArtikelController::class, 'store'])->name('admin.artikel.store');
        Route::put('/artikel/{id}', [AdminArtikelController::class, 'update'])->name('admin.artikel.update');
        Route::delete('/artikel/{id}', [AdminArtikelController::class, 'destroy'])->name('admin.artikel.destroy');

        // ================= CRUD TESTIMONI =================
        Route::get('/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni.index');
        Route::post('/testimoni', [AdminTestimoniController::class, 'store'])->name('admin.testimoni.store');
        Route::delete('/testimoni/{id}', [AdminTestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');
        
    });
});

// ==============================================
// 3. AUTH (LOGIN, REGISTER)
// ==============================================
require __DIR__.'/auth.php';
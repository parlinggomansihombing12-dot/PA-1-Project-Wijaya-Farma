<?php

use Illuminate\Support\Facades\Route;

// ================= CONTROLLER (PUBLIC) =================
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
use App\Http\Controllers\AdminArtikelController;
use App\Http\Controllers\AdminLayananController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\ProfileController;


// ==============================================
// 1. PUBLIC (TANPA LOGIN)
// ==============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/profil', [ProfilTokoController::class, 'index'])->name('profil.index');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');


// ==============================================
// 2. ADMIN (WAJIB LOGIN)
// ==============================================

// GRUP 1: KHUSUS DASHBOARD & PROFILE
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// GRUP 2: RESOURCE ADMIN (Otomatis mendapat nama awalan 'admin.')
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Saya hapus pemblokiran 'create' untuk semuanya!
    // Hanya memblokir 'show' (karena biasanya admin tidak butuh halaman detail terpisah, cukup di tabel)
    Route::resource('produk', AdminProdukController::class);
    Route::resource('kategori', AdminKategoriController::class)->except(['show']);
    Route::resource('artikel', AdminArtikelController::class)->except(['show']);
    Route::resource('layanan', AdminLayananController::class)->except(['show']);
    Route::resource('testimoni', AdminTestimoniController::class)->except(['show']);

});

require __DIR__.'/auth.php';
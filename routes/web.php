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

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// PRODUK
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// KATEGORI
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// LAYANAN
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');

// ARTIKEL
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

// PROFIL
Route::get('/profil', [ProfilTokoController::class, 'index'])->name('profil.index');

// TESTIMONI (FIX DI SINI 🔥)
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

// KONTAK
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');


// ==============================================
// DASHBOARD REDIRECT
// ==============================================
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');


// ==============================================
// 2. ADMIN (WAJIB LOGIN)
// ==============================================
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ================= RESOURCE =================
    Route::resource('produk', AdminProdukController::class);
    Route::resource('kategori', AdminKategoriController::class)->except(['show']);
    Route::resource('artikel', AdminArtikelController::class)->except(['show']);
    Route::resource('layanan', AdminLayananController::class)->except(['show']);
    Route::resource('testimoni', AdminTestimoniController::class)->except(['show']);

});


// ==============================================
// AUTH (LOGIN, REGISTER, DLL)
// ==============================================
require __DIR__.'/auth.php';
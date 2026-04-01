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
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes - WIJAYA FARMA
|--------------------------------------------------------------------------
*/

// ==============================================
// 1. HALAMAN PUBLIK (BISA DIAKSES SIAPA SAJA)
// ==============================================

// HOME / BERANDA
Route::get('/', [HomeController::class, 'index'])->name('home');

// KATALOG PRODUK
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show'); // 🔥 FIX: Route Detail Produk

// KATEGORI
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// LAYANAN KAMI
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');

// ARTIKEL / BLOG
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

// PROFIL TOKO
Route::get('/profil', [ProfilTokoController::class, 'index'])->name('profil.index');

// TESTIMONI PELANGGAN
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

// KONTAK KAMI
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');


// ==============================================
// REDIRECT OTOMATIS SETELAH LOGIN
// ==============================================
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');


// ==============================================
// 2. HALAMAN ADMIN (WAJIB LOGIN & TERVERIFIKASI)
// ==============================================
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // DASHBOARD UTAMA ADMIN
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // KELOLA PROFIL USER ADMIN
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ================= FITUR CRUD ADMIN (RESOURCE) =================
    
    // Kelola Produk (Tambah, Edit, Hapus)
    Route::resource('produk', AdminProdukController::class);
    
    // Kelola Kategori (Tanpa halaman Show)
    Route::resource('kategori', AdminKategoriController::class)->except(['show']);
    
    // Kelola Artikel (Tanpa halaman Show)
    Route::resource('artikel', AdminArtikelController::class)->except(['show']);
    
    // Kelola Layanan (Tanpa halaman Show)
    Route::resource('layanan', AdminLayananController::class)->except(['show']);
    
    // Kelola Testimoni (Tanpa halaman Show)
    Route::resource('testimoni', AdminTestimoniController::class)->except(['show']);

});


// ==============================================
// SISTEM AUTHENTICATION (LOGIN, REGISTER, LOGOUT)
// ==============================================
require __DIR__.'/auth.php';
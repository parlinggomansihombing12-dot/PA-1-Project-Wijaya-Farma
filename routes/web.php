{{-- 1. Ganti extends ke layout admin Anda (biasanya layouts.admin atau layouts.app_admin) --}}
@extends('layouts.admin') 

@section('title', 'Data Produk - Admin Wijaya Farma')

<<<<<<< HEAD
@section('content')
<div class="container-fluid p-4">
    
    <!-- HEADER HALAMAN -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Data Produk Obat</h3>
        
        <!-- TOMBOL TAMBAH -->
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary shadow-sm px-4">
            <i class="fas fa-plus me-2"></i>Tambah Produk
        </a>
    </div>

    <!-- FORM PENCARIAN -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.produk.index') }}" method="GET" class="row g-2">
                <div class="col-md-10">
                    <input type="search" name="cari" class="form-control" placeholder="Cari berdasarkan nama obat..." value="{{ request('cari') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100">Cari</button>
                </div>
            </form>
        </div>
    </div>
=======
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
use App\Http\Controllers\AdminKategoriArtikelController; // <--- INI TAMBAHAN WAJIB
use App\Http\Controllers\AdminLayananController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminProfilTokoController; 
use App\Http\Controllers\AdminKontakController;
use App\Http\Controllers\ProfileController; 
>>>>>>> 66601765ea31b82f93cf56b08b2fde51ac861ae6

    <!-- TABEL DATA (Agar Seragam dengan Halaman Kategori) -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="py-3 px-4" style="width: 50px;">No</th>
                            <th class="py-3">Foto</th>
                            <th class="py-3">Nama Obat</th>
                            <th class="py-3">Harga</th>
                            <th class="py-3">Stok</th>
                            <th class="py-3 text-center" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $index => $item)
                        <tr>
                            <td class="px-4 text-center">{{ $index + 1 }}</td>
                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('images/produk/' . $item->foto) }}" width="60" class="rounded shadow-sm border">
                                @else
                                    <div class="bg-light rounded text-center d-flex align-items-center justify-content-center" style="width: 60px; height: 45px;">
                                        <small class="text-muted" style="font-size: 10px;">No Img</small>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $item->nama_obat }}</div>
                                <small class="text-muted">{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}</small>
                            </td>
                            <td class="fw-bold text-primary">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $item->stok > 10 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->stok }} pcs
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn btn-warning btn-sm text-white px-3">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-box-open fa-3x mb-3 opacity-25"></i><br>
                                Belum ada data produk yang tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<<<<<<< HEAD
</div>
@endsection
=======
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
    
    // =========================================================
    // INI DIA RUTE YANG TADI HILANG (KATEGORI ARTIKEL)
    // =========================================================
    Route::resource('kategori-artikel', AdminKategoriArtikelController::class)->only(['store', 'destroy']);
    
    Route::resource('layanan', AdminLayananController::class)->except(['show']);
    Route::resource('testimoni', AdminTestimoniController::class)->except(['show']);

    // ================= FITUR PROFIL TOKO ADMIN =================
    Route::get('profil-toko', [AdminProfilTokoController::class, 'index'])->name('profil.index');
    Route::put('profil-toko/update', [AdminProfilTokoController::class, 'update'])->name('profil.update');

    // ================= FITUR KONTAK & LOKASI ADMIN =================
    Route::get('kontak', [AdminKontakController::class, 'index'])->name('kontak.index');
    Route::put('kontak/update', [AdminKontakController::class, 'update'])->name('kontak.update');

});

require __DIR__.'/auth.php';
>>>>>>> 66601765ea31b82f93cf56b08b2fde51ac861ae6

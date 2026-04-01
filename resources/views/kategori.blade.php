@extends('layouts.main')

@section('title', 'Kategori Obat - Wijaya Farma')

{{-- Bagian CSS Khusus Halaman Kategori --}}
@section('custom-css')
<style>
    body { background-color: #f4f7f6; }

    /* SIDEBAR STYLING */
    .sidebar-kategori {
        background: white !important;
        border-right: 1px solid #dee2e6;
        min-height: calc(100vh - 70px);
        position: sticky;
        top: 70px;
        padding-top: 20px;
        z-index: 100;
    }

    .sidebar-label {
        font-size: 11px;
        font-weight: 800;
        color: #999;
        text-transform: uppercase;
        padding: 0 25px 10px;
        letter-spacing: 1px;
    }

    .kategori-link {
        display: flex;
        align-items: center;
        padding: 12px 25px;
        color: #444;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
        border-left: 4px solid transparent;
    }

    .kategori-link:hover {
        background: #f0fdfa;
        color: #1abc9c;
    }

    .kategori-link.active {
        background: #e6f7f4;
        color: #1abc9c;
        border-left: 4px solid #1abc9c;
        font-weight: 700;
    }

    /* KONTEN UTAMA */
    .main-content-area {
        padding: 30px;
        background: #f8f9fa;
    }

    /* SEARCH BOX */
    .search-wrapper {
        background: white;
        padding: 15px;
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        margin-bottom: 30px;
        border: 1px solid #eee;
    }

    .search-input {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        background: transparent;
    }

    /* KARTU PRODUK (PENTING: Mencegah Gambar Flowchart Melebar) */
    .card-produk {
        background: white;
        border-radius: 15px;
        padding: 15px;
        border: 1px solid #eee;
        transition: 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden; /* MEMOTONG GAMBAR JIKA TERLALU BESAR */
    }

    .card-produk:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }

    /* WADAH GAMBAR - KUNCI AGAR GAMBAR TIDAK MERUSAK LAYOUT */
    .img-box {
        height: 150px; /* Tinggi maksimal gambar */
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        background: #fff;
        overflow: hidden; /* Memotong gambar yang keluar jalur */
    }

    .img-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain; /* Memaksa gambar tetap proporsional di dalam kotak */
    }

    .badge-keras {
        position: absolute; top: 12px; right: 12px; width: 22px; height: 22px;
        background: #ff4d4d; color: white; border-radius: 50%; font-size: 11px;
        display: flex; align-items: center; justify-content: center; font-weight: 800; border: 1px solid #000;
    }

    .nama-obat {
        font-size: 14px;
        font-weight: 700;
        color: #333;
        margin-bottom: 5px;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Batasi maksimal 2 baris teks */
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 40px;
    }

    .harga-obat {
        font-size: 15px;
        font-weight: 800;
        color: #1abc9c;
        margin-top: auto;
    }

    .btn-lihat {
        margin-top: 15px;
        background: #1abc9c;
        color: white;
        text-align: center;
        padding: 8px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-lihat:hover { background: #16a085; color: white; }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row g-0">
        
        <!-- SIDEBAR (BAGIAN KIRI) -->
        <div class="col-md-2 d-none d-md-block p-0">
            <div class="sidebar-kategori shadow-sm">
                <p class="sidebar-label">Pilih Kategori</p>
                
                <a href="/kategori" class="kategori-link {{ empty($kategori_aktif) ? 'active' : '' }}">
                   <span class="me-2">📦</span> Semua Produk
                </a>

                @foreach($list_kategori as $kat)
                <a href="/kategori?kategori={{ $kat->id }}" class="kategori-link {{ $kategori_aktif == $kat->id ? 'active' : '' }}">
                    <span class="me-2">💊</span> {{ $kat->nama_kategori }}
                </a>
                @endforeach
            </div>
        </div>

        <!-- AREA PRODUK (BAGIAN KANAN) -->
        <div class="col-md-10 main-content-area">
            
            <!-- Form Pencarian -->
            <div class="search-wrapper">
                <form action="/kategori" method="GET" class="d-flex align-items-center">
                    @if($kategori_aktif)
                        <input type="hidden" name="kategori" value="{{ $kategori_aktif }}">
                    @endif
                    <i class="fas fa-search text-muted mx-3"></i>
                    <input type="text" name="cari" class="form-control search-input w-100" 
                           placeholder="Cari obat atau vitamin yang anda butuhkan..." value="{{ request('cari') }}">
                </form>
            </div>

            <!-- Judul Kategori -->
            <h4 class="fw-bold mb-4">
                {{ $kategori_aktif ? $list_kategori->where('id', $kategori_aktif)->first()->nama_kategori : 'Semua Obat' }}
            </h4>

            <!-- Grid Produk -->
            <div class="row g-4">
                @forelse($list_produk as $item)
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <div class="card-produk">
                        <!-- Tanda Obat Keras (Opsional) -->
                        <div class="badge-keras" title="Obat Keras">K</div>

                        <!-- Kotak Gambar (Kunci perbaikan anda) -->
                        <div class="img-box">
                            @if($item->foto)
                                <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                            @else
                                <img src="https://via.placeholder.com/200x200?text=No+Image" alt="no-image">
                            @endif
                        </div>

                        <div class="small text-muted fw-bold mb-1" style="font-size: 10px;">WIJAYA FARMA</div>
                        <div class="nama-obat">{{ $item->nama_obat }}</div>
                        <div class="harga-obat">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

                        <a href="/produk/{{ $item->id }}" class="btn-lihat">Lihat Detail</a>
                    </div>
                </div>
                @empty
                <!-- Tampilan Jika Tidak Ada Produk -->
                <div class="col-12 text-center py-5">
                    <div class="mb-3"><i class="fas fa-pills fa-4x text-muted opacity-25"></i></div>
                    <h5 class="text-muted">Maaf, obat tidak ditemukan.</h5>
                    <p class="text-muted small">Coba cari dengan kata kunci lain atau pilih kategori berbeda.</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
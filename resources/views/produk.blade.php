@extends('layouts.main')

@section('title', 'Semua Produk - Wijaya Farma')

@section('custom-css')
<style>
    body { background-color: #f4f7f6; }

    /* HEADER SECTION */
    .product-header {
        background: white;
        padding: 40px 0;
        margin-bottom: 30px;
        border-bottom: 1px solid #eee;
    }

    .section-title {
        font-weight: 800;
        color: #333;
        margin-bottom: 10px;
        font-size: 2rem;
    }

    /* SEARCH BAR */
    .search-wrapper {
        max-width: 600px;
        margin: 0 auto;
    }

    .search-box {
        border-radius: 50px;
        padding: 12px 25px;
        border: 2px solid #e0e0e0 !important;
        transition: 0.3s;
        font-size: 1rem;
    }

    .search-box:focus {
        border-color: #1abc9c !important;
        box-shadow: 0 0 15px rgba(26, 188, 156, 0.15) !important;
    }

    .btn-cari {
        background: #1abc9c;
        color: white;
        border-radius: 50px;
        padding: 10px 30px;
        font-weight: 700;
        border: none;
        margin-left: -5px; /* Menempelkan tombol ke input */
        transition: 0.3s;
    }

    .btn-cari:hover {
        background: #16a085;
        color: white;
    }

    /* PRODUCT CARD GRID */
    .product-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        border: none;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    }

    .img-container {
        height: 180px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        border-radius: 15px;
        background: #f9f9f9;
        overflow: hidden;
    }

    .img-container img {
        max-width: 80%;
        max-height: 80%;
        object-fit: contain;
    }

    .category-label {
        font-size: 11px;
        text-transform: uppercase;
        font-weight: 700;
        color: #1abc9c;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .product-name {
        font-size: 16px;
        font-weight: 700;
        color: #2d3436;
        margin-bottom: 10px;
        min-height: 48px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-price {
        font-size: 17px;
        font-weight: 800;
        color: #1abc9c;
    }

    /* STOK STYLING */
    .product-stock {
        font-size: 12px;
        font-weight: 600;
        color: #636e72;
    }

    .btn-detail {
        margin-top: 15px;
        background: #f1f2f6;
        color: #2d3436;
        text-align: center;
        padding: 10px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        font-size: 13px;
        transition: 0.3s;
    }

    .btn-detail:hover {
        background: #1abc9c;
        color: white;
    }

</style>
@endsection

@section('content')

<!-- HEADER & SEARCH -->
<div class="product-header shadow-sm">
    <div class="container text-center">
        <h1 class="section-title">Katalog Produk</h1>
        <p class="text-muted mb-4">Temukan obat-obatan berkualitas untuk kesehatan keluarga anda</p>
        
        <div class="search-wrapper">
            <!-- Form sudah diarahkan ke /produk dengan method GET -->
            <form action="{{ url('/produk') }}" method="GET" class="input-group">
                <input type="text" name="cari" class="form-control search-box shadow-none" 
                       placeholder="Cari nama obat atau kategori..." value="{{ request('cari') }}">
                <button type="submit" class="btn btn-cari shadow-sm">Cari</button>
            </form>
        </div>
    </div>
</div>

<!-- PRODUCT GRID -->
<div class="container pb-5">
    <div class="row g-4">
        @forelse($list_produk as $item)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-card">
                <div class="category-label">
                    {{ $item->kategori->nama_kategori ?? 'Umum' }}
                </div>

                <div class="img-container">
                    @if($item->foto)
                        <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                    @else
                        <img src="https://via.placeholder.com/200x200?text=No+Image" alt="no-image">
                    @endif
                </div>

                <div class="product-name">{{ $item->nama_obat }}</div>

                <!-- Bagian Harga dan Stok (Ditambahkan) -->
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <div class="product-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                    
                    <div class="product-stock">
                        @if($item->stok > 0)
                            <span class="text-muted">Stok:</span> <b class="text-dark">{{ $item->stok }}</b>
                        @else
                            <span class="badge bg-danger">Habis</span>
                        @endif
                    </div>
                </div>

                <a href="/produk/{{ $item->id }}" class="btn-detail">Lihat Detail Produk</a>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="120" class="mb-3 opacity-25">
            <h4 class="text-muted">Obat tidak ditemukan</h4>
            <p class="text-muted">Coba gunakan kata kunci pencarian yang lain.</p>
        </div>
        @endforelse
    </div>
</div>

@endsection
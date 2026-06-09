@extends('layouts.main')

@section('title', 'Semua Produk - Wijaya Farma')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d1fae5;
        --accent: #e67e22;
        --dark: #1e293b;
        --text-muted: #64748b;
    }

    /* ================= HEADER ================= */
    .product-header {
        background: linear-gradient(135deg, #1a2634 0%, #2c3e50 100%);
        padding: 35px 0;
        margin-bottom: 30px;
        text-align: center;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: white;
        margin-bottom: 8px;
    }

    .product-header p {
        color: rgba(255,255,255,0.8);
        font-size: 0.85rem;
    }

    /* ================= SEARCH ================= */
    .search-wrapper {
        max-width: 500px;
        margin: 0 auto;
    }

    .search-input-group {
        display: flex;
        background: white;
        border-radius: 50px;
        overflow: hidden;
    }

    .search-box {
        flex: 1;
        border: none;
        padding: 10px 18px;
        font-size: 0.85rem;
        outline: none;
    }

    .btn-cari {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: white;
        border: none;
        padding: 10px 24px;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
    }

    /* ================= PRODUK WRAPPER ================= */
    .produk-wrapper {
        padding: 0 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .produk-header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .produk-title {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--dark);
    }

    .produk-count {
        background: white;
        padding: 4px 14px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--text-muted);
        border: 1px solid #e2e8f0;
    }

    /* ================= GRID 6 KOLOM ================= */
    .produk-flex {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -8px;
    }

    .produk-item {
        flex: 0 0 16.666%;
        max-width: 16.666%;
        padding: 0 8px;
        margin-bottom: 16px;
    }

    /* ================= CARD PRODUK ================= */
    .product-card {
        background: white;
        border-radius: 14px;
        transition: all 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        overflow: hidden;
        border: 1px solid #eef2f6;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .category-badge {
        position: absolute;
        top: 8px;
        left: 8px;
        background: rgba(0,0,0,0.6);
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 0.55rem;
        font-weight: 700;
        color: white;
        z-index: 1;
    }

    .img-container {
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        padding: 10px;
        position: relative;
    }

    .img-container img {
        max-width: 85%;
        max-height: 85px;
        object-fit: contain;
    }

    .product-content {
        padding: 10px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .product-name {
        font-size: 0.8rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 34px;
    }

    .product-price {
        font-size: 0.9rem;
        font-weight: 800;
        color: #e67e22;
    }

    .stock-wrapper {
        background: #f8fafc;
        border-radius: 8px;
        padding: 5px 8px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.65rem;
        font-weight: 700;
    }

    .stock-label {
        color: #475569;
    }

    .stock-value.stock-good { color: #15803d; }
    .stock-value.stock-low { color: #b45309; }
    .stock-value.stock-out { color: #b91c1c; }

    .btn-detail {
        background: #f1f5f9;
        text-align: center;
        padding: 7px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.7rem;
        color: #1e293b;
        border: 1px solid #e2e8f0;
        margin-top: 5px;
        transition: 0.2s;
    }

    .btn-detail:hover {
        background: var(--primary);
        color: white;
    }

    /* ================= PAGINATION PREMIUM ================= */
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 30px;
        padding: 15px 0;
        border-top: 1px solid #eef2f6;
    }

    /* Info Pagination di KIRI */
    .pagination-info {
        font-size: 0.7rem;
        color: var(--text-muted);
        background: #f8fafc;
        padding: 6px 15px;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .pagination-info i {
        color: var(--primary);
        font-size: 0.7rem;
    }

    .pagination-info strong {
        color: var(--primary-dark);
        font-weight: 800;
    }

    /* Tombol Pagination di TENGAH */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        flex: 1;
    }

    /* HAPUS TULISAN "SHOWING" BAWAHAN LARAVEL */
    .pagination-wrapper p.text-sm {
        display: none !important;
    }
    
    /* Hapus seluruh info bawaan Laravel */
    .pagination-wrapper div:first-child {
        display: none !important;
    }
    
    .pagination-wrapper nav {
        display: flex;
        justify-content: center;
    }

    .pagination {
        display: flex;
        gap: 6px;
        list-style: none;
        margin: 0;
        padding: 0;
        flex-wrap: wrap;
        justify-content: center;
    }

    .page-item {
        display: inline;
    }

    .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 34px;
        height: 34px;
        padding: 0 12px;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        color: var(--text-muted);
        font-size: 0.7rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .page-link:hover {
        background: var(--primary-light);
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-2px);
    }

    .active .page-link {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-color: transparent;
        color: white;
        box-shadow: 0 2px 6px rgba(26,188,156,0.3);
    }

    .disabled .page-link {
        background: #f1f5f9;
        color: #cbd5e1;
        cursor: not-allowed;
        transform: none;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1300px) { .produk-item { flex: 0 0 20%; max-width: 20%; } }
    @media (max-width: 1100px) { .produk-item { flex: 0 0 25%; max-width: 25%; } }
    @media (max-width: 900px) { .produk-item { flex: 0 0 33.333%; max-width: 33.333%; } }
    @media (max-width: 600px) { .produk-item { flex: 0 0 50%; max-width: 50%; } }
    @media (max-width: 400px) { .produk-item { flex: 0 0 100%; max-width: 100%; } }

    @media (max-width: 768px) {
        .section-title { font-size: 1.4rem; }
        .product-header { padding: 25px 0; }
        .search-wrapper { max-width: 90%; }
        .pagination-container {
            flex-direction: column;
            justify-content: center;
        }
        .pagination-wrapper {
            width: 100%;
        }
        .page-link {
            min-width: 30px;
            height: 30px;
            padding: 0 8px;
            font-size: 0.65rem;
        }
    }
</style>
@endsection

@section('content')

<div class="product-header">
    <h1 class="section-title">✨ Katalog Produk ✨</h1>
    <p>Temukan obat-obatan berkualitas untuk kesehatan keluarga anda</p>
    
    <div class="search-wrapper">
        <form action="{{ url('/produk') }}" method="GET">
            <div class="search-input-group">
                <input type="text" name="cari" class="search-box" 
                       placeholder="Cari nama obat atau kategori..." value="{{ request('cari') }}">
                <button type="submit" class="btn-cari">🔍 Cari</button>
            </div>
            @if(request('cari'))
            <div class="mt-2">
                <a href="{{ url('/produk') }}" class="btn-reset" style="background: white; padding: 6px 18px; border-radius: 50px; font-size: 0.75rem; text-decoration: none; color: #64748b;">🔄 Reset</a>
            </div>
            @endif
        </form>
    </div>
</div>

<div class="produk-wrapper">
    <div class="produk-header-section">
        <div class="produk-title">Semua Produk</div>
        <div class="produk-count">📊 {{ $list_produk->total() ?? $list_produk->count() }} produk</div>
    </div>

    <div class="produk-flex">
        @forelse($list_produk as $item)
        <div class="produk-item">
            <div class="product-card">
                <div class="category-badge">📂 {{ $item->kategori->nama_kategori ?? 'Umum' }}</div>
                <div class="img-container">
                    @if($item->foto)
                        <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="no-image">
                    @endif
                </div>
                <div class="product-content">
                    <div class="product-name">{{ $item->nama_obat }}</div>
                    <div class="product-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                    <div class="stock-wrapper">
                        <span class="stock-label">STOK</span>
                        @php
                            $stockClass = $item->stok <= 0 ? 'stock-out' : ($item->stok <= 5 ? 'stock-low' : 'stock-good');
                            $stockIcon = $item->stok <= 0 ? '❌' : ($item->stok <= 5 ? '⚠️' : '✅');
                            $stockText = $item->stok <= 0 ? 'HABIS' : ($item->stok <= 5 ? 'SISA ' . $item->stok : $item->stok . ' tersedia');
                        @endphp
                        <span class="stock-value {{ $stockClass }}">{{ $stockIcon }} {{ $stockText }}</span>
                    </div>
                    <a href="/produk/{{ $item->id }}?from=produk" class="btn-detail">👁️ Detail →</a>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state-full" style="text-align: center; padding: 40px; width: 100%;">
            <h4>🌿 Obat tidak ditemukan</h4>
            <a href="{{ url('/produk') }}" class="btn-cari" style="display: inline-block; border-radius: 50px; margin-top: 10px;">🔄 Reset</a>
        </div>
        @endforelse
    </div>

    <!-- PAGINATION PREMIUM - HANYA SATU "SHOWING" DI KIRI -->
    @if(method_exists($list_produk, 'links') && $list_produk instanceof \Illuminate\Pagination\AbstractPaginator)
    <div class="pagination-container">
        <!-- Info Showing di KIRI (SATU-SATUNYA) -->
        <div class="pagination-info">
            <i class="fas fa-chart-line"></i>
            Showing 
            <strong>{{ $list_produk->firstItem() ?? 0 }}</strong> 
            to 
            <strong>{{ $list_produk->lastItem() ?? 0 }}</strong> 
            of 
            <strong>{{ $list_produk->total() }}</strong> 
            results
        </div>
        
        <!-- Tombol Pagination di TENGAH (TANPA "SHOWING") -->
        <div class="pagination-wrapper">
            {{ $list_produk->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
    @endif
</div>

@endsection
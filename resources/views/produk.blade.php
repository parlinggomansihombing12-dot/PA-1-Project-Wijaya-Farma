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
        --white: #ffffff;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
        --shadow-lg: 0 8px 25px rgba(0,0,0,0.08);
    }

    /* ================= HEADER - WARNA SAMA DENGAN BACKGROUND BAWAH ================= */
    .product-header {
        background: transparent;
        padding: 40px 0 20px 0;
        margin-bottom: 20px;
        text-align: center;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .product-header p {
        color: var(--text-muted);
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
        border-radius: 60px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        border: 1px solid #e2e8f0;
    }

    .search-box {
        flex: 1;
        border: none;
        padding: 12px 20px;
        font-size: 0.85rem;
        outline: none;
        background: transparent;
    }

    .btn-cari {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 12px 28px;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-cari:hover {
        background: linear-gradient(135deg, var(--primary-dark), #0e7c64);
        transform: translateY(-2px);
    }

    .btn-reset {
        background: #f1f5f9;
        padding: 8px 20px;
        border-radius: 60px;
        font-size: 0.7rem;
        text-decoration: none;
        color: var(--text-muted);
        border: 1px solid #e2e8f0;
        display: inline-block;
        transition: 0.2s;
    }

    .btn-reset:hover {
        background: #e2e8f0;
        color: var(--dark);
    }

    /* ================= PRODUK WRAPPER ================= */
    .produk-wrapper {
        padding: 0 20px;
        max-width: 1400px;
        margin: 0 auto;
        background: transparent;
    }

    .produk-header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .produk-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--dark);
        position: relative;
    }

    .produk-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        border-radius: 3px;
    }

    .produk-count {
        background: #f8fafc;
        padding: 5px 16px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--text-muted);
        border: 1px solid #e2e8f0;
        box-shadow: var(--shadow-sm);
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
        margin-bottom: 20px;
    }

    /* ================= CARD PRODUK ================= */
    .product-card {
        background: white;
        border-radius: 16px;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        border: 1px solid #eef2f6;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .category-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(0,0,0,0.65);
        backdrop-filter: blur(4px);
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.6rem;
        font-weight: 700;
        color: white;
        z-index: 1;
    }

    .img-container {
        height: 130px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        padding: 12px;
        position: relative;
    }

    .img-container img {
        max-width: 85%;
        max-height: 95px;
        object-fit: contain;
        transition: transform 0.2s;
    }

    .product-card:hover .img-container img {
        transform: scale(1.05);
    }

    .product-content {
        padding: 12px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .product-name {
        font-size: 0.8rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 35px;
    }

    .product-price {
        font-size: 0.95rem;
        font-weight: 800;
        color: #e67e22;
    }

    .stock-wrapper {
        background: #f8fafc;
        border-radius: 8px;
        padding: 6px 10px;
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
        padding: 8px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.7rem;
        color: #1e293b;
        border: 1px solid #e2e8f0;
        margin-top: 6px;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .btn-detail:hover {
        background: var(--primary);
        color: white;
        gap: 8px;
    }

    /* ================= PAGINATION PREMIUM ================= */
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 35px;
        padding: 15px 0;
        border-top: 1px solid #eef2f6;
    }

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

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        flex: 1;
    }

    .pagination-wrapper p.text-sm {
        display: none !important;
    }
    
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
        .section-title { font-size: 1.5rem; }
        .product-header { padding: 30px 0 15px 0; }
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
        .produk-title { font-size: 1.1rem; }
        .img-container { height: 120px; }
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
                <a href="{{ url('/produk') }}" class="btn-reset">🔄 Reset</a>
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
        <div class="empty-state-full" style="text-align: center; padding: 50px; width: 100%;">
            <i class="fas fa-box-open fa-3x mb-3 opacity-25"></i>
            <h4>🌿 Obat tidak ditemukan</h4>
            <a href="{{ url('/produk') }}" class="btn-cari" style="display: inline-block; border-radius: 50px; margin-top: 15px;">🔄 Reset</a>
        </div>
        @endforelse
    </div>

    <!-- PAGINATION PREMIUM -->
    @if(method_exists($list_produk, 'links') && $list_produk instanceof \Illuminate\Pagination\AbstractPaginator)
    <div class="pagination-container">
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
        
        <div class="pagination-wrapper">
            {{ $list_produk->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
    @endif
</div>

<!-- SCRIPT UNTUK NAVBAR SCROLL -->
<script>
(function() {
    function updateNavbar() {
        var nav = document.getElementById('mainNavbar');
        if (!nav) return;
        
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', updateNavbar);
    updateNavbar();
})();
</script>

@endsection
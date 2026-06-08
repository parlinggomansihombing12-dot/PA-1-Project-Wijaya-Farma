@extends('layouts.main')

@section('title', 'Kategori Obat - Wijaya Farma')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d1fae5;
        --secondary: #2c3e50;
        --accent: #e67e22;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
        min-height: 100vh;
    }

    /* Background Pattern */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path fill="none" stroke="%231ABC9C" stroke-width="1" d="M10 10 L90 10 M10 20 L90 20 M10 30 L90 30 M10 40 L90 40 M10 50 L90 50 M10 60 L90 60 M10 70 L90 70 M10 80 L90 80 M10 90 L90 90 M20 10 L20 90 M30 10 L30 90 M40 10 L40 90 M50 10 L50 90 M60 10 L60 90 M70 10 L70 90 M80 10 L80 90"/></svg>');
        background-repeat: repeat;
        background-size: 40px;
        z-index: -1;
        pointer-events: none;
    }

    .container-fluid, .main-content-area {
        position: relative;
        z-index: 2;
    }

    /* ============ SIDEBAR KATEGORI - SEPERTI GOAPOTEK ============ */
    .sidebar-kategori {
        background: white;
        border-radius: 0 20px 20px 0;
        position: sticky;
        top: 70px;
        height: calc(100vh - 70px);
        overflow-y: auto;
        z-index: 100;
        box-shadow: 2px 0 20px rgba(0,0,0,0.03);
        border-right: 1px solid rgba(26,188,156,0.08);
        padding: 0;
    }

    /* Custom Scrollbar */
    .sidebar-kategori::-webkit-scrollbar {
        width: 4px;
    }
    .sidebar-kategori::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .sidebar-kategori::-webkit-scrollbar-thumb {
        background: var(--primary);
        border-radius: 10px;
    }

    .sidebar-inner {
        padding: 25px 15px 30px 15px;
    }

    .sidebar-header {
        padding: 0 10px 18px;
        margin-bottom: 10px;
        border-bottom: 1px solid #eef2f6;
    }

    .sidebar-title {
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin: 0;
    }

    .sidebar-subtitle {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 5px 0 0;
    }

    /* Tombol Semua Produk */
    .all-produk-btn {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        margin: 15px 8px 20px 8px;
        padding: 10px 15px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s;
    }

    .all-produk-btn:hover {
        transform: translateY(-2px);
    }

    .all-produk-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .all-produk-icon {
        background: rgba(255,255,255,0.2);
        width: 35px;
        height: 35px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }

    .all-produk-text span {
        font-size: 0.65rem;
        font-weight: 500;
        opacity: 0.9;
    }

    .all-produk-text h5 {
        font-size: 0.85rem;
        font-weight: 800;
        margin: 0;
    }

    .all-produk-badge {
        background: rgba(255,255,255,0.25);
        color: white;
        padding: 4px 10px;
        border-radius: 30px;
        font-weight: 800;
        font-size: 0.8rem;
    }

    /* List Kategori - SEPERTI GOAPOTEK */
    .kategori-list {
        margin-top: 5px;
    }

    .kategori-label {
        font-size: 0.6rem;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        padding: 10px 12px 5px;
        letter-spacing: 1px;
    }

    .kategori-link {
        display: flex;
        align-items: center;
        padding: 8px 12px;
        margin: 2px 6px;
        color: #475569;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.8rem;
        transition: all 0.2s;
        border-radius: 10px;
        gap: 12px;
    }

    .kategori-link:hover {
        background: #f0fdf4;
        color: var(--primary);
        transform: translateX(3px);
    }

    .kategori-link.active {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
    }

    .kategori-icon {
        width: 28px;
        height: 28px;
        background: #f1f5f9;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .kategori-link.active .kategori-icon {
        background: rgba(255,255,255,0.2);
    }

    /* NAMA KATEGORI - DIPOTONG RAPI (SEPERTI GOAPOTEK) */
    .kategori-name {
        flex: 1;
        font-weight: 500;
        font-size: 0.8rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; /* Tambahin ... jika terlalu panjang */
    }

    .kategori-count {
        background: #e2e8f0;
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 700;
        color: #64748b;
        flex-shrink: 0;
    }

    .kategori-link.active .kategori-count {
        background: rgba(255,255,255,0.25);
        color: white;
    }

    /* ============ MAIN CONTENT ============ */
    .main-content-area {
        padding: 25px 30px;
        background: transparent;
        height: calc(100vh - 70px);
        overflow-y: auto;
    }

    /* Search Box */
    .search-wrapper {
        background: white;
        padding: 5px 5px 5px 20px;
        border-radius: 60px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 25px;
        border: 1px solid #eef2f6;
    }

    .search-input {
        border: none !important;
        outline: none !important;
        background: transparent;
        padding: 10px 0;
        font-size: 0.85rem;
    }

    .search-btn {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border: none;
        border-radius: 50px;
        padding: 9px 28px;
        color: white;
        font-weight: 700;
        font-size: 0.8rem;
    }

    /* Header Kategori */
    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .category-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--dark);
        position: relative;
    }

    .category-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        border-radius: 3px;
    }

    .product-count {
        color: var(--text-muted);
        font-size: 0.75rem;
        font-weight: 700;
        background: white;
        padding: 6px 16px;
        border-radius: 40px;
        border: 1px solid #e2e8f0;
    }

    /* Card Produk */
    .row.g-4 {
        margin: 0 -8px;
    }
    .row.g-4 > [class*="col-"] {
        padding: 0 8px;
    }

    .card-produk {
        background: white;
        border-radius: 14px;
        transition: all 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        overflow: hidden;
    }

    .card-produk:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .badge-keras {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        border-radius: 8px;
        font-size: 0.6rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        z-index: 2;
    }

    .img-container {
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        padding: 12px;
        position: relative;
    }

    .img-container img {
        max-width: 85%;
        max-height: 85px;
        object-fit: contain;
    }

    .card-content {
        padding: 10px 12px 14px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .brand-name {
        font-size: 0.55rem;
        font-weight: 800;
        color: var(--primary);
        letter-spacing: 1px;
    }

    .nama-obat {
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 34px;
    }

    .harga-obat {
        font-size: 0.85rem;
        font-weight: 800;
        color: #e67e22;
    }

    .stok-info {
        font-size: 0.6rem;
        font-weight: 700;
        display: flex;
        align-items: center;
    }

    .stok-tersedia {
        background: #d1fae5;
        color: #065f46;
        padding: 3px 8px;
        border-radius: 30px;
    }

    .stok-habis {
        background: #fee2e2;
        color: #991b1b;
        padding: 3px 8px;
        border-radius: 30px;
    }

    .btn-lihat {
        background: #f1f5f9;
        text-align: center;
        padding: 7px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.65rem;
        color: #1e293b;
        border: 1px solid #e2e8f0;
        margin-top: 5px;
        transition: 0.2s;
    }

    .btn-lihat:hover {
        background: var(--primary);
        color: white;
    }

    /* Responsive Grid */
    @media (min-width: 1400px) {
        .col-xl-3 { flex: 0 0 16.666%; max-width: 16.666%; }
    }
    @media (max-width: 1399px) and (min-width: 1200px) {
        .col-xl-3 { flex: 0 0 20%; max-width: 20%; }
    }
    @media (max-width: 1199px) and (min-width: 992px) {
        .col-lg-4 { flex: 0 0 25%; max-width: 25%; }
    }
    @media (max-width: 991px) and (min-width: 768px) {
        .col-md-6 { flex: 0 0 33.333%; max-width: 33.333%; }
    }

    @media (max-width: 992px) {
        .sidebar-kategori {
            position: relative;
            top: 0;
            height: auto;
            max-height: 280px;
            border-radius: 0;
            margin-bottom: 15px;
        }
        .main-content-area {
            padding: 20px;
            height: auto;
        }
    }
</style>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row g-0">
        
        <!-- ============ SIDEBAR KATEGORI - SEPERTI GOAPOTEK ============ -->
        <div class="col-md-3 col-lg-2 d-none d-md-block p-0">
            <div class="sidebar-kategori">
                <div class="sidebar-inner">
                    <div class="sidebar-header">
                        <div class="sidebar-title">KATEGORI</div>
                        <div class="sidebar-subtitle">Produk</div>
                    </div>
                    
                    <a href="/kategori" class="all-produk-btn text-decoration-none">
                        <div class="all-produk-left">
                            <div class="all-produk-icon">📦</div>
                            <div class="all-produk-text">
                                <span>Semua Produk</span>
                                <h5>Wijaya Farma</h5>
                            </div>
                        </div>
                        <div class="all-produk-badge">
                            {{ $total_semua_produk }}
                        </div>
                    </a>

                    <div class="kategori-label">
                        ⚡ JELAJAHI KATEGORI
                    </div>
                    
                    <div class="kategori-list">
                        @foreach($list_kategori as $kat)
                        <a href="/kategori?kategori={{ $kat->id }}" class="kategori-link {{ $kategori_aktif == $kat->id ? 'active' : '' }}">
                            <div class="kategori-icon">
                                @if($kat->nama_kategori == 'Obat Perut') 💊
                                @elseif($kat->nama_kategori == 'Obat Gigi') 🦷
                                @elseif($kat->nama_kategori == 'Obat Kepala') 🤕
                                @elseif($kat->nama_kategori == 'Perlengkapan bayi') 🍼
                                @elseif(str_contains($kat->nama_kategori, 'TETES MATA')) 👁️
                                @elseif(str_contains($kat->nama_kategori, 'Perawatan Luka')) 🩹
                                @else 🌿
                                @endif
                            </div>
                            <!-- NAMA KATEGORI DIPOTONG RAPI (seperti GoApotek) -->
                            <span class="kategori-name">{{ Str::limit($kat->nama_kategori, 22) }}</span>
                            <span class="kategori-count">{{ $kat->produk_count ?? $kat->produks->count() }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- ============ AREA PRODUK ============ -->
        <div class="col-md-9 col-lg-10 main-content-area">
            
            <!-- Search Bar -->
            <div class="search-wrapper">
                <form action="/kategori" method="GET" class="d-flex align-items-center gap-2">
                    @if($kategori_aktif)
                        <input type="hidden" name="kategori" value="{{ $kategori_aktif }}">
                    @endif
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="cari" class="form-control search-input" 
                           placeholder="Cari nama obat..." 
                           value="{{ request('cari') }}">
                    <button type="submit" class="btn search-btn">🔍 Cari</button>
                    @if(request('cari') || $kategori_aktif)
                        <a href="/kategori" class="btn btn-outline-secondary rounded-pill px-3" style="font-weight: 600; font-size: 0.7rem;">Reset</a>
                    @endif
                </form>
            </div>

            <!-- Header Kategori -->
            <div class="category-header">
                <h4 class="category-title">
                    {{ $kategori_aktif ? $list_kategori->where('id', $kategori_aktif)->first()->nama_kategori : 'Semua Obat' }}
                </h4>
                <div class="product-count">📊 {{ $list_produk->count() }} produk</div>
            </div>

            <!-- Grid Produk -->
            <div class="row g-4">
                @forelse($list_produk as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="card-produk" style="position: relative;">
                        @if(($item->is_keras ?? false) || in_array($item->nama_obat, ['Promag', 'Mylanta', 'Paramex', 'Cataflam']))
                        <div class="badge-keras">K</div>
                        @endif
                        <div class="img-container">
                            @if($item->foto)
                                <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                            @else
                                <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="no-image">
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="brand-name">WIJAYA FARMA</div>
                            <div class="nama-obat">{{ $item->nama_obat }}</div>
                            <div class="stok-info">
                                @if($item->stok > 0)
                                    <span class="stok-tersedia">📦 Stok: {{ $item->stok }}</span>
                                @else
                                    <span class="stok-habis">❌ Stok Habis</span>
                                @endif
                            </div>
                            <div class="harga-obat">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                            <a href="/produk/{{ $item->id }}?from=kategori" class="btn-lihat">👁️ Detail →</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-box-open fa-3x mb-3 opacity-25"></i>
                        <h5>🌿 Produk tidak ditemukan</h5>
                        <a href="/kategori" class="btn search-btn mt-2">Reset Filter</a>
                    </div>
                </div>
                @endforelse
            </div>

            @if(method_exists($list_produk, 'links') && $list_produk instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="d-flex justify-content-center mt-4">
                {{ $list_produk->appends(request()->query())->links() }}
            </div>
            @endif
        </div>

    </div>
</div>

@endsection
@extends('layouts.main')

@section('title', 'Kategori Obat - Wijaya Farma')

@section('custom-css')
<style>
    body { 
        background: linear-gradient(135deg, #f0f9ff 0%, #e8f0f5 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        position: relative;
        min-height: 100vh;
    }
    
    /* Background Pattern */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 20% 80%, rgba(26, 188, 156, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(52, 152, 219, 0.03) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }
    
    /* Floating Blobs */
    .bg-blob-2 {
        position: fixed;
        bottom: -15%;
        right: -10%;
        width: 55%;
        height: 55%;
        background: radial-gradient(ellipse, rgba(26, 188, 156, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
        animation: floatBlob2 35s ease-in-out infinite;
    }
    
    .bg-blob-3 {
        position: fixed;
        top: 50%;
        left: -10%;
        width: 40%;
        height: 40%;
        background: radial-gradient(ellipse, rgba(241, 196, 15, 0.04) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
        animation: floatBlob3 25s ease-in-out infinite;
    }
    
    @keyframes floatBlob2 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(-4%, -6%) scale(1.08); }
    }
    
    @keyframes floatBlob3 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(5%, -3%) rotate(3deg); }
    }
    
    .container-fluid, .main-content-area {
        position: relative;
        z-index: 2;
    }

    /* ============ SIDEBAR KATEGORI YANG LEBIH MENARIK ============ */
    .sidebar-kategori {
        background: white;
        border-radius: 0 24px 24px 0;
        min-height: calc(100vh - 70px);
        position: sticky;
        top: 70px;
        padding: 30px 16px;
        z-index: 100;
        box-shadow: 4px 0 30px rgba(0,0,0,0.05);
        border-right: 1px solid rgba(26, 188, 156, 0.1);
    }

    .sidebar-header {
        padding: 0 12px 20px;
        margin-bottom: 10px;
        border-bottom: 2px solid #eef2f6;
    }

    .sidebar-title {
        font-size: 12px;
        font-weight: 800;
        color: #1abc9c;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0 0 5px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sidebar-title::before {
        content: '✦';
        font-size: 14px;
    }

    .sidebar-subtitle {
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    /* Tombol Semua Produk */
    .all-produk-btn {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        margin: 16px 12px 20px 12px;
        padding: 14px 16px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(26, 188, 156, 0.2);
    }

    .all-produk-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(26, 188, 156, 0.3);
    }

    .all-produk-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .all-produk-icon {
        background: rgba(255,255,255,0.2);
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
    }

    .all-produk-text {
        color: white;
    }

    .all-produk-text span {
        font-size: 13px;
        font-weight: 500;
        opacity: 0.9;
    }

    .all-produk-text h5 {
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .all-produk-badge {
        background: rgba(255,255,255,0.25);
        color: white;
        padding: 6px 12px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 14px;
    }

    /* List Kategori */
    .kategori-list {
        margin-top: 10px;
    }

    .kategori-label {
        font-size: 11px;
        font-weight: 700;
        color: #94a3b8;
        text-transform: uppercase;
        padding: 10px 16px 8px;
        letter-spacing: 1px;
    }

    .kategori-link {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        margin: 4px 8px;
        color: #475569;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        border-radius: 14px;
        gap: 14px;
        position: relative;
    }

    .kategori-link:hover {
        background: linear-gradient(135deg, #f0fdf4 0%, #e6faf5 100%);
        color: #1abc9c;
        transform: translateX(6px);
    }

    .kategori-link.active {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(26, 188, 156, 0.25);
    }

    .kategori-icon {
        width: 34px;
        height: 34px;
        background: #f1f5f9;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: 0.3s;
    }

    .kategori-link.active .kategori-icon {
        background: rgba(255,255,255,0.2);
    }

    .kategori-link:hover .kategori-icon {
        background: white;
        transform: scale(1.05);
    }

    .kategori-name {
        flex: 1;
        font-weight: 600;
        font-size: 14px;
    }

    .kategori-count {
        background: #e2e8f0;
        padding: 3px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
    }

    .kategori-link.active .kategori-count {
        background: rgba(255,255,255,0.25);
        color: white;
    }

    /* ============ MAIN CONTENT ============ */
    .main-content-area {
        padding: 30px 35px;
        background: transparent;
    }

    /* Search Box Premium */
    .search-wrapper {
        background: white;
        padding: 6px 6px 6px 24px;
        border-radius: 60px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        margin-bottom: 35px;
        border: 1px solid #eef2f6;
        transition: all 0.3s ease;
    }

    .search-wrapper:focus-within {
        box-shadow: 0 8px 30px rgba(26, 188, 156, 0.12);
        border-color: #1abc9c;
        transform: translateY(-2px);
    }

    .search-input {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        background: transparent;
        padding: 14px 0;
        font-weight: 500;
        font-size: 14px;
    }

    .search-input::placeholder {
        color: #cbd5e1;
        font-weight: 400;
    }

    .search-btn {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        color: white;
        font-weight: 700;
        transition: 0.3s;
        font-size: 14px;
    }

    .search-btn:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(26, 188, 156, 0.4);
    }

    /* Header Kategori */
    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .category-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: #1e293b;
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, #1e293b, #2d3a4e);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .category-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #1abc9c, #f39c12);
        border-radius: 4px;
    }

    .product-count {
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
        background: white;
        padding: 8px 20px;
        border-radius: 40px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        border: 1px solid #e2e8f0;
    }

    /* ============ CARD PRODUK YANG LEBIH BAGUS ============ */
    .card-produk {
        background: white;
        border-radius: 20px;
        padding: 0;
        transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        border: 1px solid #eef2f6;
        overflow: hidden;
    }

    .card-produk:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0,0,0,0.1);
        border-color: transparent;
    }

    /* Badge Obat Keras */
    .badge-keras {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        border-radius: 12px;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(239,68,68,0.3);
    }

    /* Image Container */
    .img-container {
        height: 180px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 20px;
        border-bottom: 1px solid #eef2f6;
    }

    .card-produk:hover .img-container {
        background: linear-gradient(145deg, #f0fdf4 0%, #e6faf5 100%);
    }

    .img-container img {
        max-width: 85%;
        max-height: 130px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .card-produk:hover .img-container img {
        transform: scale(1.05);
    }

    /* Content Area */
    .card-content {
        padding: 16px 18px 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    /* Brand */
    .brand-name {
        font-size: 10px;
        font-weight: 800;
        color: #1abc9c;
        letter-spacing: 1px;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    /* Nama Obat - Lebih Besar */
    .nama-obat {
        font-size: 1.05rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 10px;
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 48px;
    }

    /* Harga */
    .harga-obat {
        font-size: 1.35rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e67e22, #f97316);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 8px 0;
    }

    /* STOK - DIPERBESAR */
    .stok-info {
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 14px;
    }

    .stok-tersedia {
        background: #d1fae5;
        color: #065f46;
        padding: 5px 14px;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .stok-habis {
        background: #fee2e2;
        color: #991b1b;
        padding: 5px 14px;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    /* Tombol Detail */
    .btn-lihat {
        margin-top: auto;
        background: #f8fafc;
        color: #1e293b;
        text-align: center;
        padding: 12px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: 1px solid #e2e8f0;
    }

    .btn-lihat:hover {
        background: linear-gradient(135deg, #1abc9c, #16a085);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 32px;
        margin-top: 20px;
    }

    /* Animasi Card */
    @keyframes fadeScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .card-produk {
        animation: fadeScale 0.4s ease forwards;
    }

    /* Pagination */
    .pagination {
        justify-content: center;
        gap: 5px;
        margin-top: 40px;
    }
    .pagination .page-link {
        border-radius: 12px;
        background: white;
        color: #1abc9c;
        border: 1px solid #e2e8f0;
        padding: 10px 18px;
        font-weight: 600;
    }
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #1abc9c, #16a085);
        border-color: transparent;
        color: white;
    }
    .pagination .page-link:hover {
        background: #1abc9c;
        color: white;
        border-color: transparent;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .sidebar-kategori {
            position: relative;
            top: 0;
            border-radius: 0;
            margin-bottom: 20px;
        }
        .main-content-area {
            padding: 20px;
        }
    }

    @media (max-width: 768px) {
        .category-title {
            font-size: 1.4rem;
        }
        .img-container {
            height: 160px;
        }
        .img-container img {
            max-height: 110px;
        }
    }
</style>
@endsection

@section('content')
<div class="bg-blob-2"></div>
<div class="bg-blob-3"></div>

<div class="container-fluid">
    <div class="row g-0">
        
        <!-- ============ SIDEBAR KATEGORI PREMIUM ============ -->
        <div class="col-md-3 col-lg-2 d-none d-md-block p-0">
            <div class="sidebar-kategori">
                <div class="sidebar-header">
                    <div class="sidebar-title">KATEGORI</div>
                    <div class="sidebar-subtitle">Produk</div>
                </div>
                
                <!-- Tombol Semua Produk Premium -->
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
                            @else 🌿
                            @endif
                        </div>
                        <span class="kategori-name">{{ $kat->nama_kategori }}</span>
                        <span class="kategori-count">{{ $kat->produk_count ?? $kat->produks->count() }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- ============ AREA PRODUK ============ -->
        <div class="col-md-9 col-lg-10 main-content-area">
            
            <!-- Search Bar Premium -->
            <div class="search-wrapper">
                <form action="/kategori" method="GET" class="d-flex align-items-center gap-2">
                    @if($kategori_aktif)
                        <input type="hidden" name="kategori" value="{{ $kategori_aktif }}">
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="cari" class="form-control search-input" 
                           placeholder="Cari nama obat atau vitamin..." 
                           value="{{ request('cari') }}">
                    <button type="submit" class="btn search-btn">
                        🔍 Cari
                    </button>
                    @if(request('cari') || $kategori_aktif)
                        <a href="/kategori" class="btn btn-outline-secondary rounded-pill px-4" style="font-weight: 600;">Reset</a>
                    @endif
                </form>
            </div>

            <!-- Header Kategori -->
            <div class="category-header">
                <div>
                    <h4 class="category-title">
                        {{ $kategori_aktif ? $list_kategori->where('id', $kategori_aktif)->first()->nama_kategori : 'Semua Obat' }}
                    </h4>
                </div>
                <div class="product-count">
                    📊 {{ $list_produk->count() }} produk
                </div>
            </div>

            <!-- Grid Produk - 4 Kolom -->
            <div class="row g-4">
                @forelse($list_produk as $index => $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="card-produk" style="animation-delay: {{ $index * 0.03 }}s">
                        <!-- Badge Obat Keras -->
                        @if(($item->is_keras ?? false) || in_array($item->nama_obat, ['Promag', 'Mylanta', 'Paramex', 'Cataflam']))
                        <div class="badge-keras" title="Obat Keras">
                            K
                        </div>
                        @endif

                        <!-- Foto Produk -->
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
                            
                            <!-- Stok Info - Lebih Besar -->
                            <div class="stok-info">
                                @if($item->stok > 0)
                                    <span class="stok-tersedia">
                                        📦 Stok: {{ $item->stok }}
                                    </span>
                                @else
                                    <span class="stok-habis">
                                        ❌ Stok Habis
                                    </span>
                                @endif
                            </div>

                            <!-- Harga -->
                            <div class="harga-obat">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

                            <!-- Tombol Detail -->
                            <a href="/produk/{{ $item->id }}" class="btn-lihat">
                                👁️ Lihat Detail
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state">
                        <div class="mb-3">
                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="opacity-25">
                        </div>
                        <h5 class="text-muted mb-2">🌿 Maaf, produk tidak ditemukan</h5>
                        <p class="text-muted small">Coba cari dengan kata kunci lain atau pilih kategori berbeda.</p>
                        <a href="/kategori" class="btn search-btn mt-3" style="display: inline-block; width: auto;">
                            🔄 Reset Filter
                        </a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination - HANYA TAMPIL JIKA ADA PAGINATION -->
            @if(method_exists($list_produk, 'links') && $list_produk instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="d-flex justify-content-center mt-5">
                {{ $list_produk->appends(request()->query())->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
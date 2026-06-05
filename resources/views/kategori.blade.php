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
        --accent-light: #fef3c7;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 4px 12px rgba(0,0,0,0.05);
        --shadow-md: 0 10px 25px rgba(0,0,0,0.08);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.12);
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
        background-size: 50px;
        z-index: -1;
        pointer-events: none;
    }

    .container-fluid, .main-content-area {
        position: relative;
        z-index: 2;
    }

    /* ============ SIDEBAR KATEGORI PREMIUM ============ */
    .sidebar-kategori {
        background: white;
        border-radius: 0 28px 28px 0;
        min-height: calc(100vh - 70px);
        position: sticky;
        top: 70px;
        padding: 35px 20px;
        z-index: 100;
        box-shadow: 4px 0 30px rgba(0,0,0,0.05);
        border-right: 1px solid rgba(26,188,156,0.1);
    }

    .sidebar-header {
        padding: 0 12px 25px;
        margin-bottom: 15px;
        border-bottom: 2px solid #eef2f6;
    }

    .sidebar-title {
        font-size: 0.85rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0 0 8px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sidebar-subtitle {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
    }

    /* Tombol Semua Produk */
    .all-produk-btn {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        margin: 20px 12px 25px 12px;
        padding: 18px 20px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        box-shadow: 0 6px 15px rgba(26,188,156,0.25);
    }

    .all-produk-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(26,188,156,0.35);
    }

    .all-produk-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .all-produk-icon {
        background: rgba(255,255,255,0.2);
        width: 50px;
        height: 50px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
    }

    .all-produk-text {
        color: white;
    }

    .all-produk-text span {
        font-size: 0.85rem;
        font-weight: 500;
        opacity: 0.9;
    }

    .all-produk-text h5 {
        font-size: 1.2rem;
        font-weight: 800;
        margin: 0;
    }

    .all-produk-badge {
        background: rgba(255,255,255,0.25);
        color: white;
        padding: 8px 16px;
        border-radius: 40px;
        font-weight: 800;
        font-size: 1.1rem;
    }

    /* List Kategori */
    .kategori-list {
        margin-top: 15px;
    }

    .kategori-label {
        font-size: 0.8rem;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        padding: 12px 16px 10px;
        letter-spacing: 1.5px;
    }

    .kategori-link {
        display: flex;
        align-items: center;
        padding: 14px 18px;
        margin: 6px 8px;
        color: #475569;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border-radius: 16px;
        gap: 16px;
        position: relative;
    }

    .kategori-link:hover {
        background: linear-gradient(135deg, #f0fdf4 0%, #e6faf5 100%);
        color: var(--primary);
        transform: translateX(8px);
    }

    .kategori-link.active {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        box-shadow: 0 6px 15px rgba(26,188,156,0.3);
    }

    .kategori-icon {
        width: 42px;
        height: 42px;
        background: #f1f5f9;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        transition: 0.3s;
    }

    .kategori-link.active .kategori-icon {
        background: rgba(255,255,255,0.2);
    }

    .kategori-link:hover .kategori-icon {
        background: white;
        transform: scale(1.08);
    }

    .kategori-name {
        flex: 1;
        font-weight: 700;
        font-size: 1rem;
    }

    .kategori-count {
        background: #e2e8f0;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 800;
        color: #64748b;
    }

    .kategori-link.active .kategori-count {
        background: rgba(255,255,255,0.25);
        color: white;
    }

    /* ============ MAIN CONTENT ============ */
    .main-content-area {
        padding: 35px 40px;
        background: transparent;
    }

    /* Search Box Premium */
    .search-wrapper {
        background: white;
        padding: 8px 8px 8px 28px;
        border-radius: 70px;
        box-shadow: var(--shadow-md);
        margin-bottom: 40px;
        border: 1px solid #eef2f6;
        transition: all 0.3s ease;
    }

    .search-wrapper:focus-within {
        box-shadow: 0 8px 30px rgba(26,188,156,0.15);
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    .search-input {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        background: transparent;
        padding: 16px 0;
        font-weight: 500;
        font-size: 1rem;
    }

    .search-input::placeholder {
        color: #cbd5e1;
        font-weight: 400;
    }

    .search-btn {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border: none;
        border-radius: 60px;
        padding: 14px 38px;
        color: white;
        font-weight: 800;
        transition: 0.3s;
        font-size: 1rem;
    }

    .search-btn:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 18px rgba(26,188,156,0.4);
    }

    /* Header Kategori */
    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        flex-wrap: wrap;
    }

    .category-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark);
        position: relative;
        display: inline-block;
    }

    .category-title::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 0;
        width: 70px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        border-radius: 4px;
    }

    .product-count {
        color: var(--text-muted);
        font-size: 1rem;
        font-weight: 700;
        background: white;
        padding: 10px 24px;
        border-radius: 50px;
        box-shadow: var(--shadow-sm);
        border: 1px solid #e2e8f0;
    }

    /* ============ CARD PRODUK PREMIUM - FULL ISI ============ */
    .row.g-4 {
        margin: 0 -12px;
    }
    .row.g-4 > [class*="col-"] {
        padding: 0 12px;
    }

    .card-produk {
        background: white;
        border-radius: 24px;
        padding: 0;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        box-shadow: var(--shadow-md);
        border: 1px solid #eef2f6;
        overflow: hidden;
    }

    .card-produk:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    /* Badge Obat Keras */
    .badge-keras {
        position: absolute;
        top: 18px;
        right: 18px;
        width: 38px;
        height: 38px;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        border-radius: 14px;
        font-size: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        z-index: 2;
        box-shadow: 0 4px 12px rgba(239,68,68,0.4);
    }

    /* Image Container - LEBIH TINGGI */
    .img-container {
        height: 210px;
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
        max-width: 90%;
        max-height: 150px;
        object-fit: contain;
        transition: transform 0.4s ease;
    }

    .card-produk:hover .img-container img {
        transform: scale(1.08);
    }

    /* Content Area - PADDING LEBIH BESAR */
    .card-content {
        padding: 20px 22px 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    /* Brand - LEBIH BESAR */
    .brand-name {
        font-size: 0.85rem;
        font-weight: 800;
        color: var(--primary);
        letter-spacing: 1.5px;
        margin-bottom: 4px;
        text-transform: uppercase;
    }

    /* Nama Obat - LEBIH BESAR */
    .nama-obat {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 8px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 52px;
    }

    /* Harga - LEBIH BESAR & MENCOLOK */
    .harga-obat {
        font-size: 1.6rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e67e22, #f97316);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 8px 0 4px;
    }

    /* STOK - DIPERBESAR */
    .stok-info {
        font-size: 0.9rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
    }

    .stok-tersedia {
        background: #d1fae5;
        color: #065f46;
        padding: 7px 16px;
        border-radius: 40px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 800;
    }

    .stok-habis {
        background: #fee2e2;
        color: #991b1b;
        padding: 7px 16px;
        border-radius: 40px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 800;
    }

    /* Tombol Detail - LEBIH BESAR */
    .btn-lihat {
        margin-top: 8px;
        background: #f1f5f9;
        color: var(--dark);
        text-align: center;
        padding: 14px 0;
        border-radius: 60px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 800;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 1px solid #e2e8f0;
    }

    .btn-lihat:hover {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border-color: transparent;
        transform: translateY(-3px);
        gap: 14px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: 40px;
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
        animation: fadeScale 0.5s ease forwards;
    }

    /* Pagination */
    .pagination {
        justify-content: center;
        gap: 8px;
        margin-top: 50px;
    }
    .pagination .page-link {
        border-radius: 14px;
        background: white;
        color: var(--primary);
        border: 1px solid #e2e8f0;
        padding: 12px 20px;
        font-weight: 700;
        font-size: 0.9rem;
    }
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-color: transparent;
        color: white;
    }
    .pagination .page-link:hover {
        background: var(--primary);
        color: white;
        border-color: transparent;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .main-content-area {
            padding: 30px 25px;
        }
    }

    @media (max-width: 992px) {
        .sidebar-kategori {
            position: relative;
            top: 0;
            border-radius: 0;
            margin-bottom: 20px;
        }
        .main-content-area {
            padding: 25px 20px;
        }
        .category-title {
            font-size: 1.6rem;
        }
    }

    @media (max-width: 768px) {
        .category-title {
            font-size: 1.4rem;
        }
        .img-container {
            height: 180px;
        }
        .img-container img {
            max-height: 120px;
        }
        .nama-obat {
            font-size: 1rem;
        }
        .harga-obat {
            font-size: 1.3rem;
        }
        .btn-lihat {
            padding: 12px 0;
            font-size: 0.8rem;
        }
    }
</style>
@endsection

@section('content')

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
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <a href="/kategori" class="btn btn-outline-secondary rounded-pill px-4" style="font-weight: 700;">🔄 Reset</a>
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

            <!-- Grid Produk - 4 Kolom FULL -->
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
                            <div class="brand-name">🏪 WIJAYA FARMA</div>
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
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="100" class="opacity-25">
                        </div>
                        <h4 class="text-muted mb-2">🌿 Maaf, produk tidak ditemukan</h4>
                        <p class="text-muted">Coba cari dengan kata kunci lain atau pilih kategori berbeda.</p>
                        <a href="/kategori" class="btn search-btn mt-3" style="display: inline-block; width: auto;">
                            🔄 Reset Filter
                        </a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if(method_exists($list_produk, 'links') && $list_produk instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="d-flex justify-content-center mt-5">
                {{ $list_produk->appends(request()->query())->links() }}
            </div>
            @endif
        </div>

    </div>
</div>

<script>
    // Floating particles animation
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        for(let i = 0; i < 15; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'fixed';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.width = Math.random() * 5 + 2 + 'px';
            particle.style.height = particle.style.width;
            particle.style.backgroundColor = 'rgba(26, 188, 156, 0.15)';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            particle.style.zIndex = '0';
            particle.style.animation = `floatParticle ${15 + Math.random() * 20}s infinite ease-in-out`;
            particle.style.animationDelay = Math.random() * 10 + 's';
            body.appendChild(particle);
        }
    });
</script>

<style>
    @keyframes floatParticle {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 0; }
        50% { transform: translate(15px, -20px) scale(1.5); opacity: 0.4; }
    }
</style>

@endsection
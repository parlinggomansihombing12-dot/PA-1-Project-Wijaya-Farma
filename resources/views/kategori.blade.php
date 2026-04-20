@extends('layouts.main')

@section('title', 'Kategori Obat - Wijaya Farma')

@section('custom-css')
<style>
    body { 
        background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        position: relative;
        min-height: 100vh;
    }
    
    /* Background Pattern halus */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 20% 80%, rgba(26, 188, 156, 0.04) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(52, 152, 219, 0.03) 0%, transparent 50%),
            repeating-linear-gradient(45deg, 
                rgba(0,0,0,0.01) 0px, 
                rgba(0,0,0,0.01) 1px,
                transparent 1px,
                transparent 15px
            );
        pointer-events: none;
        z-index: 0;
    }
    
    /* Floating blobs - lebih subtle */
    body::after {
        content: '';
        position: fixed;
        top: -20%;
        left: -15%;
        width: 50%;
        height: 50%;
        background: radial-gradient(ellipse, rgba(26, 188, 156, 0.06) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
        animation: floatBlob1 30s ease-in-out infinite;
    }
    
    .bg-blob-2 {
        position: fixed;
        bottom: -15%;
        right: -10%;
        width: 55%;
        height: 55%;
        background: radial-gradient(ellipse, rgba(52, 152, 219, 0.05) 0%, transparent 70%);
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
    
    @keyframes floatBlob1 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(3%, 5%) scale(1.05); }
    }
    
    @keyframes floatBlob2 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(-4%, -6%) scale(1.08); }
    }
    
    @keyframes floatBlob3 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(5%, -3%) rotate(3deg); }
    }
    
    /* Container biar konten di atas background */
    .container-fluid, .main-content-area {
        position: relative;
        z-index: 2;
    }

    /* SIDEBAR STYLING */
    .sidebar-kategori {
        background: white;
        border-right: none;
        min-height: calc(100vh - 70px);
        position: sticky;
        top: 70px;
        padding-top: 30px;
        z-index: 100;
        box-shadow: 4px 0 20px rgba(0,0,0,0.03);
    }

    .sidebar-label {
        font-size: 11px;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        padding: 0 25px 15px;
        letter-spacing: 1.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sidebar-label::before {
        content: '✦';
        font-size: 12px;
        color: #1abc9c;
    }

    .kategori-link {
        display: flex;
        align-items: center;
        padding: 12px 25px;
        margin: 4px 12px;
        color: #475569;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        border-radius: 12px;
        gap: 12px;
        position: relative;
    }

    .kategori-link:hover {
        background: #f8fafc;
        color: #1abc9c;
        transform: translateX(5px);
    }

    .kategori-link.active {
        background: #f0fdf4;
        color: #1abc9c;
        border-radius: 12px;
        font-weight: 600;
    }

    .kategori-icon {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: 0.3s;
    }

    .kategori-count {
        margin-left: auto;
        background: #f1f5f9;
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        color: #64748b;
    }

    .kategori-link.active .kategori-count {
        background: #1abc9c;
        color: white;
    }

    /* KONTEN UTAMA */
    .main-content-area {
        padding: 30px 35px;
        background: transparent;
    }

    /* SEARCH BOX */
    .search-wrapper {
        background: white;
        padding: 5px 5px 5px 20px;
        border-radius: 60px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        margin-bottom: 35px;
        border: 1px solid #e2e8f0;
        transition: 0.3s;
    }

    .search-wrapper:focus-within {
        box-shadow: 0 4px 20px rgba(26, 188, 156, 0.1);
        border-color: #1abc9c;
    }

    .search-input {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        background: transparent;
        padding: 12px 0;
        font-weight: 500;
    }

    .search-input::placeholder {
        color: #cbd5e1;
        font-weight: 400;
    }

    .search-btn {
        background: #1abc9c;
        border: none;
        border-radius: 50px;
        padding: 10px 28px;
        color: white;
        font-weight: 600;
        transition: 0.3s;
    }

    .search-btn:hover {
        background: #16a085;
        transform: scale(1.02);
    }

    /* Header Kategori */
    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .category-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #1e293b;
        position: relative;
        display: inline-block;
    }

    .category-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 50px;
        height: 3px;
        background: #1abc9c;
        border-radius: 3px;
    }

    .product-count {
        color: #64748b;
        font-size: 13px;
        font-weight: 500;
        background: white;
        padding: 6px 16px;
        border-radius: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        border: 1px solid #e2e8f0;
    }

    /* KARTU PRODUK */
    .card-produk {
        background: white;
        border-radius: 16px;
        padding: 18px;
        border: 1px solid #eef2f6;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }

    .card-produk:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.06);
        border-color: #1abc9c30;
    }

    /* Badge Obat Keras */
    .badge-keras {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 28px;
        height: 28px;
        background: #ef4444;
        color: white;
        border-radius: 8px;
        font-size: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        z-index: 2;
        box-shadow: 0 2px 6px rgba(239,68,68,0.2);
    }

    /* WADAH GAMBAR */
    .img-box {
        height: 150px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        background: #f8fafc;
        border-radius: 12px;
        overflow: hidden;
        transition: 0.3s;
    }

    .card-produk:hover .img-box {
        background: #f1f5f9;
    }

    .img-box img {
        max-width: 85%;
        max-height: 110px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .card-produk:hover .img-box img {
        transform: scale(1.03);
    }

    /* Brand */
    .brand-name {
        font-size: 10px;
        font-weight: 600;
        color: #1abc9c;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .nama-obat {
        font-size: 14px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 42px;
        line-height: 1.4;
    }

    .harga-obat {
        font-size: 16px;
        font-weight: 800;
        color: #e67e22;
        margin: 8px 0;
    }

    .stok-info {
        font-size: 11px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 12px;
    }

    .stok-tersedia {
        color: #10b981;
        background: #d1fae5;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .stok-habis {
        color: #ef4444;
        background: #fee2e2;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .btn-lihat {
        margin-top: auto;
        background: #f8fafc;
        color: #475569;
        text-align: center;
        padding: 10px;
        border-radius: 40px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border: 1px solid #e2e8f0;
    }

    .btn-lihat:hover {
        background: #1abc9c;
        color: white;
        border-color: #1abc9c;
        transform: translateY(-2px);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 24px;
        margin-top: 20px;
    }

    /* Animasi */
    @keyframes fadeScale {
        from {
            opacity: 0;
            transform: scale(0.96);
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
    }
    .pagination .page-link {
        border-radius: 10px;
        background: white;
        color: #1abc9c;
        border: 1px solid #e2e8f0;
        padding: 8px 16px;
    }
    .pagination .page-item.active .page-link {
        background: #1abc9c;
        border-color: #1abc9c;
        color: white;
    }
    .pagination .page-link:hover {
        background: #1abc9c;
        color: white;
    }

    @media (max-width: 768px) {
        .main-content-area {
            padding: 20px;
        }
        .category-title {
            font-size: 1.3rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Floating blobs subtle untuk background -->
<div class="bg-blob-2"></div>
<div class="bg-blob-3"></div>

<div class="container-fluid">
    <div class="row g-0">
        
        <!-- SIDEBAR -->
        <div class="col-md-2 d-none d-md-block p-0">
            <div class="sidebar-kategori">
                <div class="sidebar-label">
                    Kategori Produk
                </div>
                
                <a href="/kategori" class="kategori-link {{ empty($kategori_aktif) ? 'active' : '' }}">
                    <div class="kategori-icon">📦</div>
                    <span>Semua Produk</span>
                    <span class="kategori-count">{{ $total_semua_produk ?? $list_produk->count() }}</span>
                </a>

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
                    <span>{{ $kat->nama_kategori }}</span>
                    <span class="kategori-count">{{ $kat->produk_count ?? $kat->produks->count() }}</span>
                </a>
                @endforeach
            </div>
        </div>

        <!-- AREA PRODUK -->
        <div class="col-md-10 main-content-area">
            
            <!-- Search Bar -->
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
                           placeholder="Cari obat atau vitamin yang anda butuhkan..." 
                           value="{{ request('cari') }}">
                    <button type="submit" class="btn search-btn">
                        🔍 Cari
                    </button>
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

            <!-- Grid Produk -->
            <div class="row g-4">
                @forelse($list_produk as $index => $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" style="animation-delay: {{ $index * 0.05 }}s">
                    <div class="card-produk">
                        @if(($item->is_keras ?? false) || in_array($item->nama_obat, ['Promag', 'Mylanta', 'Paramex']))
                        <div class="badge-keras" title="Obat Keras">
                            K
                        </div>
                        @endif

                        <div class="img-box">
                            @if($item->foto)
                                <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                            @else
                                <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="no-image">
                            @endif
                        </div>

                        <div class="brand-name">WIJAYA FARMA</div>
                        <div class="nama-obat">{{ $item->nama_obat }}</div>
                        
                        <div class="stok-info">
                            @if($item->stok > 0)
                                <span class="stok-tersedia">✓ Stok: {{ $item->stok }}</span>
                            @else
                                <span class="stok-habis">✗ Stok Habis</span>
                            @endif
                        </div>

                        <div class="harga-obat">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

                        <a href="/produk/{{ $item->id }}" class="btn-lihat">
                            👁️ Lihat Detail →
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state">
                        <div class="mb-3">
                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="opacity-25">
                        </div>
                        <h5 class="text-muted mb-2">🌿 Maaf, obat tidak ditemukan</h5>
                        <p class="text-muted small">Coba cari dengan kata kunci lain atau pilih kategori berbeda.</p>
                        <a href="/kategori" class="btn search-btn mt-3" style="display: inline-block; width: auto;">
                            🔄 Reset Filter
                        </a>
                    </div>
                </div>
                @endforelse
            </div>

            @if(method_exists($list_produk, 'links') && $list_produk instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="d-flex justify-content-center mt-5">
                {{ $list_produk->appends(request()->query())->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
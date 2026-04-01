@extends('layouts.main') {{-- Sesuaikan dengan layout depan Anda --}}

@section('content')
<style>
    :root {
        --primary-green: #1ABC9C;
        --soft-green: rgba(26, 188, 156, 0.1);
    }

    body { background-color: #f8fafc; }

    /* Sidebar Kategori */
    .sidebar-category {
        background: white;
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    .category-item {
        padding: 12px 20px;
        color: #555;
        text-decoration: none;
        display: block;
        transition: 0.3s;
        border-left: 4px solid transparent;
    }
    .category-item:hover, .category-item.active {
        background: var(--soft-green);
        color: var(--primary-green);
        border-left: 4px solid var(--primary-green);
        font-weight: 600;
    }

    /* Card Produk */
    .card-produk {
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease;
        background: white;
        height: 100%; /* Membuat tinggi semua card sama */
        display: flex;
        flex-direction: column;
    }
    .card-produk:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    /* Penyeragaman Gambar */
    .img-wrapper {
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: #fdfdfd;
        border-radius: 15px 15px 0 0;
    }
    .img-wrapper img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain; /* Gambar tidak akan terpotong */
    }

    .card-body-custom {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .product-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 5px;
        line-height: 1.2;
    }
    .product-category {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 15px;
    }
    .product-price {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--primary-green);
        margin-top: auto; /* Memaksa harga berada di bawah jika teks judul pendek */
    }

    .btn-detail {
        background-color: var(--primary-green);
        color: white;
        border-radius: 10px;
        font-weight: 600;
        padding: 10px;
        transition: 0.3s;
        border: none;
        margin-top: 15px;
    }
    .btn-detail:hover {
        background-color: #16a085;
        color: white;
        box-shadow: 0 5px 15px rgba(26, 188, 156, 0.3);
    }

    /* Search Bar */
    .search-box {
        border-radius: 50px;
        padding-left: 20px;
        border: 1px solid #ddd;
    }
</style>

<div class="container py-5">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-lg-3 mb-4">
            <div class="sidebar-category p-3">
                <h5 class="fw-bold mb-3 px-2 mt-2">Kategori Obat</h5>
                <a href="{{ route('produk.index') }}" class="category-item {{ !request('kategori') ? 'active' : '' }}">
                    <i class="fas fa-th-large me-2"></i> Semua Produk
                </a>
                @foreach($list_kategori as $kat)
                <a href="?kategori={{ $kat->id }}" class="category-item {{ request('kategori') == $kat->id ? 'active' : '' }}">
                    <i class="fas fa-pills me-2"></i> {{ $kat->nama_kategori }}
                </a>
                @endforeach
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="col-lg-9">
            <!-- Header & Search -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-3">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Semua Produk</h2>
                    <p class="text-muted mb-0">Daftar obat-obatan tersedia di Wijaya Farma</p>
                </div>
                <form action="" method="GET" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control search-box shadow-sm" placeholder="Cari nama obat..." value="{{ request('search') }}">
                    <button class="btn btn-detail mt-0 px-4">Cari</button>
                </form>
            </div>

            <!-- PRODUCT GRID -->
            <div class="row g-4">
                @forelse($list_produk as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="card card-produk shadow-sm">
                        <div class="img-wrapper">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                            @else
                                <img src="{{ asset('img/no-image.png') }}" alt="No Image">
                            @endif
                        </div>
                        <div class="card-body-custom">
                            <h5 class="product-title">{{ $item->nama_obat }}</h5>
                            <span class="product-category">
                                {{ $item->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                            <div class="product-price">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </div>
                            <a href="{{ route('produk.show', $item->id) }}" class="btn btn-detail text-center">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <img src="https://illustrations.popsy.co/teal/falling.svg" style="width: 200px;" class="mb-3">
                    <h5 class="text-muted">Maaf, produk tidak ditemukan.</h5>
                </div>
                @endforelse
            </div>

            <!-- PAGINATION (Jika ada) -->
            <div class="mt-5 d-flex justify-content-center">
                {{ $list_produk->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
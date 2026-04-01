@extends('layouts.main')
@section('title', 'Kategori Obat - Wijaya Farma')

@push('custom-css')
<style>
    body { background-color: #fcfdfe; font-family: 'Inter', sans-serif; }
    
    /* SIDEBAR KATEGORI */
    .sidebar-kategori { background: white; border-right: 1px solid #eef2f7; min-height: 100vh; padding: 20px 0; }
    .kategori-item { 
        display: flex; 
        align-items: center; 
        padding: 12px 25px; 
        color: #444; 
        text-decoration: none; 
        font-size: 14px;
        font-weight: 500; 
        transition: 0.3s; 
    }
    .kategori-item:hover { background-color: #f8f9fa; color: #0067b8; }
    
    /* Warna Biru saat Kategori Aktif (Sesuai Gambar) */
    .kategori-item.active { 
        background-color: #0067b8; 
        color: white; 
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        margin-right: 15px;
    }
    .kategori-icon { width: 24px; height: 24px; margin-right: 15px; object-fit: contain; }
    
    /* SEARCH BAR */
    .search-container { position: relative; }
    .search-box { 
        border-radius: 10px; 
        padding: 15px 25px; 
        border: 1px solid #e0e0e0; 
        background: #fff;
        font-size: 16px;
        color: #888;
    }
    .search-icon { position: absolute; right: 20px; top: 15px; color: #aaa; }

    /* KARTU PRODUK */
    .card-produk { 
        border: 1px solid #f0f0f0; 
        border-radius: 12px; 
        transition: 0.3s; 
        background: #fff;
        position: relative;
        padding: 15px;
    }
    .card-produk:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
    
    .foto-produk { 
        height: 140px; 
        width: 100%; 
        object-fit: contain; 
        margin-bottom: 10px;
    }
    
    /* Badge K (Obat Keras) Merah di pojok kanan */
    .badge-keras {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 22px;
        height: 22px;
        background-color: #ff0000;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 12px;
        border: 2px solid #000;
        z-index: 2;
    }

    .brand-powered { font-size: 10px; color: #0067b8; font-weight: bold; margin-bottom: 10px; }
    
    .nama-obat { 
        font-size: 13px; 
        font-weight: 700; 
        color: #333; 
        text-transform: uppercase; 
        line-height: 1.4;
        min-height: 40px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0">
        
        <!-- ================= KIRI: SIDEBAR KATEGORI ================= -->
        <div class="col-lg-2 col-md-3">
            <div class="sidebar-kategori sticky-top">
                <!-- Tombol Semua -->
                <a href="/kategori" class="kategori-item {{ empty($kategori_aktif) ? 'active' : '' }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/822/822143.png" class="kategori-icon"> Semua
                </a>
                
                @foreach($list_kategori as $kat)
                <a href="/kategori?kategori={{ $kat->id }}" class="kategori-item {{ $kategori_aktif == $kat->id ? 'active' : '' }}">
                    <!-- Contoh Icon: Anda bisa mengganti source image sesuai nama kategori -->
                    <img src="https://cdn-icons-png.flaticon.com/512/3024/3024515.png" class="kategori-icon"> 
                    {{ $kat->nama_kategori }}
                </a>
                @endforeach
            </div>
        </div>

        <!-- ================= KANAN: KONTEN PRODUK ================= -->
        <div class="col-lg-10 col-md-9 p-4">
            
            <!-- 1. KOTAK PENCARIAN (Sesuai Gambar) -->
            <form action="/kategori" method="GET" class="mb-4 search-container">
                @if($kategori_aktif)
                    <input type="hidden" name="kategori" value="{{ $kategori_aktif }}">
                @endif
                <input type="search" name="cari" class="form-control search-box" 
                       placeholder="Cari di Kategori {{ $kategori_aktif ? $list_kategori->where('id', $kategori_aktif)->first()->nama_kategori : 'Semua Obat' }}" 
                       value="{{ request('cari') }}">
                <i class="fas fa-search search-icon"></i>
            </form>

            <!-- 2. GRID PRODUK -->
            <div class="row g-3">
                @forelse($list_produk as $item)
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <div class="card-produk h-100">
                        
                        <!-- Badge Keras (Jika diperlukan resep) -->
                        <div class="badge-keras">K</div>

                        <!-- Foto Produk -->
                        <div class="text-center">
                            @if($item->foto)
                                <img src="{{ asset('images/produk/' . $item->foto) }}" class="foto-produk">
                            @else
                                <div class="foto-produk d-flex align-items-center justify-content-center bg-light">
                                    <small class="text-muted">No Image</small>
                                </div>
                            @endif
                        </div>

                        <!-- Info Produk -->
                        <div class="brand-powered">
                            <span style="background:#0067b8; color:white; padding:2px 5px; border-radius:3px; font-size:8px;">Powered by</span> Goapotik
                        </div>
                        
                        <div class="nama-obat">
                            {{ $item->nama_obat }}
                        </div>

                        <!-- Harga (Optional jika ingin ditampilkan tipis) -->
                        <div class="mt-2 text-primary fw-bold" style="font-size: 14px;">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Obat tidak ditemukan.</p>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection
@extends('layouts.main')
@section('title', 'Katalog Produk - Wijaya Farma')

@push('custom-css')
<style>
    /* Mengatur agar halaman minimal setinggi layar agar tidak menggantung */
    .main-content { min-height: 80vh; background-color: #f8f9fa; padding-top: 40px; padding-bottom: 60px; }
    
    /* Sidebar Lebih Ramping */
    .sidebar-kategori { background: #fff; border-radius: 15px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .list-group-item { border: none; padding: 12px 15px; border-radius: 10px !important; margin-bottom: 8px; transition: 0.3s; color: #555; }
    .list-group-item:hover { background-color: #e8f8f5; color: #1ABC9C; }
    .list-group-item.active { background-color: #1ABC9C !important; color: #fff !important; }
    
    /* Card Produk Lebih Proporsional */
    .card-produk { border: none; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); transition: 0.3s; height: 100%; background: #fff; }
    .card-produk:hover { transform: translateY(-8px); box-shadow: 0 12px 25px rgba(0,0,0,0.1); }
    .foto-produk { height: 160px; width: 100%; object-fit: contain; padding: 15px; background: #fff; }
    .harga { color: #2ecc71; font-size: 1.1rem; font-weight: 700; }
    .teks-hijau { color: #1ABC9C; }
    .btn-detail { border: 1px solid #1ABC9C; color: #1ABC9C; border-radius: 8px; transition: 0.3s; }
    .btn-detail:hover { background: #1ABC9C; color: #fff; }
</style>
@endpush

@section('content')
<div class="main-content">
    <!-- Menggunakan container-fluid dengan padding samping agar lebar tapi tetap rapi -->
    <div class="container-fluid px-lg-5"> 
        <div class="row">
            
            <!-- SIDEBAR (Lebar 2 Kolom) -->
            <div class="col-lg-2 col-md-3 mb-4">
                <div class="sidebar-kategori">
                    <h5 class="fw-bold mb-4" style="font-size: 1.1rem;">Kategori Obat</h5>
                    <div class="list-group">
                        <a href="{{ route('produk.index') }}" 
                           class="list-group-item {{ !request('kategori_id') ? 'active' : '' }}">
                           <i class="fas fa-pills me-2"></i> Semua Obat
                        </a>
                        @foreach($kategoris as $kat)
                            <a href="{{ route('produk.index', ['kategori_id' => $kat->id]) }}" 
                               class="list-group-item {{ request('kategori_id') == $kat->id ? 'active' : '' }}">
                               • {{ $kat->nama_kategori }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- KONTEN PRODUK (Lebar 10 Kolom) -->
            <div class="col-lg-10 col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4 px-2">
                    <div>
                        <h2 class="fw-bold teks-hijau mb-1">
                            @if(request('kategori_id'))
                                {{ $kategoris->find(request('kategori_id'))->nama_kategori }}
                            @else
                                Semua Produk
                            @endif
                        </h2>
                        <p class="text-muted mb-0">Daftar obat-obatan tersedia di Wijaya Farma</p>
                    </div>
                    
                    <!-- Search Box -->
                    <form action="/produk" method="GET" class="d-flex" style="max-width: 400px; width: 100%;">
                        <div class="input-group">
                            <input type="search" name="cari" class="form-control border-0 shadow-sm px-4" 
                                   style="border-radius: 25px 0 0 25px;" placeholder="Cari nama obat..." value="{{ request('cari') }}">
                            <button type="submit" class="btn btn-primary px-4 shadow-sm" 
                                    style="border-radius: 0 25px 25px 0; background-color: #1ABC9C; border:none;">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                    <!-- Gunakan row-cols untuk mengatur jumlah item per baris (xl-5 berarti 5 produk per baris di layar besar) -->
                    @forelse($list_produk as $item)
                    <div class="col">
                        <div class="card card-produk p-2">
                            @if($item->foto)
                                <img src="{{ asset('images/produk/' . $item->foto) }}" class="foto-produk" alt="{{ $item->nama_obat }}">
                            @else
                                <div class="foto-produk d-flex align-items-center justify-content-center bg-light rounded">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column p-3">
                                <h6 class="fw-bold text-dark mb-1 text-truncate">{{ $item->nama_obat }}</h6>
                                <small class="text-muted mb-3 d-block">{{ $item->kategori->nama_kategori ?? 'Umum' }}</small>
                                
                                <div class="mt-auto">
                                    <div class="harga mb-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                                    <a href="#" class="btn btn-detail w-100 fw-bold btn-sm">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <h4 class="text-muted">Obat tidak ditemukan.</h4>
                        </div>
                    @endforelse
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
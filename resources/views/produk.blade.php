@extends('layouts.main')
@section('title', 'Katalog Produk - Wijaya Farma')

@push('custom-css')
<style>
    .card-produk { border: none; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.2s; overflow: hidden; }
    .card-produk:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); border-color: #1ABC9C; border: 1px solid #1ABC9C;}
    .harga { color: #2980B9; font-size: 1.2rem; font-weight: bold; }
    .foto-produk { height: 200px; width: 100%; object-fit: cover; }
    .foto-kosong { height: 200px; background-color: #e9ecef; display: flex; align-items: center; justify-content: center; }
</style>
@endpush

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold teks-hijau mb-0">Semua Produk Kami</h2>
        
        <!-- Kotak Pencarian Kecil di Kanan -->
        <form action="/produk" method="GET" class="d-flex">
            <input type="search" name="cari" class="form-control me-2 rounded-pill px-4" placeholder="Cari nama obat..." value="{{ request('cari') }}">
            <button type="submit" class="btn btn-tema rounded-pill px-4">Cari</button>
        </form>
    </div>

    <div class="row">
        <!-- Looping Data Produk -->
        @forelse($list_produk as $item)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-produk h-100 bg-white">
                
                <!-- LOGIKA FOTO PINTAR -->
                @if($item->foto)
                    <img src="{{ asset('images/produk/' . $item->foto) }}" class="foto-produk" alt="{{ $item->nama_obat }}">
                @else
                    <div class="foto-kosong text-center text-muted">
                        <div><span style="font-size: 2rem;">📷</span><br><small>Belum Ada Foto</small></div>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $item->nama_obat }}</h5>
                    <hr class="mt-auto mb-3"> 
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        <span class="badge bg-light text-dark border">Stok: {{ $item->stok }}</span>
                    </div>
                    
                    <button class="btn btn-tema w-100 fw-bold">Deskripsi</button>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Produk tidak ditemukan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
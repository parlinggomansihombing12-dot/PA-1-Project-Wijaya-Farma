<!-- 1. Panggil Template Induk -->
@extends('layouts.main')

<!-- 2. Isi Judul Halaman -->
@section('title', 'Katalog Produk - Wijaya Farma')

<!-- 3. Masukkan CSS Khusus Halaman Ini (Opsional) -->
@push('custom-css')
<style>
    .card-produk { border: none; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.2s; }
    .card-produk:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    .harga { color: #2980B9; font-size: 1.2rem; font-weight: bold; }
</style>
@endpush

<!-- 4. MASUKKAN KONTENNYA KE DALAM @section('content') -->
@section('content')
<div class="container my-5">
    <h2 class="text-center mb-5 fw-bold teks-hijau">Katalog Produk Kami</h2>

    <div class="row">
        @foreach($list_produk as $item)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-produk h-100 bg-white">
                <div style="height: 180px; background-color: #e9ecef; border-top-left-radius: 12px; border-top-right-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <span class="text-muted text-center px-2">Foto<br>{{ $item->nama_produk }}</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $item->nama_produk }}</h5>
                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit($item->deskripsi, 50) }}</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        <small class="text-muted">Stok: {{ $item->stok }}</small>
                    </div>
                    <button class="btn btn-tema w-100 mt-3">Detail / Beli</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
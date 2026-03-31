<!-- 1. Panggil Template Induk -->
@extends('layouts.main')

<!-- 2. Isi Judul Halaman -->
@section('title', 'Katalog Produk - Wijaya Farma')

<!-- 3. Masukkan CSS Khusus Halaman Ini -->
@push('custom-css')
<style>
    .card-produk { border: none; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.2s; overflow: hidden; }
    .card-produk:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    .harga { color: #2980B9; font-size: 1.2rem; font-weight: bold; }
    
    /* Memastikan foto terpotong rapi jika ukurannya tidak pas */
    .foto-produk { height: 200px; width: 100%; object-fit: cover; }
    .foto-kosong { height: 200px; background-color: #e9ecef; display: flex; align-items: center; justify-content: center; }
</style>
@endpush

<!-- 4. MASUKKAN KONTENNYA -->
@section('content')
<div class="container my-5">
    <h2 class="text-center mb-5 fw-bold teks-hijau">Katalog Produk Kami</h2>

    <div class="row">
        <!-- Looping Data Produk -->
        @foreach($list_produk as $item)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-produk h-100 bg-white">
                
                <!-- 📷 LOGIKA MENAMPILKAN FOTO -->
                @if($item->foto)
                    <!-- Jika di database tercatat ada foto, ambil dari folder public/images/produk/ -->
                    <img src="{{ asset('images/produk/' . $item->foto) }}" class="foto-produk" alt="{{ $item->nama_obat }}">
                @else
                    <!-- Jika tidak ada foto (null), tampilkan kotak abu-abu peringatan -->
                    <div class="foto-kosong">
                        <div class="text-center text-muted">
                            <span style="font-size: 2rem;">📷</span><br>
                            <small>Belum Ada Foto</small>
                        </div>
                    </div>
                @endif
                <!-- ------------------------ -->

                <div class="card-body d-flex flex-column">
                    <!-- Judul menggunakan $item->nama_obat (sesuai database teman Anda) -->
                    <h5 class="card-title fw-bold">{{ $item->nama_obat }}</h5>
                    
                    <!-- Deskripsi dihapus karena di database Anda belum ada kolom deskripsi obat -->
                    
                    <hr class="mt-auto"> <!-- mt-auto akan mendorong garis ini ke bawah -->
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        <span class="badge bg-light text-dark border">Stok: {{ $item->stok }}</span>
                    </div>
                    
                    <button class="btn btn-tema w-100 mt-3 fw-bold">🛒 Beli Sekarang</button>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Pesan jika belum ada produk sama sekali -->
        @if($list_produk->isEmpty())
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Belum ada produk obat yang tersedia saat ini.</p>
            </div>
        @endif
        
    </div>
</div>
@endsection
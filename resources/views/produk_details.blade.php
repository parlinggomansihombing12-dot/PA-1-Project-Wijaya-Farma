@extends('layouts.main') {{-- Ganti ke main agar navbar hijau muncul --}}

@section('title', 'Detail ' . $item->nama_obat)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Breadcrumb / Navigasi Kecil -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('produk.index') }}" class="text-decoration-none text-success">Katalog Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $item->nama_obat }}</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="row g-0">
                    <!-- BAGIAN KIRI: FOTO -->
                    <div class="col-md-5 bg-light d-flex align-items-center justify-content-center p-4" style="min-height: 400px;">
                        @if($item->foto)
                            {{-- Sesuaikan path gambar dengan folder yang anda gunakan --}}
                            <img src="{{ asset('images/produk/' . $item->foto) }}" class="img-fluid rounded shadow-sm" alt="{{ $item->nama_obat }}" style="max-height: 350px;">
                        @else
                            <img src="https://via.placeholder.com/400x400?text=Tidak+Ada+Foto" class="img-fluid" alt="No Image">
                        @endif
                    </div>

                    <!-- BAGIAN KANAN: INFO -->
                    <div class="col-md-7 p-lg-5 p-4">
                        <span class="badge px-3 py-2 rounded-pill mb-3" style="background: rgba(26, 188, 156, 0.1); color: #1abc9c; font-weight: 700;">
                            <i class="fas fa-tag me-1"></i> {{ $item->kategori->nama_kategori ?? 'Umum' }}
                        </span>
                        
                        <h1 class="fw-bold mb-2 text-dark">{{ $item->nama_obat }}</h1>
                        
                        <div class="mb-4">
                            @if($item->stok > 0)
                                <span class="text-success small fw-bold"><i class="fas fa-check-circle me-1"></i> Stok Tersedia ({{ $item->stok }} pcs)</span>
                            @else
                                <span class="text-danger small fw-bold"><i class="fas fa-times-circle me-1"></i> Stok Habis</span>
                            @endif
                        </div>

                        <h2 class="fw-bold mb-4" style="color: #1abc9c;">Rp {{ number_format($item->harga, 0, ',', '.') }}</h2>
                        
                        <hr class="my-4 opacity-25">

                        <!-- BAGIAN DESKRIPSI (YANG ANDA MINTA) -->
                        <div class="mb-5">
                            <h6 class="fw-bold text-dark mb-3"><i class="fas fa-file-alt me-2 text-success"></i> Deskripsi Produk:</h6>
                            <div class="text-muted" style="line-height: 1.8; white-space: pre-line;">
                                {{ $item->deskripsi ? $item->deskripsi : 'Maaf, deskripsi lengkap untuk produk ini belum tersedia di sistem kami.' }}
                            </div>
                        </div>

                        <!-- TOMBOL AKSI -->
                        <div class="d-grid gap-2">
                            <a href="https://wa.me/{{ $toko->whatsapp ?? '62812345678' }}?text=Halo Wijaya Farma, saya ingin bertanya/memesan produk: {{ $item->nama_obat }}" 
                               target="_blank" class="btn btn-success btn-lg py-3 rounded-pill fw-bold shadow-sm">
                                <i class="fab fa-whatsapp me-2"></i> Pesan via WhatsApp
                            </a>
                            <a href="{{ route('produk.index') }}" class="btn btn-light btn-lg py-3 rounded-pill text-muted">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Katalog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
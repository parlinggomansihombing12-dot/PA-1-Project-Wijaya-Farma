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
                            <img src="{{ asset('images/produk/' . $item->foto) }}" class="img-fluid rounded shadow-sm" alt="{{ $item->nama_obat }}" style="max-height: 350px; object-fit: contain;">
                        @else
                            <!-- Placeholder jika tidak ada foto -->
                            <div class="text-center text-muted opacity-50">
                                <i class="fas fa-pills fa-5x mb-3"></i>
                                <h5>Belum Ada Foto</h5>
                            </div>
                        @endif
                    </div>

                    <!-- BAGIAN KANAN: INFO -->
                    <div class="col-md-7 p-lg-5 p-4">
                        <span class="badge px-3 py-2 rounded-pill mb-3" style="background: rgba(26, 188, 156, 0.1); color: #1abc9c; font-weight: 700;">
                            <i class="fas fa-tag me-1"></i> {{ $item->kategori->nama_kategori ?? 'Kesehatan Umum' }}
                        </span>
                        
                        <h1 class="fw-bold mb-2 text-dark">{{ $item->nama_obat }}</h1>
                        
                        <div class="mb-4">
                            @if($item->stok > 0)
                                <span class="text-success small fw-bold"><i class="fas fa-check-circle me-1"></i> Tersedia di Apotek ({{ $item->stok }} pcs)</span>
                            @else
                                <span class="text-danger small fw-bold"><i class="fas fa-times-circle me-1"></i> Stok Habis Saat Ini</span>
                            @endif
                        </div>

                        <h2 class="fw-bold mb-4" style="color: #1abc9c;">Rp {{ number_format($item->harga, 0, ',', '.') }}</h2>
                        
                        <hr class="my-4 opacity-25">

                        <!-- BAGIAN DESKRIPSI -->
                        <div class="mb-5">
                            <h6 class="fw-bold text-dark mb-3"><i class="fas fa-file-alt me-2 text-success"></i> Informasi & Deskripsi Obat:</h6>
                            <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                                @if($item->deskripsi)
                                    {!! nl2br(e($item->deskripsi)) !!}
                                @else
                                    Maaf, deskripsi lengkap mengenai komposisi, indikasi, atau dosis untuk produk ini belum dimasukkan oleh Admin.
                                @endif
                            </div>
                        </div>

                        <!-- KOTAK EDUKASI PENGGANTI TOMBOL BELI (SANGAT PENTING) -->
                        <div class="alert mb-4 border-0" style="background-color: #fff8e1; color: #856404; border-radius: 12px; padding: 20px;">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-info-circle fa-2x me-3 mt-1" style="color: #ffc107;"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Tersedia Secara Offline</h6>
                                    <p class="mb-0 small" style="line-height: 1.6;">
                                        Demi keamanan dan kepatuhan resep, obat ini tidak dijual secara online. Silakan <strong>kunjungi Apotek Wijaya Farma secara langsung</strong> untuk membelinya. Apoteker kami siap memberikan konsultasi gratis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- TOMBOL KEMBALI SAJA -->
                        <div class="d-grid mt-3">
                            <a href="{{ route('produk.index') }}" class="btn btn-light btn-lg py-3 rounded-pill text-muted fw-bold" style="border: 2px solid #f8f9fa; transition: 0.3s;" onmouseover="this.style.borderColor='#1ABC9C'; this.style.color='#1ABC9C';" onmouseout="this.style.borderColor='#f8f9fa'; this.style.color='#6c757d';">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Katalog Produk
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
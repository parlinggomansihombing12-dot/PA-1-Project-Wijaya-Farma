@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
                    <li class="breadcrumb-item active">{{ $item->nama_obat }}</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-5 bg-light d-flex align-items-center justify-content-center p-4">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded shadow-sm" alt="{{ $item->nama_obat }}">
                        @else
                            <img src="{{ asset('img/no-image.png') }}" class="img-fluid" alt="No Image">
                        @endif
                    </div>
                    <div class="col-md-7 p-5">
                        <span class="badge bg-soft-success text-success px-3 py-2 rounded-pill mb-3" style="background: rgba(26, 188, 156, 0.1);">
                            {{ $item->kategori->nama_kategori ?? 'Umum' }}
                        </span>
                        <h1 class="fw-bold mb-3 text-dark">{{ $item->nama_obat }}</h1>
                        <h2 class="text-primary fw-bold mb-4">Rp {{ number_format($item->harga, 0, ',', '.') }}</h2>
                        
                        <div class="mb-4">
                            <h6 class="fw-bold text-muted small text-uppercase tracking-wider">Status Stok:</h6>
                            @if($item->stok > 0)
                                <span class="text-success"><i class="fas fa-check-circle me-1"></i> Tersedia ({{ $item->stok }} pcs)</span>
                            @else
                                <span class="text-danger"><i class="fas fa-times-circle me-1"></i> Stok Habis</span>
                            @endif
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="d-grid gap-2">
                            <a href="https://wa.me/{{ $toko->whatsapp ?? '' }}?text=Halo Wijaya Farma, saya ingin memesan produk: {{ $item->nama_obat }}" 
                               target="_blank" class="btn btn-success btn-lg py-3 rounded-pill fw-bold">
                                <i class="fab fa-whatsapp me-2"></i> Pesan via WhatsApp
                            </a>
                            <a href="{{ route('produk.index') }}" class="btn btn-light btn-lg py-3 rounded-pill">
                                Kembali ke Katalog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
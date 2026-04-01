@extends('layouts.main')
@section('title', 'Dashboard Produk - Wijaya Farma')

@push('custom-css')
<style>
    .card-produk { 
        border: none; 
        border-radius: 12px; 
        box-shadow: 0 4px 6px rgba(0,0,0,0.05); 
        transition: transform 0.2s; 
        overflow: hidden; 
    }

    .card-produk:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 10px 20px rgba(0,0,0,0.1); 
        border: 1px solid #1ABC9C;
    }

    .harga { 
        color: #2980B9; 
        font-size: 1.1rem; 
        font-weight: bold; 
    }

    .foto-produk { 
        height: 180px; 
        width: 100%; 
        object-fit: cover; 
    }

    .foto-kosong { 
        height: 180px; 
        background-color: #e9ecef; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
    }

    .teks-hijau {
        color: #1ABC9C;
    }

    .btn-tema {
        background-color: #1ABC9C;
        color: white;
        border: none;
    }

    .btn-tema:hover {
        background-color: #159a80;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="container my-5">

    <!-- HEADER ATAS (SAMA SEPERTI KATALOG) -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold teks-hijau mb-0">Dashboard Produk</h2>

        <!-- SEARCH -->
        <form action="{{ route('admin.produk.index') }}" method="GET" class="d-flex">
            <input type="search" name="cari" 
                class="form-control me-2 rounded-pill px-4" 
                placeholder="Cari produk..." 
                value="{{ request('cari') }}">
            
            <button type="submit" class="btn btn-tema rounded-pill px-4">
                Cari
            </button>
        </form>
    </div>

    <!-- TOMBOL TAMBAH -->
    <div class="mb-4 text-end">
        <a href="{{ route('admin.produk.create') }}" class="btn btn-tema px-4">
            + Tambah Produk
        </a>
    </div>

    <!-- LIST PRODUK -->
    <div class="row">
        @forelse($produks as $item)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-produk h-100 bg-white">

                <!-- FOTO -->
                @if($item->foto)
                    <img src="{{ asset('images/produk/' . $item->foto) }}" class="foto-produk">
                @else
                    <div class="foto-kosong text-muted">
                        <div class="text-center">
                            📷<br><small>Belum Ada Foto</small>
                        </div>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <h6 class="fw-bold">{{ $item->nama_obat }}</h6>

                    <div class="mt-auto">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            <small>Stok: {{ $item->stok }}</small>
                        </div>

                        <!-- BUTTON AKSI -->
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.produk.edit', $item->id) }}" 
                               class="btn btn-warning btn-sm w-50">
                               Edit
                            </a>

                            <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" class="w-50">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm w-100">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Belum ada produk</p>
        </div>
        @endforelse
    </div>

</div>
@endsection
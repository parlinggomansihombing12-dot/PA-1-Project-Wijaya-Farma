@extends('layouts.main')

@section('title', 'Kategori Obat - Wijaya Farma')

@section('content')
<div class="container my-5">
    <h2 class="text-center fw-bold teks-hijau mb-5">Kategori Produk Kami</h2>
    
    <div class="row justify-content-center">
        @foreach($list_kategori as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-3 bg-white shadow-sm" style="border-left: 5px solid #2980B9;">
                <div class="card-body d-flex flex-column">
                    <h4 class="fw-bold mb-3" style="color: #2980B9;">{{ $item->nama_kategori }}</h4>
                    <p class="text-muted mb-4">{{ $item->deskripsi }}</p>
                    
                    <a href="/produk" class="btn btn-outline-secondary w-100 mt-auto">Lihat Produk &rarr;</a>
                </div>
            </div>
        </div>
        @endforeach

        @if($list_kategori->isEmpty())
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada kategori yang tersedia.</p>
            </div>
        @endif
    </div>
</div>
@endsection
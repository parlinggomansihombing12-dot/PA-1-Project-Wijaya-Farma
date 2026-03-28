@extends('layouts.main')

@section('title', 'Kategori Obat')

@section('content')
<div class="container my-5">
    <h2 class="text-center fw-bold mb-5" style="color: #1ABC9C;">Kategori Produk Kami</h2>
    <div class="row justify-content-center">
        @foreach($list_kategori as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-3 bg-white" style="border-left: 5px solid #2980B9;">
                <div class="card-body">
                    <h4 class="fw-bold mb-3" style="color: #2980B9;">{{ $item->nama_kategori }}</h4>
                    <p class="text-muted mb-4">{{ $item->deskripsi }}</p>
                    <a href="/produk" class="btn btn-outline-secondary w-100 mt-auto">Lihat Produk &rarr;</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
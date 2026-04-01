@extends('layouts.main') {{-- sesuaikan dengan nama layout kamu --}}

@section('title', 'Artikel Kesehatan')

@section('content')

<div class="container my-5">

    {{-- Judul --}}
    <h3 class="fw-bold mb-4">Terbaru</h3>

    <div class="row g-4">

        @foreach($list_artikel as $item)
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100 artikel-card">

                {{-- GAMBAR --}}
                <img src="https://source.unsplash.com/400x250/?health"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;">

                <div class="card-body">

                    {{-- JUDUL --}}
                    <h5 class="fw-bold">
                        {{ $item->judul }}
                    </h5>

                    {{-- TANGGAL --}}
                    <small class="text-muted">
                        {{ $item->created_at?->format('d F Y') ?? 'Baru saja' }}
                    </small>

                    {{-- DESKRIPSI --}}
                    <p class="text-muted mt-2">
                        {{ \Illuminate\Support\Str::limit($item->konten, 80) }}
                    </p>

                </div>

                <div class="card-footer bg-white border-0">
                    <a href="{{ route('artikel.show', $item->id) }}" 
                       class="btn btn-primary w-100">
                        Baca Selengkapnya
                    </a>
                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection
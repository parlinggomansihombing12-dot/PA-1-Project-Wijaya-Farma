@extends('layouts.main')

@section('content')

<div class="container my-5" style="max-width: 800px;">

    {{-- JUDUL --}}
    <h2 class="fw-bold mb-2">
        {{ $artikel->judul }}
    </h2>

    {{-- TANGGAL --}}
    <small class="text-muted">
        {{ $artikel->created_at?->format('d F Y') ?? 'Baru saja' }}
    </small>

    <hr>

    {{-- GAMBAR --}}
    <img src="https://source.unsplash.com/800x400/?health"
         class="img-fluid rounded mb-4"
         style="width:100%; object-fit:cover;">

    {{-- ISI ARTIKEL --}}
    <p style="line-height: 1.8; text-align: justify;">
        {{ $artikel->konten }}
    </p>

    {{-- BUTTON KEMBALI --}}
    <a href="{{ route('artikel.index') }}" class="btn btn-secondary mt-4">
        ← Kembali
    </a>

</div>
 
@endsection
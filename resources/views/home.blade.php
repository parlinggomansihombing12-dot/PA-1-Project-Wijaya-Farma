@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h3 class="fw-bold text-success mb-4">Artikel Kesehatan Terbaru</h3>

    <div class="row">
        @forelse($artikels as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">
                    <small class="text-muted">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }} 
                        • Oleh: {{ $item->penulis }}
                    </small>

                    <h5 class="fw-bold mt-2">{{ $item->judul }}</h5>

                    {{-- TOMBOL FIX --}}
                    <a href="{{ route('artikel.show', $item->id) }}" 
                       class="btn btn-primary mt-3"
                       style="position: relative; z-index: 10;">
                        Baca Selengkapnya →
                    </a>
                </div>

            </div>
        </div>
        @empty
        <p>Tidak ada artikel.</p>
        @endforelse
    </div>

</div>
@endsection
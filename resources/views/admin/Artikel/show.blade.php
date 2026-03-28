@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- Card Artikel --}}
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                
                <div class="card-body p-4">

                    {{-- Judul --}}
                    <h2 class="fw-bold mb-3 text-dark">
                        {{ $artikel->judul }}
                    </h2>

                    {{-- Info Penulis & Tanggal --}}
                    <div class="mb-3 text-muted small">
                        <i class="fas fa-user me-1"></i> {{ $artikel->penulis }}
                        &nbsp; | &nbsp;
                        <i class="fas fa-calendar-alt me-1"></i> 
                        {{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
                    </div>

                    <hr>

                    {{-- Konten Artikel --}}
                    <div class="mt-4" style="line-height: 1.8; text-align: justify;">
                        {!! nl2br(e($artikel->konten)) !!}
                    </div>

                    {{-- Tombol Kembali --}}
                    <div class="mt-5">
                        <a href="{{ route('artikel.index') }}" class="btn btn-secondary px-4">
                            ← Kembali ke Daftar Artikel
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
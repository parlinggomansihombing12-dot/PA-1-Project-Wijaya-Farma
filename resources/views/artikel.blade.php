<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artikel Kesehatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #F8F9F9; color: #2C3E50; }
        .navbar-tema { background-color: #1ABC9C !important; }
        .btn-tema { background-color: #2980B9; color: white; border: none; }
        .btn-tema:hover { background-color: #1f6391; color: white; }
        .teks-hijau { color: #1ABC9C; }
    </style>
</head>
<body>

    @include('navbar') 

    <div class="container my-5">
        <h2 class="text-center fw-bold teks-hijau mb-4">
            Artikel Kesehatan Terbaru
        </h2>

        <div class="row">
            @foreach($list_artikel as $item)
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100 p-3">
                    <div class="card-body">

                        <small class="text-muted fst-italic">
                            {{ $item->created_at?->format('d M Y') ?? 'Baru saja' }} 
                            • Oleh: {{ $item->penulis }}
                        </small>

                        <h4 class="fw-bold mt-2">{{ $item->judul }}</h4>

                        <p class="text-muted">
                            {{ \Illuminate\Support\Str::limit($item->konten, 100) }}
                        </p>

                        {{-- ✅ TOMBOL SUDAH DIPERBAIKI --}}
                        <a href="{{ route('artikel.show', $item->id) }}" 
                           class="btn btn-sm btn-outline-primary">
                            Baca Selengkapnya →
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
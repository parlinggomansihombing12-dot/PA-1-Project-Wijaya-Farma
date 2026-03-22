<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #F8F9F9; color: #2C3E50; }
        .navbar-tema { background-color: #1ABC9C !important; }
        .card-testimoni { border: none; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .bintang { color: #ffc107; font-size: 1.2rem; }
        .teks-hijau { color: #1ABC9C; }
    </style>
</head>
<body>

    <!-- Memanggil Navbar -->
    @include('navbar')

    <div class="container my-5">
        <h2 class="text-center mb-5 fw-bold teks-hijau">Apa Kata Pelanggan Kami?</h2>
        
        <div class="row justify-content-center">
            @foreach($list_testimoni as $item)
            <div class="col-md-4 mb-4">
                <div class="card card-testimoni h-100 p-3 bg-white">
                    <div class="card-body text-center">
                        <!-- Menampilkan Bintang -->
                        <div class="mb-3 bintang">
                            @for($i = 1; $i <= $item->rating; $i++)
                                ★
                            @endfor
                        </div>
                        
                        <p class="fst-italic text-muted">"{{ $item->komentar }}"</p>
                        <hr>
                        <h6 class="fw-bold mb-0">{{ $item->nama_pelanggan }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!-- Pesan jika testimoni kosong -->
            @if($list_testimoni->isEmpty())
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada testimoni saat ini.</p>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
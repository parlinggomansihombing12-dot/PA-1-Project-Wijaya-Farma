<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - {{ $toko->nama_toko ?? 'Apotek' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #F8F9F9; color: #2C3E50; }
        .navbar-tema { background-color: #1ABC9C !important; }
        .btn-tema { background-color: #2980B9; color: white; border: none; }
        .btn-tema:hover { background-color: #1f6391; color: white; }
        .teks-hijau { color: #1ABC9C; }
        
        .card-layanan {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        .card-layanan:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .ikon-besar {
            font-size: 4rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR TEMA HIJAU TUA -->
    @include('navbar')

    <!-- KONTEN LAYANAN -->
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold teks-hijau">Layanan Kami</h2>
            <p class="text-muted">Fasilitas dan layanan kesehatan terbaik untuk Anda dan keluarga.</p>
        </div>
        
        <div class="row justify-content-center">
            @foreach($list_layanan as $item)
            <div class="col-md-4 mb-4">
                <div class="card card-layanan h-100 p-4 text-center bg-white">
                    <div class="ikon-besar">
                        {{ $item->ikon ?? '⚕️' }}
                    </div>
                    <h5 class="fw-bold mb-3">{{ $item->nama_layanan }}</h5>
                    <p class="text-muted mb-4">{{ $item->deskripsi }}</p>
                    
                    <button class="btn btn-tema w-100 mt-auto">Tanya Layanan</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #F8F9F9; color: #2C3E50; }
        .navbar-tema { background-color: #1ABC9C !important; }
        .teks-hijau { color: #1ABC9C; }
        
        /* Desain kartu kategori dengan garis biru di kiri */
        .card-kategori {
            border: none;
            border-left: 5px solid #2980B9; /* Garis Biru Tema */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        .card-kategori:hover {
            transform: scale(1.03); /* Efek membesar saat disentuh */
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <!-- Memanggil Navbar -->
    @include('navbar')

    <div class="container my-5">
        <h2 class="text-center fw-bold teks-hijau mb-5">Kategori Produk Kami</h2>
        
        <div class="row justify-content-center">
            @foreach($list_kategori as $item)
            <div class="col-md-4 mb-4">
                <div class="card card-kategori h-100 p-3 bg-white">
                    <div class="card-body">
                        <!-- Teks Biru Tema -->
                        <h4 class="fw-bold mb-3" style="color: #2980B9;">{{ $item->nama_kategori }}</h4>
                        <p class="text-muted mb-4">{{ $item->deskripsi }}</p>
                        
                        <!-- Tombol diarahkan ke halaman produk -->
                        <a href="/produk" class="btn btn-outline-secondary w-100 mt-auto">Lihat Produk &rarr;</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* TEMA APOTEK MINIMALIS */
        body { background-color: #F8F9F9; color: #2C3E50; }
        .navbar-tema { background-color: #1ABC9C !important; }
        .btn-tema { background-color: #2980B9; color: white; border: none; }
        .btn-tema:hover { background-color: #1f6391; color: white; }
        .teks-hijau { color: #1ABC9C; }

        /* Desain Kartu Produk */
        .card-produk {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .card-produk:hover {
            transform: translateY(-5px); 
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .harga {
            color: #2980B9; 
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Memanggil Navbar -->
    @include('navbar')

    <!-- KONTEN PRODUK -->
    <div class="container my-5">
        <h2 class="text-center mb-5 fw-bold teks-hijau">Katalog Produk Kami</h2>

        <div class="row">
            <!-- LOOPING: Menampilkan data dari database -->
            @foreach($list_produk as $item)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-produk h-100 bg-white">
                    <!-- Gambar Dummy (Placeholder) -->
                    <div style="height: 180px; background-color: #e9ecef; border-top-left-radius: 12px; border-top-right-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <span class="text-muted text-center px-2">Foto<br>{{ $item->nama_produk }}</span>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $item->nama_produk }}</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit($item->deskripsi, 50) }}
                        </p>
                        
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Format harga Rupiah -->
                            <span class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            <small class="text-muted">Stok: {{ $item->stok }}</small>
                        </div>
                        
                        <button class="btn btn-tema w-100 mt-3">Detail</button>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!-- Pesan jika produk di database masih kosong -->
            @if($list_produk->isEmpty())
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada produk yang tersedia.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
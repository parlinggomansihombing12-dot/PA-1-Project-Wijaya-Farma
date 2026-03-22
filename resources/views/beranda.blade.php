<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $toko->nama_toko ?? 'Toko Obat Wijaya Farma' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Agar body tidak ada scroll bar jika konten pas 1 layar */
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden; /* Hilangkan scroll bar */
        }

        /* Navigasi Transparan (agar menyatu dengan foto) */
        .navbar {
            background-color: rgba(0, 0, 0, 0.5) !important; /* Hitam transparan */
            position: absolute; /* Mengambang di atas foto */
            width: 100%;
            z-index: 10;
        }

        /* Pengaturan Banner Full Layar */
        .hero-section {
            /* Ganti URL gambar di sini jika punya foto toko sendiri */
           background-image: url("{{ asset('img/toko.jpeg') }}");
            background-size: cover;
            background-position: center;
            height: 100vh; /* 100% Viewport Height (Tinggi Layar Penuh) */
            display: flex;
            align-items: center;     /* Tengah secara vertikal */
            justify-content: center; /* Tengah secara horizontal */
            position: relative;
        }

        /* Lapisan Gelap di atas foto */
        .hero-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.6); /* Gelap 60% */
        }

        /* Teks Nama Toko */
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .nama-toko-besar {
            font-size: 4rem; /* Ukuran font sangat besar */
            font-weight: 700;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
            margin-bottom: 20px;
            animation: fadeIn 2s ease-in; /* Efek muncul perlahan */
        }

        /* Animasi sederhana */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<!-- NAVBAR (Tetap ada supaya bisa pindah ke Profil, tapi dibuat transparan) -->
@include('navbar')

<!-- HERO SECTION (Hanya ini isinya) -->
<section class="hero-section">
    <div class="hero-content container">
        <h1 class="nama-toko-besar">{{ $toko->nama_toko ?? 'Toko Obat Wijaya Farma' }}</h1>
        <p class="lead fs-3">{{ $toko->deskripsi ?? 'Sahabat Sehat Keluarga Anda' }}</p>
    </div>
</section>

<!-- Produk & Footer DIHAPUS sesuai permintaan -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
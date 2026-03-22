<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Toko & Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #F8F9F9; color: #2C3E50; }
        .navbar-tema { background-color: #1ABC9C !important; }
        .btn-tema { background-color: #2980B9; color: white; border: none; }
        .btn-tema:hover { background-color: #1f6391; color: white; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); background-color: white; }
        .teks-hijau { color: #1ABC9C; }
    </style>
</head>
<body>

    <!-- Memanggil Navbar -->
    @include('navbar')

    <div class="container my-5">
        <div class="row justify-content-center">
            
            <!-- KIRI: PROFIL TOKO -->
            <div class="col-md-7 mb-4">
                <div class="card card-custom p-4 h-100">
                    <h3 class="fw-bold teks-hijau mb-3">Informasi Apotek</h3>
                    <h5 class="fw-bold">{{ $toko->nama_toko ?? 'Nama Toko Belum Diisi' }}</h5>
                    <p>{{ $toko->deskripsi ?? 'Deskripsi toko belum tersedia.' }}</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <h6 class="fw-bold mb-1">📍 Alamat Lengkap</h6>
                            <p class="mb-0 text-muted">{{ $toko->alamat ?? '-' }}</p>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <h6 class="fw-bold mb-1">📞 Layanan Pelanggan</h6>
                            <p class="mb-0 text-muted">{{ $toko->no_hp ?? '-' }}</p>
                            <p class="mb-0 text-muted">{{ $toko->email ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KANAN: PROFIL ADMIN -->
            <div class="col-md-5 mb-4">
                <div class="card card-custom p-4 h-100 text-center">
                    <h3 class="fw-bold teks-hijau mb-4">Apoteker Kami</h3>
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=300&h=300&fit=crop" alt="Foto Admin" class="rounded-circle mx-auto mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #F8F9F9; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <h5 class="fw-bold mb-1">apt. Budi Wijaya, S.Farm.</h5>
                    <p class="text-muted small mb-3">SIPA: 19920318/SIPA/2024</p>
                    <p class="text-muted" style="font-size: 0.95rem;">"Kesehatan Anda adalah prioritas kami. Jangan ragu untuk berkonsultasi mengenai resep dan penggunaan obat."</p>
                    <a href="https://wa.me/628123456789" target="_blank" class="btn btn-tema mt-auto">💬 Konsultasi via WhatsApp</a>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
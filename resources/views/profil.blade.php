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

    @include('navbar')

    <div class="container my-5">
        <div class="row justify-content-center">
            
            <!-- KIRI: PROFIL TOKO -->
            <div class="col-md-7 mb-4">
                <div class="card card-custom p-4 h-100">
                    <h3 class="fw-bold teks-hijau mb-3">Informasi Apotek</h3>
                    
                    <h5 class="fw-bold">TOKO OBAT WIJAYA FARMA</h5>

                    <p class="mt-2">
                        Menyediakan berbagai layanan kesehatan untuk membantu menjaga kondisi tubuh Anda tetap optimal.
                    </p>

                    <hr>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <h6 class="fw-bold mb-1">📍 Alamat</h6>
                            <p class="mb-0 text-muted">
                                Jl. Lintas Porsea - Laguboti<br>
                                Kecamatan Sigumpar<br>
                                Kab. Toba
                            </p>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <h6 class="fw-bold mb-1">🕒 Jam Operasional</h6>
                            <p class="mb-0 text-muted">
                                08.00 - 22.00<br>
                                Buka setiap hari
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KANAN: PROFIL ADMIN -->
            <div class="col-md-5 mb-4">
                <div class="card card-custom p-4 h-100 text-center">
                    <h3 class="fw-bold teks-hijau mb-4">Pemilik Apotek</h3>

                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=300&h=300&fit=crop"
                         alt="Foto Admin"
                         class="rounded-circle mx-auto mb-3"
                         style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #F8F9F9; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">

                    <h5 class="fw-bold mb-1">Bdn. Yesika Pradinata Sitohang, S.Keb</h5>

                    <p class="text-muted small mb-3">
                        Pemilik & Konsultan Kesehatan
                    </p>

                    <p class="text-muted" style="font-size: 0.95rem;">
                        "Kesehatan Anda adalah prioritas kami. Silakan konsultasi untuk penggunaan obat yang aman dan tepat."
                    </p>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak Kami</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #F8F9F9; color: #2C3E50; }
        .navbar-tema { background-color: #1ABC9C !important; }
        .btn-tema { background-color: #2980B9; color: white; border: none; }
        .btn-tema:hover { background-color: #1f6391; }
        .teks-hijau { color: #1ABC9C; }
    </style>
</head>
<body>

@include('navbar')

@php
    // ✅ AMAN DARI NULL
    $alamat = optional($toko)->alamat ?? 'Jl. Lintas Porsea - Laguboti, Kecamatan Sigumpar, Kab. Toba';
    $no_hp  = optional($toko)->no_hp ?? '6282370771069';
    $email  = optional($toko)->email ?? 'email@contoh.com';
@endphp

<div class="container my-5">
    <div class="row bg-white p-5 rounded shadow-sm">

        <!-- KIRI -->
        <div class="col-md-6 mb-4">
            <h2 class="fw-bold teks-hijau mb-4">Hubungi Kami</h2>

            <p class="text-muted mb-4">
                Punya pertanyaan seputar obat atau ingin konsultasi? 
                Jangan ragu untuk menghubungi kami melalui kontak di bawah ini.
            </p>

            <!-- ALAMAT -->
            <h5 class="fw-bold">📍 Alamat Apotek</h5>
            <p class="text-muted">
                {{ $alamat }}
            </p>

            <!-- WHATSAPP -->
            <h5 class="fw-bold mt-4">📞 Telepon / WhatsApp</h5>
            <p class="text-muted">
                <a href="https://wa.me/{{ $no_hp }}" 
                   target="_blank" 
                   class="text-decoration-none">
                   
                   +{{ $no_hp }}
                </a>
            </p>

            <!-- EMAIL -->
            <h5 class="fw-bold mt-4">✉️ Email</h5>
            <p class="text-muted">
                <a href="mailto:{{ $email }}" class="text-decoration-none">
                    {{ $email }}
                </a>
            </p>

        <!-- KANAN -->
        <div class="col-md-6">
            <div class="card border-0 bg-light p-4">
                <h5 class="fw-bold mb-3">Kirim Pesan Cepat</h5>

                <input type="text" class="form-control mb-3" placeholder="Nama Anda">

                <textarea class="form-control mb-3" rows="4" 
                          placeholder="Tulis pesan atau pertanyaan..."></textarea>

                <button class="btn btn-tema w-100">
                    Kirim Pesan
                </button>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@extends('layouts.main')
@section('title', 'Hubungi Kami')

@section('content')
@php
    $alamat = optional($toko)->alamat ?? 'Jl. Lintas Porsea - Laguboti, Kecamatan Sigumpar, Kab. Toba';
    $no_hp  = optional($toko)->no_hp ?? '6282370771069';
    $email  = optional($toko)->email ?? 'email@contoh.com';
@endphp

<style>
    /* Tambahan Style untuk mempercantik */
    .contact-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    .info-item {
        transition: all 0.3s ease;
        padding: 20px;
        border-radius: 15px;
        border: 1px solid #f0f0f0;
    }
    .info-item:hover {
        background-color: #f8fff9;
        border-color: #20b295;
        transform: translateY(-5px);
    }
    .icon-circle {
        width: 50px;
        height: 50px;
        background: rgba(32, 178, 149, 0.1);
        color: #20b295;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 20px;
        margin-bottom: 15px;
    }
    .map-container {
        border-radius: 15px;
        overflow: hidden;
        height: 100%;
        min-height: 400px;
    }
</style>

<div class="container my-5 pt-4">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="fw-bold teks-hijau">Hubungi Kami</h2>
            <p class="text-muted">Kami siap melayani kebutuhan kesehatan Anda dengan sepenuh hati.</p>
        </div>
    </div>

    <div class="card contact-card p-4 p-md-5">
        <div class="row g-5">
            <!-- KIRI: INFORMASI KONTAK -->
            <div class="col-md-5">
                <h4 class="fw-bold mb-4">Informasi Kontak</h4>
                
                <!-- Alamat -->
                <div class="info-item mb-4">
                    <div class="icon-circle">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Alamat Apotek</h6>
                    <p class="text-muted small mb-0">{{ $alamat }}</p>
                </div>

                <!-- WhatsApp -->
                <div class="info-item mb-4">
                    <div class="icon-circle">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Telepon / WhatsApp</h6>
                    <p class="text-muted small mb-2">Konsultasi obat lebih cepat via WhatsApp</p>
                    <a href="https://wa.me/{{ $no_hp }}" target="_blank" class="btn btn-sm btn-success rounded-pill px-3">
                        <i class="fab fa-whatsapp me-1"></i> Chat Sekarang
                    </a>
                </div>

                <!-- Jam Operasional -->
                <div class="info-item mb-4">
                    <div class="icon-circle">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Jam Operasional</h6>
                    <p class="text-muted small mb-0">
                        Senin - Sabtu: 08:00 - 21:00 <br>
                        Minggu: 09:00 - 17:00
                    </p>
                </div>

                <!-- Email -->
                <div class="info-item">
                    <div class="icon-circle">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Email Resmi</h6>
                    <p class="text-muted small mb-0">{{ $email }}</p>
                </div>
            </div>

            <!-- KANAN: GOOGLE MAPS -->
            <div class="col-md-7">
                <div class="map-container shadow-sm">
                    <!-- Ganti URL src di bawah ini dengan link share embed dari Google Maps lokasi toko Anda -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.5332!2d99.1234!3d2.3456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwMjAnNDQuNCJOIDk5wrAwNyU1Ny42IkU!5e0!3m2!1sid!2sid!4v1600000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 450px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="mt-3 text-end">
                    <a href="https://maps.google.com" target="_blank" class="text-decoration-none teks-hijau small fw-bold">
                        Buka di Google Maps <i class="fas fa-external-link-alt ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
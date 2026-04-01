@extends('layouts.main')
@section('title', 'Hubungi Kami')

@section('content')
@php
    $alamat = optional($toko)->alamat ?? 'Jl. Lintas Porsea - Laguboti, Kecamatan Sigumpar, Kab. Toba';
    $no_hp  = optional($toko)->no_hp ?? '6282370771069';
    $email  = optional($toko)->email ?? 'email@contoh.com';
@endphp

<div class="container my-5 pt-4">
    <div class="card card-custom p-5">
        <div class="row">
            <!-- KIRI -->
            <div class="col-md-6 mb-4">
                <h2 class="fw-bold teks-hijau mb-4">Hubungi Kami</h2>
                <p class="text-muted mb-5 leading-relaxed">
                    Punya pertanyaan seputar obat atau ingin konsultasi? 
                    Jangan ragu untuk menghubungi kami melalui kontak di bawah ini.
                </p>

                <div class="mb-4">
                    <h6 class="fw-bold mb-1"><i class="fas fa-map-marker-alt me-2 teks-hijau"></i> Alamat Apotek</h6>
                    <p class="text-muted small">{{ $alamat }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold mb-1"><i class="fab fa-whatsapp me-2 teks-hijau"></i> Telepon / WhatsApp</h6>
                    <p class="text-muted small">
                        <a href="https://wa.me/{{ $no_hp }}" target="_blank" class="text-decoration-none text-muted">
                           +{{ $no_hp }}
                        </a>
                    </p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold mb-1"><i class="fas fa-envelope me-2 teks-hijau"></i> Email</h6>
                    <p class="text-muted small">
                        <a href="mailto:{{ $email }}" class="text-decoration-none text-muted">{{ $email }}</a>
                    </p>
                </div>
            </div>

            <!-- KANAN -->
            <div class="col-md-6">
                <div class="card border-0 bg-light p-4 rounded-4 shadow-none">
                    <h5 class="fw-bold mb-4">Kirim Pesan Cepat</h5>
                    <div class="mb-3">
                        <input type="text" class="form-control border-0 py-3 px-4" placeholder="Nama Anda">
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control border-0 py-3 px-4" rows="4" placeholder="Tulis pesan atau pertanyaan..."></textarea>
                    </div>
                    <button class="btn btn-tema w-100 py-3">Kirim Pesan Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.main')

@section('title', 'Profil Apotek - ' . ($toko->nama_toko ?? 'Wijaya Farma'))

@push('custom-css')
<style>
    body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    
    /* Styling Judul dengan Garis */
    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .section-header h3 {
        color: #16a085;
        font-weight: 700;
        margin: 0;
        white-space: nowrap;
        padding-right: 15px;
        position: relative;
    }
    .section-header::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #dee2e6;
    }

    /* Container Card */
    .profile-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e9ecef;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        padding: 30px;
        margin-bottom: 40px;
    }

    /* Label Hijau */
    .label-green {
        color: #16a085;
        font-weight: 700;
        font-size: 1.1rem;
    }

    /* Styling Gambar */
    .img-toko {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 25px;
        border: 1px solid #eee;
    }
    .img-pemilik {
        width: 100%;
        border-radius: 8px;
        border: 1px solid #dee2e6;
        padding: 5px;
    }

    /* List & Text */
    .info-value { color: #2c3e50; font-size: 1.05rem; line-height: 1.6; }
    .list-custom { padding-left: 15px; margin: 0; list-style-type: none; }
    .list-custom li::before {
        content: "•";
        color: #16a085;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    
    {{-- CEK APAKAH DATA TOKO ADA --}}
    @if($toko)
        <!-- SECTION 1: PROFIL TOKO -->
        <div class="section-header">
            <h3>Profil Toko</h3>
        </div>

        <div class="profile-card">
            <div class="row">
                <div class="col-12">
                    {{-- Gunakan operator ?-> untuk keamanan tambahan --}}
                    @if($toko->foto_toko)
                        <img src="{{ asset('storage/' . $toko->foto_toko) }}" class="img-toko shadow-sm" alt="Foto Depan Toko">
                    @else
                        <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbbb88?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-toko shadow-sm" alt="Default Store Image">
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <span class="label-green">Nama Toko:</span>
                        <span class="info-value ms-2">{{ $toko->nama_toko }}</span>
                        <hr class="my-3 opacity-25">
                    </div>

                    <div class="mb-4">
                        <p class="label-green mb-2">Sejarah Toko:</p>
                        <p class="info-value">{{ $toko->sejarah }}</p>
                        <hr class="my-3 opacity-25">
                    </div>

                    <div class="mb-0">
                        <p class="label-green mb-2">Jam Operasional:</p>
                        <div class="info-value">{!! $toko->jam_operasional !!}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: PROFIL PEMILIK TOKO -->
        <div class="section-header">
            <h3>Profil Pemilik Toko</h3>
        </div>

        <div class="profile-card">
            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    @if($toko->foto_pemilik)
                        <img src="{{ asset('storage/' . $toko->foto_pemilik) }}" class="img-pemilik shadow-sm" alt="Foto Pemilik">
                    @else
                        <img src="https://via.placeholder.com/400x500.png?text=Foto+Pemilik" class="img-pemilik shadow-sm" alt="Foto Pemilik">
                    @endif
                </div>

                <div class="col-md-8 col-lg-9">
                    <div class="mb-3">
                        <span class="label-green">Nama Pemilik:</span>
                        <span class="info-value ms-2">{{ $toko->nama_pemilik }}</span>
                        <hr class="my-3 opacity-25">
                    </div>

                    <div class="mb-4">
                        <p class="label-green mb-2">Pendidikan:</p>
                        <ul class="list-custom info-value">
                            {!! $toko->pendidikan !!}
                        </ul>
                    </div>

                    <div class="mb-0">
                        <p class="label-green mb-2">Pengalaman:</p>
                        <ul class="list-custom info-value">
                            {!! $toko->pengalaman !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- TAMPILAN JIKA DATA DI DATABASE KOSONG --}}
        <div class="alert alert-warning text-center p-5">
            <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
            <h4>Data profil belum diisi.</h4>
            <p>Silakan isi data profil apotek melalui halaman admin terlebih dahulu.</p>
        </div>
    @endif

</div>
@endsection
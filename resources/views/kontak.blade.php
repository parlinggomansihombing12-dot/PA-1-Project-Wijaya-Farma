@extends('layouts.main')

@section('title', 'Hubungi Kami - Wijaya Farma')

@section('custom-css')
<style>
    body { background-color: #f8fcfb; }
    
    .judul-halaman { color: #2c3e50; font-weight: 800; font-size: 2.2rem; }
    .sub-judul { color: #7f8c8d; font-size: 1.1rem; max-width: 600px; margin: 0 auto; }
    
    /* Box Utama Pembungkus Kontak & Maps */
    .kontak-wrapper { background: white; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.04); padding: 40px; margin-bottom: 60px; }

    /* Kartu Informasi Info di Kiri */
    .info-card { border: 1px solid #f0f3f2; border-radius: 15px; padding: 20px 25px; margin-bottom: 20px; display: flex; align-items: flex-start; transition: 0.3s; background-color: #ffffff; }
    .info-card:hover { border-color: #1ABC9C; box-shadow: 0 5px 15px rgba(26,188,156,0.1); transform: translateY(-3px); }
    
    /* Ikon Bulat */
    .icon-bulat { width: 50px; height: 50px; background-color: #e8f8f5; color: #1ABC9C; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-right: 20px; flex-shrink: 0; }
    
    .info-title { font-weight: 700; color: #2c3e50; margin-bottom: 5px; font-size: 1.05rem; }
    .info-text { color: #596275; font-size: 0.95rem; margin-bottom: 0; line-height: 1.6; }
    
    /* Tombol WA Hijau */
    .btn-wa { background-color: #25D366; color: white; border: none; border-radius: 30px; padding: 8px 20px; font-size: 0.9rem; font-weight: 600; display: inline-block; margin-top: 10px; transition: 0.3s; text-decoration: none;}
    .btn-wa:hover { background-color: #1ebe57; color: white; transform: scale(1.05); }

    /* Kotak Google Maps */
    .maps-container { border-radius: 15px; overflow: hidden; height: 100%; min-height: 400px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border: 1px solid #f0f3f2; background-color: #e9ecef; display: flex; align-items: center; justify-content: center;}
    .maps-iframe { width: 100%; height: 100%; border: 0; min-height: 400px; }
    .link-maps { display: block; text-align: right; margin-top: 10px; font-size: 0.9rem; font-weight: 600; color: #1ABC9C; text-decoration: none; }
    .link-maps:hover { text-decoration: underline; color: #16a085; }
</style>
@endsection

@section('content')
<div class="container my-5 pt-3">
    
    <!-- HEADER TEKS -->
    <div class="text-center mb-5 pb-2">
        <h1 class="judul-halaman">Hubungi Kami</h1>
        <p class="sub-judul mt-3">Kami siap melayani kebutuhan kesehatan Anda dengan sepenuh hati. Silakan hubungi kami melalui kontak di bawah atau kunjungi apotek kami langsung.</p>
    </div>

    <!-- KOTAK PUTIH BESAR PEMBUNGKUS -->
    <div class="kontak-wrapper">
        <div class="row">
            
            <!-- KOLOM KIRI: DAFTAR KONTAK -->
            <div class="col-lg-5 pe-lg-4 mb-4 mb-lg-0">
                <h4 class="fw-bold mb-4" style="color: #2c3e50;">Informasi Kontak</h4>
                
                <!-- 1. Alamat -->
                <div class="info-card">
                    <div class="icon-bulat"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <div class="info-title">Alamat Apotek</div>
                        <p class="info-text">{{ $toko->alamat ?? 'Belum ada data alamat.' }}</p>
                    </div>
                </div>

                <!-- 2. WhatsApp / Telepon -->
                <div class="info-card">
                    <div class="icon-bulat" style="background-color: #e5f9ed; color: #25D366;"><i class="fab fa-whatsapp"></i></div>
                    <div>
                        <div class="info-title">Telepon / WhatsApp</div>
                        <p class="info-text">Konsultasi obat lebih cepat via WhatsApp</p>
                        
                        <!-- LOGIKA WHATSAPP PINTAR -->
                        @php 
                            $no_asli = $toko->no_hp ?? '';
                            $no_bersih = preg_replace('/[^0-9]/', '', $no_asli);
                            
                            // Jika diawali angka 0, ubah jadi 62
                            if (strlen($no_bersih) > 0 && substr($no_bersih, 0, 1) === '0') {
                                $no_wa = '62' . substr($no_bersih, 1);
                            } else {
                                $no_wa = $no_bersih;
                            }
                        @endphp
                        
                        @if($no_wa != '')
                            <a href="https://wa.me/{{ $no_wa }}" target="_blank" class="btn-wa">
                                <i class="fab fa-whatsapp me-1"></i> Chat Sekarang
                            </a>
                        @else
                            <small class="text-danger">Nomor WA belum diisi Admin.</small>
                        @endif
                    </div>
                </div>

                <!-- 3. Jam Operasional -->
                <div class="info-card">
                    <div class="icon-bulat"><i class="far fa-clock"></i></div>
                    <div>
                        <div class="info-title">Jam Operasional</div>
                        <!-- Memanggil kolom jam_operasional dari Database -->
                        <p class="info-text">
                            @if(isset($toko->jam_operasional) && $toko->jam_operasional != '')
                                {!! nl2br(e($toko->jam_operasional)) !!}
                            @else
                                Belum diatur oleh Admin.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- 4. Email -->
                <div class="info-card mb-0">
                    <div class="icon-bulat"><i class="far fa-envelope"></i></div>
                    <div>
                        <div class="info-title">Email Resmi</div>
                        <p class="info-text">{{ $toko->email ?? 'Belum ada email.' }}</p>
                    </div>
                </div>

            </div>

            <!-- KOLOM KANAN: GOOGLE MAPS -->
            <div class="col-lg-7">
                <div class="maps-container">
                    
                    <!-- LOGIKA GOOGLE MAPS -->
                    @if(isset($toko->map_url) && $toko->map_url != '')
                        <iframe src="{{ $toko->map_url }}" class="maps-iframe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <div class="text-center text-muted p-5">
                            <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                            <h5>Peta Belum Tersedia</h5>
                            <p>Admin belum memasukkan link embed Google Maps.</p>
                        </div>
                    @endif

                </div>
                <a href="https://maps.google.com" target="_blank" class="link-maps">Buka di Google Maps <i class="fas fa-external-link-alt ms-1" style="font-size: 0.8rem;"></i></a>
            </div>

        </div>
    </div>

</div>
@endsection
@extends('layouts.main')

@section('title', 'Hubungi Kami - Wijaya Farma')

@section('custom-css')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d1fae5;
        --secondary: #2c3e50;
        --accent: #e67e22;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
        --shadow-lg: 0 8px 20px rgba(0,0,0,0.08);
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
        min-height: 100vh;
    }

    .container-kontak {
        width: 100%;
        max-width: 100%;
        padding: 0;
        margin: 0;
    }

    /* ================= HERO SECTION - DIPERKECIL ================= */
    .hero-kontak {
        background: linear-gradient(135deg, #1a2634 0%, #2c3e50 100%);
        padding: 45px 0;
        text-align: center;
        position: relative;
        width: 100%;
    }

    .hero-kontak::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--accent), var(--primary));
    }

    .hero-title {
        font-size: 2rem;
        font-weight: 800;
        color: white;
        margin-bottom: 10px;
        letter-spacing: -0.5px;
    }

    .hero-subtitle {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.85);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.5;
    }

    /* ================= MAIN CONTENT ================= */
    .main-content {
        padding: 35px 30px;
        max-width: 1200px;
        margin: 0 auto;
        width: 100%;
    }

    /* ================= STATS - DIPERKECIL ================= */
    .stats-kontak {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card-kontak {
        background: white;
        border-radius: 16px;
        padding: 20px 15px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: all 0.2s;
        border: 1px solid #eef2f6;
    }

    .stat-card-kontak:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-light);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
    }

    .stat-icon i {
        font-size: 1.3rem;
        color: var(--primary);
    }

    .stat-number {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 0.7rem;
        font-weight: 600;
        color: var(--text-muted);
    }

    /* ================= TWO COLUMNS ================= */
    .two-columns {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .contact-info-col {
        flex: 1;
        min-width: 300px;
    }

    .map-col {
        flex: 1;
        min-width: 300px;
    }

    /* ================= SECTION HEADER - DIPERKECIL ================= */
    .section-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--primary-light);
    }

    .section-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .section-header h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    /* ================= CONTACT CARDS - DIPERKECIL ================= */
    .contact-card {
        background: white;
        border-radius: 18px;
        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 16px;
        transition: all 0.2s;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
    }

    .contact-card:hover {
        transform: translateX(6px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary-light);
    }

    .contact-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-light);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .contact-icon i {
        font-size: 1.3rem;
        color: var(--primary);
    }

    .contact-detail {
        flex: 1;
    }

    .contact-detail h4 {
        font-size: 0.95rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 6px;
    }

    .contact-detail p {
        font-size: 0.8rem;
        color: var(--text-muted);
        line-height: 1.5;
        margin-bottom: 8px;
    }

    /* ================= TOMBOL WA - DIPERKECIL ================= */
    .btn-wa-kontak {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #25D366, #128c7e);
        color: white;
        padding: 8px 20px;
        border-radius: 40px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 700;
        transition: all 0.2s;
        margin-top: 6px;
    }

    .btn-wa-kontak:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(37,211,102,0.3);
        gap: 10px;
        color: white;
    }

    /* ================= TOMBOL MAPS - DIPERKECIL ================= */
    .btn-maps {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--primary);
        color: white;
        padding: 7px 16px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 0.7rem;
        font-weight: 700;
        transition: all 0.2s;
    }

    .btn-maps-outline {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: transparent;
        color: var(--primary);
        border: 1.5px solid var(--primary);
        padding: 7px 16px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 0.7rem;
        font-weight: 700;
        transition: all 0.2s;
    }

    .btn-maps:hover, .btn-maps-outline:hover {
        transform: translateY(-2px);
        gap: 8px;
    }

    .btn-maps-outline:hover {
        background: var(--primary);
        color: white;
    }

    /* ================= MAPS CONTAINER - DIPERKECIL ================= */
    .maps-container {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid #eef2f6;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .maps-header {
        padding: 16px 22px;
        background: linear-gradient(135deg, #f8fafc, white);
        border-bottom: 1px solid #eef2f6;
    }

    .maps-header h4 {
        font-size: 0.95rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .maps-header h4 i {
        font-size: 1rem;
        color: var(--primary);
    }

    .maps-iframe {
        width: 100%;
        height: 350px;
        border: none;
    }

    .maps-footer {
        padding: 15px 20px;
        background: #f8fafc;
        border-top: 1px solid #eef2f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .maps-footer .btn-maps,
    .maps-footer .btn-maps-outline {
        font-size: 0.7rem;
        padding: 8px 18px;
    }

    .maps-placeholder {
        width: 100%;
        height: 350px;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
        color: #94a3b8;
    }

    .maps-placeholder i {
        font-size: 3rem;
        opacity: 0.5;
    }

    .maps-placeholder p {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-muted);
    }

    /* ================= CTA BANNER - DIPERKECIL ================= */
    .cta-banner {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 24px;
        padding: 30px 35px;
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .cta-text h3 {
        font-size: 1.2rem;
        font-weight: 800;
        color: white;
        margin-bottom: 6px;
    }

    .cta-text p {
        font-size: 0.8rem;
        color: rgba(255,255,255,0.85);
        margin: 0;
    }

    .cta-btn {
        background: white;
        color: var(--primary);
        padding: 10px 28px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 800;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .cta-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        gap: 12px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1000px) {
        .stats-kontak {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 25px 20px;
        }
        .hero-title {
            font-size: 1.6rem;
        }
        .hero-subtitle {
            font-size: 0.75rem;
        }
        .stats-kontak {
            grid-template-columns: 1fr;
            gap: 12px;
        }
        .two-columns {
            flex-direction: column;
            gap: 20px;
        }
        .contact-info-col, .map-col {
            min-width: 100%;
        }
        .maps-iframe, .maps-placeholder {
            height: 280px;
        }
        .cta-banner {
            flex-direction: column;
            text-align: center;
            padding: 25px;
        }
        .maps-footer {
            flex-direction: column;
            align-items: stretch;
        }
        .maps-footer .btn-maps,
        .maps-footer .btn-maps-outline {
            justify-content: center;
        }
        .section-header h3 {
            font-size: 1rem;
        }
        .section-icon {
            width: 38px;
            height: 38px;
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')

<div class="container-kontak">

    <!-- HERO SECTION -->
    <div class="hero-kontak">
        <h1 class="hero-title">Hubungi Kami</h1>
        <p class="hero-subtitle">
            Kami siap melayani kebutuhan kesehatan Anda dengan sepenuh hati.<br>
            Silakan hubungi kami melalui kontak di bawah atau kunjungi apotek kami langsung.
        </p>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        @php 
            $alamat_toko = $toko->alamat ?? 'Jalan Lintas Porsea-Laguboti, Toko Obat Wijaya Farma, Samping Kantor Camat Kab Toba, SIGUMPAR, KAB.TOBA SAMOSIR, SUMATERA UTARA, ID 22353';
            $maps_search_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($alamat_toko);
            $maps_direction_url = 'https://www.google.com/maps/dir/?api=1&destination=' . urlencode($alamat_toko);
            
            $no_asli = $toko->no_hp ?? '';
            $no_bersih = preg_replace('/[^0-9]/', '', $no_asli);
            if (strlen($no_bersih) > 0 && substr($no_bersih, 0, 1) === '0') {
                $no_wa = '62' . substr($no_bersih, 1);
            } else {
                $no_wa = $no_bersih;
            }
        @endphp

        <!-- STATISTIK -->
        <div class="stats-kontak">
            <div class="stat-card-kontak">
                <div class="stat-icon"><i class="fas fa-clock"></i></div>
                <div class="stat-number">24/7</div>
                <div class="stat-label">Layanan Konsultasi</div>
            </div>
            <div class="stat-card-kontak">
                <div class="stat-icon"><i class="fas fa-headset"></i></div>
                <div class="stat-number">Gratis</div>
                <div class="stat-label">Konsultasi Obat</div>
            </div>
            <div class="stat-card-kontak">
                <div class="stat-icon"><i class="fas fa-map-pin"></i></div>
                <div class="stat-number">Mudah</div>
                <div class="stat-label">Dijangkau</div>
            </div>
            <div class="stat-card-kontak">
                <div class="stat-icon"><i class="fas fa-store"></i></div>
                <div class="stat-number">Lengkap</div>
                <div class="stat-label">Fasilitas</div>
            </div>
        </div>

        <!-- DUA KOLOM -->
        <div class="two-columns">
            
            <!-- KOLOM KIRI: INFORMASI KONTAK -->
            <div class="contact-info-col">
                <div class="section-header">
                    <div class="section-icon"><i class="fas fa-phone-alt"></i></div>
                    <h3>Informasi Kontak</h3>
                </div>

                <!-- ALAMAT -->
                <div class="contact-card">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-detail">
                        <h4>📍 Alamat Apotek</h4>
                        <p>{{ \Illuminate\Support\Str::limit($alamat_toko, 120) }}</p>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 6px;">
                            <a href="{{ $maps_direction_url }}" target="_blank" class="btn-maps">
                                <i class="fas fa-directions"></i> Petunjuk Arah
                            </a>
                            <a href="{{ $maps_search_url }}" target="_blank" class="btn-maps-outline">
                                <i class="fas fa-external-link-alt"></i> Google Maps
                            </a>
                        </div>
                    </div>
                </div>

                <!-- WHATSAPP -->
                <div class="contact-card">
                    <div class="contact-icon" style="background: #e5f9ed;"><i class="fab fa-whatsapp" style="color: #25D366;"></i></div>
                    <div class="contact-detail">
                        <h4>💬 WhatsApp / Telepon</h4>
                        <p>Konsultasi obat lebih cepat via WhatsApp</p>
                        @if($no_wa != '')
                            <a href="https://wa.me/{{ $no_wa }}" target="_blank" class="btn-wa-kontak">
                                <i class="fab fa-whatsapp"></i> Chat Sekarang
                            </a>
                        @else
                            <small class="text-muted">Nomor WhatsApp belum diisi</small>
                        @endif
                    </div>
                </div>

                <!-- JAM OPERASIONAL -->
                <div class="contact-card">
                    <div class="contact-icon"><i class="far fa-clock"></i></div>
                    <div class="contact-detail">
                        <h4>🕒 Jam Operasional</h4>
                        <p>
                            @if(isset($toko->jam_operasional) && $toko->jam_operasional != '')
                                {!! nl2br(e($toko->jam_operasional)) !!}
                            @else
                                Senin - Jumat: 07.00 - 22.00<br>
                                Sabtu - Minggu: 07.00 - 21.30
                            @endif
                        </p>
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="contact-card">
                    <div class="contact-icon"><i class="far fa-envelope"></i></div>
                    <div class="contact-detail">
                        <h4>📧 Email Resmi</h4>
                        <p style="font-size: 0.85rem; font-weight: 600; color: var(--primary);">{{ $toko->email ?? 'info@wijayafarma.com' }}</p>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: MAPS -->
            <div class="map-col">
                <div class="maps-container">
                    <div class="maps-header">
                        <h4><i class="fas fa-map-marked-alt"></i> Lokasi Kami</h4>
                    </div>
                    
                    @if(isset($toko->map_url) && $toko->map_url != '')
                        <iframe src="{{ $toko->map_url }}" class="maps-iframe" allowfullscreen="" loading="lazy"></iframe>
                    @else
                        <div class="maps-placeholder">
                            <i class="fas fa-map-marked-alt"></i>
                            <p><strong>{{ $toko->nama_toko ?? 'Wijaya Farma' }}</strong></p>
                            <p style="font-size: 0.8rem; max-width: 80%; text-align: center;">{{ \Illuminate\Support\Str::limit($alamat_toko, 80) }}</p>
                            <a href="{{ $maps_search_url }}" target="_blank" class="btn-maps" style="margin-top: 10px; padding: 8px 20px;">
                                <i class="fas fa-external-link-alt"></i> Buka Maps
                            </a>
                        </div>
                    @endif
                    
                    <div class="maps-footer">
                        <a href="{{ $maps_direction_url }}" target="_blank" class="btn-maps">
                            <i class="fas fa-directions"></i> Petunjuk Arah
                        </a>
                        <a href="{{ $maps_search_url }}" target="_blank" class="btn-maps-outline">
                            <i class="fas fa-external-link-alt"></i> Buka Google Maps
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- CTA BANNER -->
        <div class="cta-banner">
            <div class="cta-text">
                <h3>Ada yang ingin ditanyakan?</h3>
                <p>Tim kesehatan profesional kami siap membantu Anda 24/7</p>
            </div>
            @if($no_wa != '')
                <a href="https://wa.me/{{ $no_wa }}" target="_blank" class="cta-btn">
                    <i class="fab fa-whatsapp"></i> Konsultasi Gratis
                </a>
            @else
                <a href="#" class="cta-btn" style="opacity: 0.5; cursor: not-allowed;">
                    <i class="fab fa-whatsapp"></i> Konsultasi Gratis
                </a>
            @endif
        </div>

    </div>

</div>

@endsection
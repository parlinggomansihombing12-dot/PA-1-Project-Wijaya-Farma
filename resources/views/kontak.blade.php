@extends('layouts.main')

@section('title', 'Hubungi Kami - Wijaya Farma')

@section('custom-css')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16A085;
        --primary-light: #CCFBF1;
        --primary-soft: #E6F7F3;
        --primary-ultra-soft: #F2FCF9;
        --accent: #E67E22;
        --dark: #1E293B;
        --text-muted: #5A6E7A;
        --text-light: #8A9AAA;
        --white: #FFFFFF;
        --shadow-sm: 0 2px 12px rgba(26,188,156,0.05);
        --shadow-md: 0 4px 20px rgba(26,188,156,0.08);
        --shadow-lg: 0 8px 30px rgba(26,188,156,0.12);
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #F2FCF9 0%, #EAF8F4 100%);
        min-height: 100vh;
    }

    .container-kontak {
        width: 100%;
        max-width: 100%;
        padding: 0;
        margin: 0;
    }

    /* ================= HERO SECTION - SEKARANG SAMA DENGAN BAWAH ================= */
    .hero-kontak {
        background: linear-gradient(135deg, #F2FCF9 0%, #EAF8F4 100%);
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
        color: var(--dark);
        margin-bottom: 10px;
        letter-spacing: -0.5px;
    }

    .hero-subtitle {
        font-size: 0.85rem;
        color: var(--text-muted);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.5;
    }

    /* ================= MAIN CONTENT ================= */
    .main-content {
        padding: 40px 30px;
        max-width: 1200px;
        margin: 0 auto;
        width: 100%;
    }

    /* ================= STATS CARD ================= */
    .stats-kontak {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 45px;
    }

    .stat-card-kontak {
        background: var(--white);
        border-radius: 24px;
        padding: 22px 15px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        border: 1px solid rgba(26,188,156,0.1);
    }

    .stat-card-kontak:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: rgba(26,188,156,0.25);
    }

    .stat-icon {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, var(--primary-ultra-soft) 0%, var(--primary-soft) 100%);
        border-radius: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px;
    }

    .stat-icon i {
        font-size: 1.4rem;
        color: var(--primary);
    }

    .stat-number {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--primary-dark);
        margin-bottom: 6px;
    }

    .stat-label {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--text-muted);
        letter-spacing: 0.3px;
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

    /* ================= SECTION HEADER ================= */
    .section-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        padding-bottom: 12px;
        border-bottom: 2px solid rgba(26,188,156,0.2);
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
        box-shadow: 0 4px 10px rgba(26,188,156,0.2);
    }

    .section-header h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    /* ================= CONTACT CARDS ================= */
    .contact-card {
        background: var(--white);
        border-radius: 20px;
        padding: 22px;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 18px;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(26,188,156,0.1);
    }

    .contact-card:hover {
        transform: translateX(6px);
        box-shadow: var(--shadow-md);
        border-color: rgba(26,188,156,0.25);
        background: linear-gradient(135deg, var(--white) 0%, var(--primary-ultra-soft) 100%);
    }

    .contact-icon {
        width: 52px;
        height: 52px;
        background: linear-gradient(135deg, var(--primary-ultra-soft) 0%, var(--primary-soft) 100%);
        border-radius: 16px;
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
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 8px;
    }

    .contact-detail p {
        font-size: 0.85rem;
        color: var(--text-muted);
        line-height: 1.5;
        margin-bottom: 10px;
    }

    /* ================= BUTTONS ================= */
    .btn-wa-kontak {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #25D366, #128C7E);
        color: white;
        padding: 8px 22px;
        border-radius: 40px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 700;
        transition: all 0.3s ease;
        margin-top: 6px;
    }

    .btn-wa-kontak:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(37,211,102,0.3);
        gap: 10px;
        color: white;
    }

    .btn-maps {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 8px 18px;
        border-radius: 40px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(26,188,156,0.2);
    }

    .btn-maps-outline {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: var(--primary);
        border: 1.5px solid var(--primary);
        padding: 8px 18px;
        border-radius: 40px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-maps:hover, .btn-maps-outline:hover {
        transform: translateY(-2px);
        gap: 10px;
    }

    .btn-maps:hover {
        background: var(--primary-dark);
    }

    .btn-maps-outline:hover {
        background: var(--primary);
        color: white;
    }

    /* ================= MAPS CONTAINER ================= */
    .maps-container {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(26,188,156,0.1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .maps-header {
        padding: 18px 24px;
        background: linear-gradient(135deg, var(--white) 0%, var(--primary-ultra-soft) 100%);
        border-bottom: 1px solid rgba(26,188,156,0.15);
    }

    .maps-header h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .maps-header h4 i {
        font-size: 1.1rem;
        color: var(--primary);
    }

    .maps-iframe {
        width: 100%;
        height: 350px;
        border: none;
    }

    .maps-footer {
        padding: 16px 24px;
        background: linear-gradient(135deg, var(--primary-ultra-soft) 0%, var(--white) 100%);
        border-top: 1px solid rgba(26,188,156,0.15);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }

    .maps-placeholder {
        width: 100%;
        height: 350px;
        background: linear-gradient(135deg, var(--primary-ultra-soft) 0%, #EAF8F4 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 14px;
        color: var(--text-light);
    }

    .maps-placeholder i {
        font-size: 3.5rem;
        opacity: 0.6;
        color: var(--primary);
    }

    .maps-placeholder p {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--text-muted);
    }

    /* ================= CTA BANNER ================= */
    .cta-banner {
        background: linear-gradient(135deg, #FFFFFF 0%, #F5FDFA 100%);
        border-radius: 24px;
        padding: 32px 38px;
        margin-top: 45px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        border: 1px solid rgba(26,188,156,0.15);
        box-shadow: var(--shadow-md);
    }

    .cta-text h3 {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 6px;
    }

    .cta-text p {
        font-size: 0.85rem;
        color: var(--text-muted);
        margin: 0;
    }

    .cta-btn {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 12px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(26,188,156,0.25);
    }

    .cta-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(26,188,156,0.35);
        gap: 14px;
        color: white;
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
        .contact-card {
            padding: 18px;
        }
        .contact-icon {
            width: 45px;
            height: 45px;
        }
    }
</style>
@endsection

@section('content')

<div class="container-kontak">

    <!-- HERO SECTION - SEKARANG SAMA PERSIS DENGAN WARNA BAWAH -->
    <div class="hero-kontak">
        <h1 class="hero-title">Hubungi Kami</h1>
        <p class="hero-subtitle">
            Kami siap melayani kebutuhan kesehatan Anda dengan sepenuh hati.<br>
            Silakan hubungi kami melalui kontak di bawah atau kunjungi apotek kami langsung.
        </p>
    </div>

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
            
            <!-- KOLOM KIRI -->
            <div class="contact-info-col">
                <div class="section-header">
                    <div class="section-icon"><i class="fas fa-phone-alt"></i></div>
                    <h3>Informasi Kontak</h3>
                </div>

                <div class="contact-card">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-detail">
                        <h4>📍 Alamat Apotek</h4>
                        <p>{{ \Illuminate\Support\Str::limit($alamat_toko, 120) }}</p>
                        <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 8px;">
                            <a href="{{ $maps_direction_url }}" target="_blank" class="btn-maps">
                                <i class="fas fa-directions"></i> Petunjuk Arah
                            </a>
                            <a href="{{ $maps_search_url }}" target="_blank" class="btn-maps-outline">
                                <i class="fas fa-external-link-alt"></i> Google Maps
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-icon" style="background: linear-gradient(135deg, #DCFCE7, #BBF7D0);"><i class="fab fa-whatsapp" style="color: #22C55E;"></i></div>
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
                            <a href="{{ $maps_search_url }}" target="_blank" class="btn-maps" style="margin-top: 10px; padding: 8px 22px;">
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
                <h5>Tim kesehatan profesional kami siap membantu Anda 24/7</h5>
            </div>
        </div>

    </div>

</div>

@endsection
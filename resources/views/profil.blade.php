@extends('layouts.main')
@section('title', 'Profil Kami - Wijaya Farma')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d1fae5;
        --secondary: #2c3e50;
        --secondary-dark: #1a2634;
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

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path fill="none" stroke="%231ABC9C" stroke-width="1" d="M10 10 L90 10 M10 20 L90 20 M10 30 L90 30 M10 40 L90 40 M10 50 L90 50 M10 60 L90 60 M10 70 L90 70 M10 80 L90 80 M10 90 L90 90 M20 10 L20 90 M30 10 L30 90 M40 10 L40 90 M50 10 L50 90 M60 10 L60 90 M70 10 L70 90 M80 10 L80 90"/></svg>');
        background-repeat: repeat;
        background-size: 40px;
        pointer-events: none;
        z-index: 0;
    }

    .container-full {
        width: 100%;
        max-width: 100%;
        padding: 0;
        margin: 0;
    }

    /* ================= HERO SECTION - DIPERKECIL ================= */
    .hero-profil {
        position: relative;
        width: 100%;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(26,188,156,0.85) 0%, rgba(44,62,80,0.9) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 0 20px;
    }

    .hero-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: white;
        margin-bottom: 10px;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .hero-tagline {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.9);
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(8px);
        padding: 8px 22px;
        border-radius: 50px;
        display: inline-block;
        border: 1px solid rgba(255,255,255,0.2);
    }

    /* ================= MAIN CONTENT - DIPERKECIL ================= */
    .main-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 35px 30px;
    }

    /* Two Columns */
    .two-columns {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .column-left {
        flex: 1;
        min-width: 280px;
    }

    .column-right {
        flex: 0.7;
        min-width: 280px;
    }

    /* ================= ACCORDION STYLE - DIPERKECIL ================= */
    .accordion-section {
        margin-bottom: 20px;
    }

    .accordion-btn {
        width: 100%;
        background: white;
        border: none;
        padding: 16px 22px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(26,188,156,0.1);
    }

    .accordion-btn:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
        border-color: var(--primary);
    }

    .accordion-btn.active {
        border-radius: 16px 16px 0 0;
    }

    .accordion-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .accordion-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(145deg, var(--primary), var(--primary-dark));
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .accordion-btn h3 {
        font-size: 1rem;
        font-weight: 800;
        color: var(--secondary);
        margin: 0;
    }

    .accordion-arrow {
        font-size: 1rem;
        color: var(--primary);
        transition: transform 0.2s;
    }

    .accordion-btn.active .accordion-arrow {
        transform: rotate(180deg);
    }

    .accordion-content {
        background: white;
        border-radius: 0 0 16px 16px;
        padding: 0 22px;
        max-height: 0;
        overflow-y: hidden;
        transition: max-height 0.4s ease, padding 0.2s ease;
        border: 1px solid rgba(26,188,156,0.1);
        border-top: none;
    }

    .accordion-content.show {
        padding: 20px 22px 24px;
        max-height: 400px;
        overflow-y: auto;
    }

    .accordion-content::-webkit-scrollbar {
        width: 4px;
    }
    .accordion-content::-webkit-scrollbar-track {
        background: #e2e8f0;
        border-radius: 10px;
    }
    .accordion-content::-webkit-scrollbar-thumb {
        background: var(--primary);
        border-radius: 10px;
    }

    .accordion-text {
        color: var(--text-muted);
        font-size: 0.85rem;
        line-height: 1.65;
        text-align: justify;
    }

    .accordion-text p {
        margin-bottom: 12px;
    }

    .accordion-text ul {
        margin: 10px 0 0 0;
        padding-left: 18px;
        list-style: none;
    }

    .accordion-text li {
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.85rem;
    }

    .accordion-text li i {
        color: var(--primary);
        font-size: 0.9rem;
        width: 20px;
    }

    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, var(--primary-light), white);
        border-radius: 12px;
        padding: 12px 15px;
        margin-top: 15px;
        border-left: 3px solid var(--primary);
    }

    .info-box p {
        margin: 0;
        font-size: 0.8rem;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* ================= PROFIL PEMILIK - DIPERKECIL ================= */
    .owner-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        margin-bottom: 25px;
        border: 1px solid #eef2f6;
    }

    .owner-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

    .owner-header {
        background: linear-gradient(135deg, var(--secondary), var(--secondary-dark));
        padding: 25px 20px;
        text-align: center;
    }

    .owner-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(255,255,255,0.3);
        margin-bottom: 12px;
    }

    .owner-avatar-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 12px;
    }

    .owner-name {
        font-size: 1.1rem;
        font-weight: 800;
        color: white;
        margin-bottom: 5px;
    }

    .owner-role {
        font-size: 0.65rem;
        color: rgba(255,255,255,0.85);
        background: rgba(255,255,255,0.15);
        display: inline-block;
        padding: 4px 14px;
        border-radius: 30px;
    }

    .owner-body {
        padding: 20px;
    }

    .info-item {
        margin-bottom: 18px;
    }

    .info-label {
        font-size: 0.65rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .info-value {
        font-size: 0.8rem;
        color: var(--text-muted);
        line-height: 1.55;
    }

    /* ================= CONTACT CARD - DIPERKECIL ================= */
    .contact-card {
        background: white;
        border-radius: 20px;
        padding: 0;
        box-shadow: var(--shadow-md);
        border: 1px solid #eef2f6;
        overflow: hidden;
    }

    .contact-header {
        padding: 15px 20px;
        background: linear-gradient(135deg, #f8fafc, white);
        border-bottom: 1px solid #eef2f6;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .contact-header i {
        width: 38px;
        height: 38px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }

    .contact-header h4 {
        font-size: 1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
    }

    .contact-list {
        padding: 15px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid #eef2f6;
    }

    .contact-item:last-child {
        border-bottom: none;
    }

    .contact-item-icon {
        width: 38px;
        height: 38px;
        background: var(--primary-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .contact-item-icon i {
        font-size: 1rem;
        color: var(--primary);
    }

    .contact-item-detail h6 {
        font-size: 0.6rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 3px;
    }

    .contact-item-detail p {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
        line-height: 1.4;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 992px) {
        .two-columns {
            flex-direction: column;
        }
        .hero-title {
            font-size: 1.8rem;
        }
        .main-content {
            padding: 30px 20px;
        }
        .hero-profil {
            height: 300px;
        }
    }

    @media (max-width: 768px) {
        .hero-profil {
            height: 280px;
        }
        .hero-title {
            font-size: 1.4rem;
        }
        .hero-tagline {
            font-size: 0.7rem;
            padding: 6px 18px;
        }
        .accordion-btn {
            padding: 12px 16px;
        }
        .accordion-icon {
            width: 38px;
            height: 38px;
            font-size: 1rem;
        }
        .accordion-btn h3 {
            font-size: 0.9rem;
        }
        .accordion-content.show {
            padding: 15px;
            max-height: 300px;
        }
        .accordion-text {
            font-size: 0.8rem;
        }
        .owner-avatar {
            width: 80px;
            height: 80px;
        }
        .owner-name {
            font-size: 0.95rem;
        }
    }
</style>
@endsection

@section('content')

<div class="container-full">

    <!-- HERO SECTION -->
    <div class="hero-profil">
        @if(isset($toko->foto_toko) && $toko->foto_toko != '')
            <img src="{{ asset('images/profil/' . $toko->foto_toko) }}" class="hero-background" alt="Foto Toko">
        @else
            <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?q=80&w=1600&auto=format&fit=crop" class="hero-background" alt="Apotek">
        @endif
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ $toko->nama_toko ?? 'Wijaya Farma' }}</h1>
            <div class="hero-tagline">
                <i class="fas fa-leaf me-1"></i> Store Freshness, High-Quality Freshness
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="two-columns">
            
            <!-- KOLOM KIRI -->
            <div class="column-left">
                
                <!-- KISAH BERDIRINYA -->
                <div class="accordion-section">
                    <button class="accordion-btn active" id="btnSejarah">
                        <div class="accordion-left">
                            <div class="accordion-icon"><i class="fas fa-landmark"></i></div>
                            <h3>Kisah Berdirinya</h3>
                        </div>
                        <div class="accordion-arrow">▼</div>
                    </button>
                    <div class="accordion-content show" id="contentSejarah">
                        <div class="accordion-text">
                            @if(isset($toko->sejarah) && !empty(trim($toko->sejarah)))
                                {!! nl2br(e($toko->sejarah)) !!}
                            @else
                                <p>Wijaya Farma berdiri sejak tahun 2018 dengan tekad memberikan pelayanan kesehatan terbaik bagi masyarakat sekitar. Berawal dari apotek kecil, kini kami terus berkembang menjadi mitra kesehatan keluarga terpercaya.</p>
                                <p><strong>Makna Nama Wijaya Farma</strong></p>
                                <p>Nama "Wijaya Farma" memiliki makna yang mendalam. Nama "Wijaya" melambangkan keberhasilan, kemenangan, dan kejayaan.</p>
                                <div class="info-box">
                                    <p><i class="fas fa-quote-left"></i> "Kesehatan adalah investasi terbaik untuk masa depan yang lebih cerah."</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- VISI KAMI -->
                <div class="accordion-section">
                    <button class="accordion-btn" id="btnVisi">
                        <div class="accordion-left">
                            <div class="accordion-icon"><i class="fas fa-eye"></i></div>
                            <h3>Visi Kami</h3>
                        </div>
                        <div class="accordion-arrow">▼</div>
                    </button>
                    <div class="accordion-content" id="contentVisi">
                        <div class="accordion-text">
                            @if(isset($toko->visi) && !empty(trim($toko->visi)))
                                {!! nl2br(e($toko->visi)) !!}
                            @else
                                <p>Menjadi apotek yang terpercaya dan menjadi pilihan utama masyarakat dalam memenuhi kebutuhan kesehatan keluarga.</p>
                                <div class="info-box">
                                    <p><i class="fas fa-bullhorn"></i> Kami hadir untuk menjadi mitra kesehatan keluarga Anda.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- MISI & KOMITMEN -->
                <div class="accordion-section">
                    <button class="accordion-btn" id="btnMisi">
                        <div class="accordion-left">
                            <div class="accordion-icon"><i class="fas fa-bullseye"></i></div>
                            <h3>Misi & Komitmen</h3>
                        </div>
                        <div class="accordion-arrow">▼</div>
                    </button>
                    <div class="accordion-content" id="contentMisi">
                        <div class="accordion-text">
                            @if(isset($toko->misi) && !empty(trim($toko->misi)))
                                {!! nl2br(e($toko->misi)) !!}
                            @else
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> Menyediakan obat-obatan berkualitas dengan harga terjangkau</li>
                                    <li><i class="fas fa-check-circle"></i> Memberikan pelayanan konsultasi farmasi yang profesional dan ramah</li>
                                    <li><i class="fas fa-check-circle"></i> Menjaga ketersediaan stok obat yang lengkap</li>
                                    <li><i class="fas fa-check-circle"></i> Mengedukasi masyarakat tentang pentingnya kesehatan</li>
                                </ul>
                                <div class="info-box">
                                    <p><i class="fas fa-hand-holding-heart"></i> Komitmen kami: "Melayani dengan sepenuh hati, untuk kesehatan yang lebih baik"</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN -->
            <div class="column-right">
                
                <!-- PROFIL PEMILIK -->
                <div class="owner-card">
                    <div class="owner-header">
                        @if(isset($toko->foto_pemilik) && $toko->foto_pemilik != '')
                            <img src="{{ asset('images/profil/' . $toko->foto_pemilik) }}" class="owner-avatar" alt="Foto Pemilik">
                        @else
                            <div class="owner-avatar-placeholder">
                                👩‍⚕️
                            </div>
                        @endif
                        <h3 class="owner-name">{{ $toko->nama_pemilik ?? 'Apoteker' }}</h3>
                        <span class="owner-role"><i class="fas fa-certificate me-1"></i> Apoteker Penanggung Jawab</span>
                    </div>
                    
                    <div class="owner-body">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-graduation-cap"></i> PENDIDIKAN
                            </div>
                            <div class="info-value">
                                @if(isset($toko->pendidikan_pemilik) && !empty(trim($toko->pendidikan_pemilik)))
                                    {!! nl2br(e($toko->pendidikan_pemilik)) !!}
                                @else
                                    S.Farm., Apt - Universitas Indonesia
                                @endif
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-briefcase"></i> PENGALAMAN
                            </div>
                            <div class="info-value">
                                @if(isset($toko->pengalaman_pemilik) && !empty(trim($toko->pengalaman_pemilik)))
                                    {!! nl2br(e($toko->pengalaman_pemilik)) !!}
                                @else
                                    10+ tahun praktik apoteker<br>
                                    Anggota Ikatan Apoteker Indonesia
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- HUBUNGI KAMI -->
                <div class="contact-card">
                    <div class="contact-header">
                        <i class="fas fa-phone-alt"></i>
                        <h4>Hubungi Kami</h4>
                    </div>
                    <div class="contact-list">
                        <div class="contact-item">
                            <div class="contact-item-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="contact-item-detail">
                                <h6>Alamat</h6>
                                <p>{{ $toko->alamat ?? 'Jl. Kesehatan No. 123, Kota Surabaya' }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-icon"><i class="fas fa-phone"></i></div>
                            <div class="contact-item-detail">
                                <h6>Telepon</h6>
                                <p>{{ $toko->telepon ?? '(031) 1234-5678' }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-icon"><i class="fab fa-whatsapp"></i></div>
                            <div class="contact-item-detail">
                                <h6>WhatsApp</h6>
                                <p>{{ $toko->whatsapp ?? '+62 812-3456-7890' }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-icon"><i class="fas fa-envelope"></i></div>
                            <div class="contact-item-detail">
                                <h6>Email</h6>
                                <p>{{ $toko->email ?? 'info@wijayafarma.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordions = [
            { btn: 'btnSejarah', content: 'contentSejarah' },
            { btn: 'btnVisi', content: 'contentVisi' },
            { btn: 'btnMisi', content: 'contentMisi' }
        ];

        accordions.forEach(item => {
            const button = document.getElementById(item.btn);
            const content = document.getElementById(item.content);

            if (button && content) {
                button.addEventListener('click', function() {
                    if (this.classList.contains('active')) {
                        this.classList.remove('active');
                        content.classList.remove('show');
                    } else {
                        accordions.forEach(other => {
                            const otherBtn = document.getElementById(other.btn);
                            const otherContent = document.getElementById(other.content);
                            if (otherBtn && otherContent) {
                                otherBtn.classList.remove('active');
                                otherContent.classList.remove('show');
                            }
                        });
                        this.classList.add('active');
                        content.classList.add('show');
                    }
                });
            }
        });
    });
</script>

@endsection
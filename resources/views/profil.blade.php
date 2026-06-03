@extends('layouts.main')
@section('title', 'Profil Kami - Wijaya Farma')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d5f5e3;
        --secondary: #2c3e50;
        --secondary-dark: #1a2634;
        --accent: #e67e22;
        --accent-light: #fef3e8;
        --text-dark: #1a2634;
        --text-muted: #5a6e7a;
        --bg-soft: #f0f9f7;
        --white: #ffffff;
        --shadow-sm: 0 5px 15px rgba(0,0,0,0.05);
        --shadow-md: 0 10px 25px rgba(0,0,0,0.08);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.1);
    }

    body {
        background: linear-gradient(145deg, #f0fdfa 0%, #e6f4f0 100%);
        font-family: 'Inter', 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    /* Background Pattern */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path fill="none" stroke="%231ABC9C" stroke-width="1" d="M10 10 L90 10 M10 20 L90 20 M10 30 L90 30 M10 40 L90 40 M10 50 L90 50 M10 60 L90 60 M10 70 L90 70 M10 80 L90 80 M10 90 L90 90 M20 10 L20 90 M30 10 L30 90 M40 10 L40 90 M50 10 L50 90 M60 10 L60 90 M70 10 L70 90 M80 10 L80 90"/></svg>');
        background-repeat: repeat;
        background-size: 50px;
        z-index: -1;
        pointer-events: none;
    }

    .container-wide {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 25px;
    }

    /* ================= HERO SECTION ================= */
    .hero-profil {
        position: relative;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
        min-height: 380px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #1a2634 0%, #2c3e50 100%);
        overflow: hidden;
    }

    .hero-profil::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('{{ isset($toko->foto_toko) && $toko->foto_toko != "" ? asset("images/profil/".$toko->foto_toko) : "https://images.unsplash.com/photo-1585435557343-3b092031a831?q=80&w=2000&auto=format&fit=crop" }}') center/cover no-repeat;
        opacity: 0.35;
        filter: blur(4px);
        transform: scale(1.05);
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(26,188,156,0.92) 0%, rgba(44,62,80,0.96) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 0 20px;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        color: white;
        margin-bottom: 12px;
        letter-spacing: -1px;
    }

    .hero-tagline {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.85);
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(10px);
        padding: 8px 24px;
        border-radius: 60px;
        display: inline-block;
        border: 1px solid rgba(255,255,255,0.2);
    }

    /* ================= MAIN LAYOUT - TANPA RUANG KOSONG ================= */
    .profile-main {
        padding: 40px 0 60px;
    }

    .row-custom {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .col-left {
        flex: 0 0 66.666%;
        max-width: 66.666%;
        padding: 0 15px;
    }

    .col-right {
        flex: 0 0 33.333%;
        max-width: 33.333%;
        padding: 0 15px;
    }

    /* ================= CARD UNIFORM ================= */
    .card-uniform {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        margin-bottom: 25px;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(26,188,156,0.1);
        transition: all 0.3s ease;
    }

    .card-uniform:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        border-color: rgba(26,188,156,0.3);
    }

    .card-header {
        padding: 18px 25px;
        background: linear-gradient(135deg, #f8fafc, #ffffff);
        border-bottom: 2px solid var(--primary);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header-icon {
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

    .card-header h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0;
    }

    .card-body {
        padding: 0;
    }

    /* ================= FOTO TOKO ================= */
    .store-image-wrapper {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .store-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }

    .card-uniform:hover .store-image {
        transform: scale(1.03);
    }

    .store-image-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        color: #94a3b8;
    }

    .store-image-placeholder i {
        font-size: 3rem;
        opacity: 0.5;
    }

    .store-image-placeholder p {
        font-size: 0.8rem;
        margin: 0;
    }

    /* ================= ACCORDION ================= */
    .accordion-item-custom {
        border-bottom: 1px solid #eef2f6;
    }

    .accordion-item-custom:last-child {
        border-bottom: none;
    }

    .accordion-btn-custom {
        width: 100%;
        padding: 18px 25px;
        background: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        transition: all 0.2s;
    }

    .accordion-btn-custom:hover {
        background: #fafcfc;
    }

    .accordion-btn-custom.active {
        background: #f8fafc;
    }

    .btn-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .btn-icon {
        width: 38px;
        height: 38px;
        background: var(--bg-soft);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 1rem;
    }

    .btn-left span {
        font-weight: 700;
        font-size: 1rem;
        color: var(--text-dark);
    }

    .btn-arrow {
        color: var(--primary);
        font-size: 0.9rem;
        transition: transform 0.2s;
    }

    .accordion-btn-custom.active .btn-arrow {
        transform: rotate(180deg);
    }

    .accordion-content-custom {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        padding: 0 25px;
    }

    .accordion-content-custom.show {
        max-height: 300px;
        padding: 0 25px 20px 25px;
    }

    .accordion-text {
        font-size: 0.9rem;
        line-height: 1.7;
        color: var(--text-muted);
        text-align: justify;
    }

    .accordion-text ul {
        margin: 10px 0 0 0;
        padding-left: 20px;
    }

    .accordion-text li {
        margin-bottom: 8px;
    }

    /* ================= PROFIL PEMILIK ================= */
    .owner-profile {
        text-align: center;
        padding: 30px 20px 20px;
        background: linear-gradient(135deg, var(--secondary), var(--secondary-dark));
        position: relative;
    }

    .owner-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(255,255,255,0.3);
        margin-bottom: 15px;
        box-shadow: var(--shadow-md);
    }

    .owner-avatar-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        margin: 0 auto 15px;
    }

    .owner-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 5px;
    }

    .owner-role {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.8);
        background: rgba(255,255,255,0.15);
        display: inline-block;
        padding: 4px 15px;
        border-radius: 30px;
    }

    .owner-detail {
        padding: 20px;
    }

    .detail-item {
        margin-bottom: 18px;
    }

    .detail-label {
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .detail-value {
        font-size: 0.85rem;
        color: var(--text-muted);
        line-height: 1.6;
    }

    /* ================= INFO KONTAK ================= */
    .contact-grid-custom {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
        padding: 5px;
    }

    .contact-item-custom {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 12px 15px;
        background: var(--bg-soft);
        border-radius: 16px;
        transition: all 0.2s;
    }

    .contact-item-custom:hover {
        background: white;
        transform: translateX(5px);
    }

    .contact-icon-custom {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }

    .contact-detail-custom h6 {
        font-size: 0.65rem;
        font-weight: 700;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 3px;
    }

    .contact-detail-custom p {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0;
        line-height: 1.4;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 992px) {
        .col-left, .col-right {
            flex: 0 0 100%;
            max-width: 100%;
        }
        
        .hero-title {
            font-size: 2.2rem;
        }
        
        .container-wide {
            padding: 0 20px;
        }
        
        .profile-main {
            padding: 30px 0 50px;
        }
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.8rem;
        }
        
        .hero-tagline {
            font-size: 0.8rem;
        }
        
        .store-image-wrapper {
            height: 200px;
        }
        
        .card-header {
            padding: 14px 20px;
        }
        
        .accordion-btn-custom {
            padding: 14px 20px;
        }
    }
</style>
@endsection

@section('content')

<!-- HERO SECTION -->
<div class="hero-profil">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">{{ $toko->nama_toko ?? 'Wijaya Farma' }}</h1>
        <div class="hero-tagline">
            <i class="fas fa-leaf me-1"></i> Store Freshness, High-Quality Freshness
        </div>
    </div>
</div>

<div class="container-wide profile-main">
    <div class="row-custom">
        
        <!-- KOLOM KIRI -->
        <div class="col-left">
            
            <!-- CARD FOTO TOKO -->
            <div class="card-uniform">
                <div class="store-image-wrapper">
                    @if(isset($toko->foto_toko) && $toko->foto_toko != '')
                        <img src="{{ asset('images/profil/' . $toko->foto_toko) }}" 
                             class="store-image" 
                             alt="Foto Toko">
                    @else
                        <div class="store-image-placeholder">
                            <i class="fas fa-store"></i>
                            <p>Foto Toko</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- CARD SEJARAH (ACCORDION) -->
            <div class="card-uniform">
                <div class="card-header">
                    <div class="card-header-icon"><i class="fas fa-landmark"></i></div>
                    <h3>Profil Perusahaan</h3>
                </div>
                <div class="card-body">
                    <div class="accordion-item-custom">
                        <button class="accordion-btn-custom" id="btnSejarah">
                            <div class="btn-left">
                                <div class="btn-icon"><i class="fas fa-history"></i></div>
                                <span>Kisah Berdirinya</span>
                            </div>
                            <div class="btn-arrow">▼</div>
                        </button>
                        <div class="accordion-content-custom" id="contentSejarah">
                            <div class="accordion-text">
                                @if(isset($toko->sejarah) && $toko->sejarah != '')
                                    {!! nl2br(e($toko->sejarah)) !!}
                                @else
                                    <p>Wijaya Farma berdiri sebagai apotek modern yang mengutamakan kualitas dan pelayanan terbaik. Kami hadir untuk memenuhi kebutuhan kesehatan masyarakat dengan produk-produk berkualitas dan harga terjangkau.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item-custom">
                        <button class="accordion-btn-custom" id="btnVisi">
                            <div class="btn-left">
                                <div class="btn-icon"><i class="fas fa-eye"></i></div>
                                <span>Visi Kami</span>
                            </div>
                            <div class="btn-arrow">▼</div>
                        </button>
                        <div class="accordion-content-custom" id="contentVisi">
                            <div class="accordion-text">
                                @if(isset($toko->visi) && $toko->visi != '')
                                    {!! nl2br(e($toko->visi)) !!}
                                @else
                                    <p>Menjadi apotek terpercaya yang memberikan pelayanan kesehatan berkualitas dan berkelanjutan bagi masyarakat Indonesia.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item-custom">
                        <button class="accordion-btn-custom" id="btnMisi">
                            <div class="btn-left">
                                <div class="btn-icon"><i class="fas fa-bullseye"></i></div>
                                <span>Misi Kami</span>
                            </div>
                            <div class="btn-arrow">▼</div>
                        </button>
                        <div class="accordion-content-custom" id="contentMisi">
                            <div class="accordion-text">
                                @if(isset($toko->misi) && $toko->misi != '')
                                    {!! nl2br(e($toko->misi)) !!}
                                @else
                                    <ul>
                                        <li>Menyediakan obat berkualitas dengan harga terjangkau</li>
                                        <li>Memberikan pelayanan konsultasi farmasi profesional</li>
                                        <li>Menjadi mitra kesehatan terpercaya bagi keluarga</li>
                                        <li>Terus berinovasi dalam layanan kesehatan</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- KOLOM KANAN -->
        <div class="col-right">
            
            <!-- CARD PEMILIK TOKO -->
            <div class="card-uniform">
                <div class="owner-profile">
                    @if(isset($toko->foto_pemilik) && $toko->foto_pemilik != '')
                        <img src="{{ asset('images/profil/' . $toko->foto_pemilik) }}" 
                             class="owner-avatar" 
                             alt="Foto Pemilik">
                    @else
                        <div class="owner-avatar-placeholder">
                            👨‍⚕️
                        </div>
                    @endif
                    <h4 class="owner-name">{{ $toko->nama_pemilik ?? 'Apoteker' }}</h4>
                    <span class="owner-role">Apoteker Penanggung Jawab</span>
                </div>
                
                <div class="owner-detail">
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fas fa-graduation-cap"></i> PENDIDIKAN
                        </div>
                        <div class="detail-value">
                            @if(isset($toko->pendidikan_pemilik) && $toko->pendidikan_pemilik != '')
                                {!! nl2br(e($toko->pendidikan_pemilik)) !!}
                            @else
                                S.Farm., Apt - Universitas Indonesia<br>
                                Profesi Apoteker
                            @endif
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fas fa-briefcase"></i> PENGALAMAN
                        </div>
                        <div class="detail-value">
                            @if(isset($toko->pengalaman_pemilik) && $toko->pengalaman_pemilik != '')
                                {!! nl2br(e($toko->pengalaman_pemilik)) !!}
                            @else
                                10+ tahun praktik apoteker<br>
                                Anggota Ikatan Apoteker Indonesia<br>
                                Trainer konseling farmasi
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- CARD KONTAK -->
            <div class="card-uniform">
                <div class="card-header">
                    <div class="card-header-icon"><i class="fas fa-phone-alt"></i></div>
                    <h3>Hubungi Kami</h3>
                </div>
                <div class="card-body">
                    <div class="contact-grid-custom">
                        <div class="contact-item-custom">
                            <div class="contact-icon-custom"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="contact-detail-custom">
                                <h6>Alamat</h6>
                                <p>{{ $toko->alamat ?? 'Jl. Kesehatan No. 123, Kota Surabaya' }}</p>
                            </div>
                        </div>
                        <div class="contact-item-custom">
                            <div class="contact-icon-custom"><i class="fas fa-phone"></i></div>
                            <div class="contact-detail-custom">
                                <h6>Telepon</h6>
                                <p>{{ $toko->telepon ?? '(031) 1234-5678' }}</p>
                            </div>
                        </div>
                        <div class="contact-item-custom">
                            <div class="contact-icon-custom"><i class="fab fa-whatsapp"></i></div>
                            <div class="contact-detail-custom">
                                <h6>WhatsApp</h6>
                                <p>{{ $toko->whatsapp ?? '+62 812-3456-7890' }}</p>
                            </div>
                        </div>
                        <div class="contact-item-custom">
                            <div class="contact-icon-custom"><i class="fas fa-envelope"></i></div>
                            <div class="contact-detail-custom">
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
    // Accordion functionality
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
                    accordions.forEach(other => {
                        if (other.btn !== item.btn) {
                            const otherBtn = document.getElementById(other.btn);
                            const otherContent = document.getElementById(other.content);
                            if (otherBtn && otherContent) {
                                otherBtn.classList.remove('active');
                                otherContent.classList.remove('show');
                            }
                        }
                    });
                    
                    this.classList.toggle('active');
                    content.classList.toggle('show');
                });
            }
        });
    });
</script>

@endsection
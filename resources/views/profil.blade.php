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
        --accent-light: #fef3c7;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 4px 12px rgba(0,0,0,0.05);
        --shadow-md: 0 10px 25px rgba(0,0,0,0.08);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.12);
        --shadow-xl: 0 30px 60px rgba(0,0,0,0.15);
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
        background-size: 50px;
        pointer-events: none;
        z-index: 0;
    }

    .floating-orb {
        position: fixed;
        border-radius: 50%;
        filter: blur(60px);
        z-index: 0;
        pointer-events: none;
        animation: floatOrb 20s ease-in-out infinite;
    }

    .orb-1 {
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(26,188,156,0.15) 0%, transparent 70%);
        top: 10%;
        left: -5%;
    }

    .orb-2 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(230,126,34,0.1) 0%, transparent 70%);
        bottom: 0%;
        right: -10%;
        animation-delay: 5s;
    }

    @keyframes floatOrb {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(30px, 20px) scale(1.1); }
    }

    .container-full {
        width: 100%;
        max-width: 100%;
        padding: 0;
        margin: 0;
    }

    /* Hero Section */
    .hero-profil {
        position: relative;
        width: 100%;
        height: 450px;
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
        font-size: 3rem;
        font-weight: 800;
        color: white;
        margin-bottom: 15px;
        letter-spacing: -1px;
        text-shadow: 0 2px 15px rgba(0,0,0,0.3);
    }

    .hero-tagline {
        font-size: 1rem;
        color: rgba(255,255,255,0.9);
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        padding: 10px 28px;
        border-radius: 60px;
        display: inline-block;
        border: 1px solid rgba(255,255,255,0.2);
    }

    /* Main Content */
    .main-content {
        max-width: 1400px;
        margin: 0 auto;
        padding: 50px 40px;
    }

    /* Two Columns */
    .two-columns {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }

    .column-left {
        flex: 1;
        min-width: 300px;
    }

    .column-right {
        flex: 0.8;
        min-width: 300px;
    }

    /* Accordion Style - DIPERBAIKI UNTUK SCROLL */
    .accordion-section {
        margin-bottom: 25px;
    }

    .accordion-btn {
        width: 100%;
        background: white;
        border: none;
        padding: 22px 28px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(26,188,156,0.15);
    }

    .accordion-btn:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-3px);
        border-color: var(--primary);
    }

    .accordion-btn.active {
        border-radius: 20px 20px 0 0;
        border-bottom: none;
    }

    .accordion-left {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .accordion-icon {
        width: 55px;
        height: 55px;
        background: linear-gradient(145deg, var(--primary), var(--primary-dark));
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.4rem;
        transition: 0.3s;
    }

    .accordion-btn h3 {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--secondary);
        margin: 0;
    }

    .accordion-arrow {
        font-size: 1.2rem;
        color: var(--primary);
        transition: transform 0.3s ease;
    }

    .accordion-btn.active .accordion-arrow {
        transform: rotate(180deg);
    }

    /* CONTENT DENGAN SCROLL - DIPERBAIKI */
    .accordion-content {
        background: white;
        border-radius: 0 0 20px 20px;
        padding: 0 28px;
        max-height: 0;
        overflow-y: hidden;
        transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1), padding 0.3s ease;
        border: 1px solid rgba(26,188,156,0.15);
        border-top: none;
    }

    .accordion-content.show {
        padding: 28px 28px 32px;
        max-height: 500px; /* Tinggi maksimal - bisa discroll */
        overflow-y: auto; /* Aktifkan scroll vertikal */
    }

    /* Scrollbar Styling */
    .accordion-content::-webkit-scrollbar {
        width: 6px;
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
        font-size: 1rem;
        line-height: 1.75;
        text-align: justify;
    }

    .accordion-text p {
        margin-bottom: 15px;
    }

    .accordion-text ul {
        margin: 15px 0 0 20px;
        padding-left: 0;
        list-style: none;
    }

    .accordion-text li {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.95rem;
    }

    .accordion-text li i {
        color: var(--primary);
        font-size: 1rem;
        width: 22px;
    }

    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, var(--primary-light), white);
        border-radius: 16px;
        padding: 20px;
        margin-top: 20px;
        border-left: 4px solid var(--primary);
    }

    .info-box p {
        margin: 0;
        font-size: 0.9rem;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-box i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    /* Owner Card */
    .owner-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        margin-bottom: 35px;
        border: 1px solid #eef2f6;
        transition: all 0.3s;
    }

    .owner-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }

    .owner-header {
        background: linear-gradient(135deg, var(--secondary), var(--secondary-dark));
        padding: 35px 25px;
        text-align: center;
        position: relative;
    }

    .owner-avatar {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(255,255,255,0.3);
        margin-bottom: 15px;
        box-shadow: var(--shadow-md);
    }

    .owner-avatar-placeholder {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        margin: 0 auto 15px;
    }

    .owner-name {
        font-size: 1.3rem;
        font-weight: 800;
        color: white;
        margin-bottom: 8px;
    }

    .owner-role {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.85);
        background: rgba(255,255,255,0.15);
        display: inline-block;
        padding: 5px 18px;
        border-radius: 30px;
    }

    .owner-body {
        padding: 25px;
    }

    .info-item {
        margin-bottom: 22px;
    }

    .info-label {
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-value {
        font-size: 0.9rem;
        color: var(--text-muted);
        line-height: 1.65;
    }

    /* Contact Card */
    .contact-card {
        background: white;
        border-radius: 24px;
        padding: 0;
        box-shadow: var(--shadow-lg);
        border: 1px solid #eef2f6;
        overflow: hidden;
    }

    .contact-header {
        padding: 20px 25px;
        background: linear-gradient(135deg, #f8fafc, white);
        border-bottom: 1px solid #eef2f6;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .contact-header i {
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

    .contact-header h4 {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
    }

    .contact-list {
        padding: 20px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 14px 0;
        border-bottom: 1px solid #eef2f6;
    }

    .contact-item:last-child {
        border-bottom: none;
    }

    .contact-item-icon {
        width: 45px;
        height: 45px;
        background: var(--primary-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .contact-item-icon i {
        font-size: 1.2rem;
        color: var(--primary);
    }

    .contact-item-detail h6 {
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 4px;
    }

    .contact-item-detail p {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
        line-height: 1.4;
    }

    @media (max-width: 992px) {
        .two-columns {
            flex-direction: column;
        }
        .hero-title {
            font-size: 2.2rem;
        }
        .main-content {
            padding: 30px 20px;
        }
        .hero-profil {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .hero-profil {
            height: 350px;
        }
        .hero-title {
            font-size: 1.6rem;
        }
        .hero-tagline {
            font-size: 0.8rem;
        }
        .accordion-btn {
            padding: 16px 20px;
        }
        .accordion-icon {
            width: 45px;
            height: 45px;
            font-size: 1.2rem;
        }
        .accordion-btn h3 {
            font-size: 1.1rem;
        }
        .accordion-content.show {
            padding: 20px;
            max-height: 350px;
        }
    }
</style>
@endsection

@section('content')

<div class="container-full">
    
    <div class="floating-orb orb-1"></div>
    <div class="floating-orb orb-2"></div>

    <!-- HERO SECTION -->
    <div class="hero-profil">
        @if(isset($toko->foto_toko) && $toko->foto_toko != '')
            <img src="{{ asset('images/profil/' . $toko->foto_toko) }}" class="hero-background" alt="Foto Toko">
        @else
            <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?q=80&w=2000&auto=format&fit=crop" class="hero-background" alt="Apotek">
        @endif
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ $toko->nama_toko ?? 'Wijaya Farma' }}</h1>
            <div class="hero-tagline">
                <i class="fas fa-leaf me-2"></i> Store Freshness, High-Quality Freshness
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="two-columns">
            
            <!-- KOLOM KIRI -->
            <div class="column-left">
                
                <!-- KISAH BERDIRINYA - TERBUKA DEFAULT -->
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
                                <p>Meskipun berada dalam kondisi kehamilan, narasumber tetap berupaya menyelesaikan proses administrasi yang diperlukan. Setelah melahirkan, proses perizinan dilanjutkan hingga akhirnya usaha toko obat Wijaya Farma dapat beroperasi secara legal dan sesuai dengan ketentuan yang berlaku.</p>
                                <p><strong>Makna Nama Wijaya Farma</strong></p>
                                <p>Nama "Wijaya Farma" memiliki makna yang mendalam dan bersifat personal bagi narasumber. Nama "Wijaya" diambil dari nama anak pertama, yaitu Gavriel Wijaya. Selain sebagai bentuk penghormatan kepada keluarga, nama tersebut juga mengandung doa dan harapan.</p>
                                <p>Kata "Wijaya" melambangkan keberhasilan, kemenangan, dan kejayaan. Melalui nama ini, narasumber berharap agar usaha yang dijalankan dapat terus berkembang, memberikan manfaat bagi masyarakat luas, serta menjadi apotek yang terpercaya dalam melayani kebutuhan kesehatan keluarga.</p>
                                <p>Perjalanan panjang kami diwarnai dengan komitmen untuk selalu memberikan yang terbaik bagi setiap pelanggan yang mempercayakan kesehatannya kepada kami. Dengan dukungan tenaga apoteker profesional dan produk-produk berkualitas, Wijaya Farma hadir sebagai solusi kesehatan untuk masyarakat.</p>
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
                                <p><strong>Menjadi apotek yang terpercaya dan menjadi pilihan utama masyarakat</strong> dalam memenuhi kebutuhan kesehatan keluarga dengan pelayanan yang cepat, tepat, dan ramah.</p>
                                <p>Kami bertekad untuk terus berkembang dan berinovasi dalam memberikan pelayanan kesehatan terbaik, serta menjadi mitra kesehatan yang andal bagi seluruh lapisan masyarakat di wilayah Samosir dan sekitarnya.</p>
                                <p>Visi kami adalah menciptakan ekosistem kesehatan yang terintegrasi, di mana setiap orang memiliki akses mudah terhadap obat-obatan berkualitas dan informasi kesehatan yang akurat.</p>
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
                                    <li><i class="fas fa-check-circle"></i> <strong>Menyediakan obat-obatan berkualitas</strong> dengan harga yang terjangkau bagi masyarakat</li>
                                    <li><i class="fas fa-check-circle"></i> <strong>Memberikan pelayanan konsultasi farmasi</strong> yang profesional, ramah, dan mudah diakses</li>
                                    <li><i class="fas fa-check-circle"></i> <strong>Menjaga ketersediaan stok obat</strong> yang lengkap untuk memenuhi kebutuhan pelanggan</li>
                                    <li><i class="fas fa-check-circle"></i> <strong>Mengedukasi masyarakat</strong> tentang pentingnya kesehatan dan penggunaan obat yang tepat</li>
                                    <li><i class="fas fa-check-circle"></i> <strong>Menjalin kemitraan dengan tenaga kesehatan</strong> untuk memberikan pelayanan terbaik</li>
                                </ul>
                                <div class="info-box">
                                    <p><i class="fas fa-hand-holding-heart"></i> Komitmen kami: <strong>"Melayani dengan sepenuh hati, untuk kesehatan yang lebih baik"</strong></p>
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
                        <h3 class="owner-name">{{ $toko->nama_pemilik ?? 'Bdn. Yesika Pradinata Sitohang S.Keb' }}</h3>
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
                                    2012-2015 D3 Akademi Kebidanan Tarutung (Poltekkes Medan)<br>
                                    2020-2022 S1 Kebidanan & Pendidikan Profesi Bidan - Universitas Sinter Medan
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
                                    2016 St. Bernardah Pakkat<br>
                                    2017 Klinik dr. Umum Pekanbaru<br>
                                    2018 RSUD Porsaa<br>
                                    2020 Puskesmas Sigumpar<br>
                                    2018 - sekarang Pemilik Toko Obat & Praktik Bidan
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
                                <h6>📍 Alamat</h6>
                                <p>{{ $toko->alamat ?? 'Jalan Lintas Porsea-Laguboti, Toko Obat Wijaya Farma, Samping Kantor Camat Kab Toba, SIGUMPAR, KAB.TOBA SAMOSIR, SUMATERA UTARA, ID 22353' }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-icon"><i class="fas fa-phone"></i></div>
                            <div class="contact-item-detail">
                                <h6>📞 Telepon</h6>
                                <p>{{ $toko->telepon ?? '(031) 1234-5678' }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-icon"><i class="fab fa-whatsapp"></i></div>
                            <div class="contact-item-detail">
                                <h6>💬 WhatsApp</h6>
                                <p>{{ $toko->whatsapp ?? '+62 812-3456-7890' }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-icon"><i class="fas fa-envelope"></i></div>
                            <div class="contact-item-detail">
                                <h6>✉️ Email</h6>
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
        // Ambil semua elemen accordion
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
                    // Jika yang diklik sedang aktif, tutup
                    if (this.classList.contains('active')) {
                        this.classList.remove('active');
                        content.classList.remove('show');
                    } else {
                        // Tutup semua accordion lain
                        accordions.forEach(other => {
                            const otherBtn = document.getElementById(other.btn);
                            const otherContent = document.getElementById(other.content);
                            if (otherBtn && otherContent) {
                                otherBtn.classList.remove('active');
                                otherContent.classList.remove('show');
                            }
                        });
                        // Buka yang diklik
                        this.classList.add('active');
                        content.classList.add('show');
                    }
                });
            }
        });
    });
</script>

@endsection
@extends('layouts.main')

@section('title', 'Layanan Kesehatan - Wijaya Farma')

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
        --accent-light: #fef3c7;
        --dark: #1e293b;
        --text-muted: #64748b;
        --bg-soft: #f0fdf4;
        --white: #ffffff;
        --shadow-sm: 0 4px 12px rgba(0,0,0,0.05);
        --shadow-md: 0 10px 25px rgba(0,0,0,0.08);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.12);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
        min-height: 100vh;
    }

    .container-layanan {
        width: 100%;
        max-width: 100%;
        padding: 40px 30px;
        margin: 0 auto;
    }

    /* ================= HEADER SECTION ================= */
    .header-layanan {
        text-align: center;
        margin-bottom: 50px;
    }

    .header-badge {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary-light), var(--primary));
        color: var(--primary-dark);
        padding: 6px 20px;
        border-radius: 60px;
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }

    .header-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 12px;
        letter-spacing: -1px;
    }

    .header-title span {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .header-underline {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        margin: 0 auto 18px;
        border-radius: 10px;
    }

    .header-subtitle {
        color: var(--text-muted);
        font-size: 1rem;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ================= GRID 4 KOLOM ================= */
    .layanan-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
    }

    /* ================= CARD - LEBIH PANJANG ================= */
    .card-layanan {
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: var(--shadow-md);
        display: flex;
        flex-direction: column;
        height: 100%;
        border: 1px solid #eef2f6;
    }

    .card-layanan:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    /* Image Container - LEBIH TINGGI */
    .card-image-wrapper {
        position: relative;
        height: 230px;
        overflow: hidden;
        background: linear-gradient(145deg, #1e3c72, #2a5298);
        flex-shrink: 0;
    }

    .card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card-layanan:hover .card-image {
        transform: scale(1.08);
    }

    /* Overlay Gradient di Gambar */
    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 60px;
        background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
    }

    /* Badge di atas gambar */
    .image-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    /* Badge Populer di pojok kanan */
    .popular-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: white;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .popular-badge i {
        font-size: 0.6rem;
        margin-right: 3px;
    }

    /* Content - PADDING LEBIH BANYAK */
    .card-content {
        padding: 22px 22px 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    /* Title - LEBIH BESAR */
    .service-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 12px;
        line-height: 1.35;
        letter-spacing: -0.3px;
    }

    /* Description - 3 BARIS DENGAN LINE HEIGHT LEBIH BESAR */
    .service-description {
        color: var(--text-muted);
        font-size: 0.88rem;
        line-height: 1.65;
        margin-bottom: 22px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
    }

    /* Divider */
    .card-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--primary-light), transparent);
        margin: 8px 0 16px;
    }

    /* ================= TOMBOL STACK VERTIKAL ================= */
    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 5px;
    }

    /* Tombol Baca Selengkapnya - Btn1 (Warna Biru/Teal) */
    .btn-readmore {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
        padding: 12px 16px;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .btn-readmore:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(26,188,156,0.4);
        background: linear-gradient(135deg, var(--primary-dark), #0e7c64);
        gap: 12px;
    }

    .btn-readmore i {
        transition: transform 0.3s;
    }

    .btn-readmore:hover i {
        transform: translateX(5px);
    }

    /* Tombol Tanya Layanan - Btn2 */
    .btn-wa {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: transparent;
        color: var(--primary);
        font-weight: 700;
        font-size: 0.85rem;
        padding: 12px 16px;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s;
        border: 1.5px solid var(--primary);
        cursor: pointer;
        width: 100%;
    }

    .btn-wa:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(26,188,156,0.2);
        gap: 12px;
    }

    .btn-wa i {
        transition: transform 0.3s;
    }

    .btn-wa:hover i {
        transform: scale(1.1);
    }

    /* ================= MODAL STYLES ================= */
    .modal-layanan {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(8px);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .modal-layanan.active {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 28px;
        max-width: 550px;
        width: 90%;
        max-height: 85vh;
        overflow-y: auto;
        position: relative;
        animation: slideUp 0.4s ease;
        box-shadow: 0 30px 60px rgba(0,0,0,0.3);
    }

    @keyframes slideUp {
        from {
            transform: translateY(60px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-close {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 40px;
        height: 40px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 20;
        box-shadow: 0 2px 12px rgba(0,0,0,0.15);
        border: none;
        transition: all 0.3s;
    }

    .modal-close:hover {
        background: #ef4444;
        transform: rotate(90deg);
    }

    .modal-close:hover i {
        color: white;
    }

    .modal-close i {
        font-size: 1.2rem;
        color: #333;
        transition: color 0.3s;
    }

    .modal-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 28px 28px 0 0;
    }

    .modal-image-placeholder {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 28px 28px 0 0;
    }

    .modal-image-placeholder i {
        font-size: 4rem;
        color: white;
    }

    .modal-body {
        padding: 28px;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .modal-category {
        display: inline-block;
        background: var(--primary-light);
        color: var(--primary-dark);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .modal-description {
        color: var(--text-muted);
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 25px;
        text-align: justify;
    }

    .modal-wa-btn {
        background: linear-gradient(90deg, #25D366, #128c7e);
        color: white;
        border: none;
        padding: 14px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        transition: all 0.3s;
    }

    .modal-wa-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(37,211,102,0.35);
        gap: 14px;
    }

    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px;
        background: white;
        border-radius: 28px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1200px) {
        .layanan-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 900px) {
        .layanan-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .container-layanan {
            padding: 30px 20px;
        }
    }
    
    @media (max-width: 550px) {
        .layanan-grid {
            grid-template-columns: 1fr;
        }
        .header-title {
            font-size: 1.8rem;
        }
        .card-image-wrapper {
            height: 200px;
        }
    }
</style>
@endsection

@section('content')

<div class="container-layanan">
    
    <!-- HEADER -->
    <div class="header-layanan">
        <div class="header-badge">
            <i class="fas fa-heartbeat me-1"></i> Layanan Premium
        </div>
        <h1 class="header-title"><span>WIJAYA</span> FARMA</h1>
        <div class="header-underline"></div>
        <p class="header-subtitle">
            Kami berkomitmen memberikan pelayanan kesehatan yang cepat, tepat, dan terpercaya bagi masyarakat.
        </p>
    </div>

    <!-- GRID LAYANAN - 4 KOLOM -->
    <div class="layanan-grid">
        @forelse($list_layanan as $index => $item)
        <div class="card-layanan">
            <div class="card-image-wrapper">
                @if($item->foto)
                    <img src="{{ asset('images/layanan/' . $item->foto) }}" 
                         class="card-image" 
                         alt="{{ $item->nama_layanan }}"
                         onerror="this.src='https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=500&auto=format&fit=crop'">
                @else
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=500&auto=format&fit=crop" 
                         class="card-image" 
                         alt="Layanan Kesehatan">
                @endif
                <div class="image-overlay"></div>
                <div class="image-badge">
                    <i class="fas fa-star"></i> Layanan Unggulan
                </div>
                @if($loop->iteration <= 3)
                <div class="popular-badge">
                    <i class="fas fa-fire"></i> Populer
                </div>
                @endif
            </div>
            <div class="card-content">
                <h3 class="service-title">{{ $item->nama_layanan }}</h3>
                <p class="service-description">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 110) }}
                </p>
                
                <div class="card-divider"></div>
                
                <div class="action-buttons">
                    <!-- Btn1 - Baca Selengkapnya (berubah dari Kelas Terbaik) -->
                    <a href="javascript:void(0)" class="btn-readmore" onclick="openModal({{ $item->id }})">
                        <i class="fas fa-book-open"></i> Baca Selengkapnya
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    
                    <!-- Btn2 - Tanya Layanan -->
                    @php 
                        $no_asli = $toko->no_hp ?? '';
                        $no_bersih = preg_replace('/[^0-9]/', '', $no_asli);
                        if (strlen($no_bersih) > 0 && substr($no_bersih, 0, 1) === '0') {
                            $no_wa = '62' . substr($no_bersih, 1);
                        } else {
                            $no_wa = $no_bersih;
                        }
                    @endphp
                    
                    @if($no_wa != '')
                        <a href="https://wa.me/{{ $no_wa }}?text=Halo Apotek Wijaya Farma, saya ingin bertanya tentang layanan {{ urlencode($item->nama_layanan) }}." 
                           target="_blank" class="btn-wa">
                            <i class="fab fa-whatsapp"></i> Tanya Layanan
                        </a>
                    @else
                        <a href="javascript:void(0)" class="btn-wa" style="opacity: 0.5; cursor: not-allowed;">
                            <i class="fab fa-whatsapp"></i> Tanya Layanan
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-clinic-medical fa-4x mb-3" style="color: var(--primary); opacity: 0.6;"></i>
            <h4 class="text-dark mb-2">Belum Ada Layanan</h4>
            <p class="text-muted">Layanan kesehatan akan segera hadir untuk Anda.</p>
        </div>
        @endforelse
    </div>

</div>

<!-- MODAL POPUP -->
@foreach($list_layanan as $item)
<div id="modal-{{ $item->id }}" class="modal-layanan">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal({{ $item->id }})">
            <i class="fas fa-times"></i>
        </button>
        
        @if($item->foto)
            <img src="{{ asset('images/layanan/' . $item->foto) }}" 
                 class="modal-image" 
                 alt="{{ $item->nama_layanan }}"
                 onerror="this.src='https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=500&auto=format&fit=crop'">
        @else
            <div class="modal-image-placeholder">
                <i class="fas fa-stethoscope"></i>
            </div>
        @endif
        
        <div class="modal-body">
            <span class="modal-category">
                <i class="fas fa-tag me-1"></i> Layanan Kesehatan
            </span>
            <h2 class="modal-title">{{ $item->nama_layanan }}</h2>
            <div class="modal-description">
                {!! nl2br(e($item->deskripsi)) !!}
            </div>
            
            @php 
                $no_asli = $toko->no_hp ?? '';
                $no_bersih = preg_replace('/[^0-9]/', '', $no_asli);
                if (strlen($no_bersih) > 0 && substr($no_bersih, 0, 1) === '0') {
                    $no_wa = '62' . substr($no_bersih, 1);
                } else {
                    $no_wa = $no_bersih;
                }
            @endphp
            
            @if($no_wa != '')
                <a href="https://wa.me/{{ $no_wa }}?text=Halo Apotek Wijaya Farma, saya ingin bertanya tentang layanan {{ urlencode($item->nama_layanan) }}." 
                   target="_blank" class="modal-wa-btn">
                    <i class="fab fa-whatsapp"></i> Tanya Layanan via WhatsApp
                </a>
            @else
                <button class="modal-wa-btn" style="background: #94a3b8; cursor: not-allowed;" disabled>
                    <i class="fab fa-whatsapp"></i> Kontak Belum Tersedia
                </button>
            @endif
        </div>
    </div>
</div>
@endforeach

<script>
    function openModal(id) {
        const modal = document.getElementById('modal-' + id);
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeModal(id) {
        const modal = document.getElementById('modal-' + id);
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
    
    window.onclick = function(event) {
        if (event.target.classList.contains('modal-layanan')) {
            event.target.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
    
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modals = document.querySelectorAll('.modal-layanan.active');
            modals.forEach(modal => {
                modal.classList.remove('active');
            });
            document.body.style.overflow = '';
        }
    });
</script>

@endsection
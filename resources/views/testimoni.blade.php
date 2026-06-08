@extends('layouts.main')

@section('title', 'Testimoni Pelanggan - Wijaya Farma')

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
        --shadow-sm: 0 4px 12px rgba(0,0,0,0.05);
        --shadow-md: 0 10px 25px rgba(0,0,0,0.08);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.12);
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
        min-height: 100vh;
    }

    .container-testimoni {
        max-width: 1400px;
        margin: 0 auto;
        padding: 50px 30px;
    }

    /* ================= HEADER SECTION ================= */
    .testimoni-header {
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
        max-width: 550px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ================= STATISTIK - REAL TIME ================= */
    .stats-section {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-bottom: 50px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        background: white;
        padding: 25px 40px;
        border-radius: 28px;
        box-shadow: var(--shadow-md);
        border: 1px solid #eef2f6;
        transition: all 0.3s;
        min-width: 180px;
    }

    .stat-item:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    .stat-number {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.85rem;
        color: var(--text-muted);
        font-weight: 500;
        margin-top: 8px;
    }

    .stat-rating {
        font-size: 1rem;
        color: #fbbf24;
        letter-spacing: 2px;
        margin-top: 5px;
    }

    /* ================= FORM TESTIMONI ================= */
    .form-container {
        max-width: 600px;
        margin: 0 auto 60px;
    }

    .form-card {
        background: white;
        border-radius: 32px;
        padding: 35px;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(26,188,156,0.15);
        transition: all 0.3s;
    }

    .form-card:hover {
        transform: translateY(-5px);
    }

    .form-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--primary-light);
    }

    .form-title-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
    }

    .form-title h5 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    .form-control-custom {
        width: 100%;
        padding: 14px 18px;
        border: 1.5px solid #e2e8f0;
        border-radius: 16px;
        font-size: 0.9rem;
        transition: all 0.3s;
        font-family: 'Inter', sans-serif;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(26,188,156,0.1);
    }

    .rating-container {
        text-align: center;
        padding: 10px 0;
    }

    .rating-title {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 10px;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        gap: 8px;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 2rem;
        color: #cbd5e1;
        cursor: pointer;
        transition: all 0.2s;
    }

    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
        color: #fbbf24;
        transform: scale(1.1);
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 14px 30px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        width: 100%;
        transition: all 0.3s;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(26,188,156,0.4);
        gap: 15px;
    }

    /* ================= GRID TESTIMONI - 3 KOLOM TIDAK GEPENG ================= */
    .testimoni-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    /* ================= CARD TESTIMONI - TIDAK GEPENG ================= */
    .testimoni-card {
        background: white;
        border-radius: 28px;
        padding: 28px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: var(--shadow-md);
        border: 1px solid #eef2f6;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        min-height: 280px;
    }

    .testimoni-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
    }

    .testimoni-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    /* Quote Icon */
    .quote-icon {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 4rem;
        color: var(--primary-light);
        opacity: 0.3;
        font-family: serif;
    }

    /* Rating Bintang */
    .card-rating {
        margin-bottom: 18px;
        display: flex;
        gap: 6px;
    }

    .card-rating .star {
        color: #fbbf24;
        font-size: 1rem;
    }

    .card-rating .star-empty {
        color: #e2e8f0;
        font-size: 1rem;
    }

    /* ISI TESTIMONI - AGAR TIDAK GEPENG */
    .comment-text {
        font-size: 0.98rem;
        line-height: 1.65;
        color: var(--dark);
        margin-bottom: 20px;
        font-weight: 500;
        position: relative;
        z-index: 1;
        flex: 1;
        min-height: 80px;
    }

    .comment-text::before {
        content: '"';
        font-size: 2.2rem;
        color: var(--primary-light);
        opacity: 0.4;
        position: absolute;
        top: -12px;
        left: -6px;
        font-family: serif;
    }

    /* Divider */
    .card-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--primary-light), transparent);
        margin: 12px 0 16px;
    }

    /* NAMA PELANGGAN */
    .customer-info {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-top: 5px;
    }

    .customer-avatar {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 1.2rem;
        box-shadow: 0 5px 15px rgba(26,188,156,0.3);
        flex-shrink: 0;
    }

    .customer-detail h6 {
        font-size: 1rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 4px;
    }

    .customer-detail p {
        font-size: 0.7rem;
        color: var(--text-muted);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .verified-badge {
        color: var(--primary);
        font-size: 0.65rem;
    }

    .rating-text {
        background: var(--primary-light);
        padding: 2px 8px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.65rem;
        color: var(--primary-dark);
    }

    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px;
        background: white;
        border-radius: 32px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1000px) {
        .testimoni-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
        .stats-section {
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .container-testimoni {
            padding: 30px 20px;
        }
        .testimoni-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .header-title {
            font-size: 1.8rem;
        }
        .form-card {
            padding: 25px;
        }
        .stats-section {
            gap: 15px;
        }
        .stat-item {
            padding: 15px 25px;
            min-width: 130px;
        }
        .stat-number {
            font-size: 1.5rem;
        }
        .comment-text {
            font-size: 0.9rem;
            min-height: 70px;
        }
        .customer-detail h6 {
            font-size: 0.95rem;
        }
        .customer-avatar {
            width: 45px;
            height: 45px;
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')

<div class="container-testimoni">

    <!-- HEADER -->
    <div class="testimoni-header">
        <div class="header-badge">
            <i class="fas fa-star me-1"></i> Testimoni Pelanggan
        </div>
        <h1 class="header-title">Apa Kata <span>Pelanggan</span> Kami?</h1>
        <div class="header-underline"></div>
        <p class="header-subtitle">
            Ribuan pelanggan telah merasakan pelayanan terbaik dari Wijaya Farma
        </p>
    </div>

    <!-- STATISTIK -->
    @php
        $total_testimoni = $list_testimoni->count();
        $total_rating = $list_testimoni->sum('rating');
        $avg_rating = $total_testimoni > 0 ? round($total_rating / $total_testimoni, 1) : 0;
        $full_stars = floor($avg_rating);
        $half_star = ($avg_rating - $full_stars) >= 0.5;
    @endphp

    <div class="stats-section">
        <div class="stat-item">
            <div class="stat-number">{{ $total_testimoni }}+</div>
            <div class="stat-label">📝 Ulasan Puas</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ $avg_rating }}</div>
            <div class="stat-rating">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $full_stars)
                        <i class="fas fa-star"></i>
                    @elseif($half_star && $i == $full_stars + 1)
                        <i class="fas fa-star-half-alt"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </div>
            <div class="stat-label">⭐ Rata-rata Rating</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ $total_testimoni > 0 ? round(($list_testimoni->where('rating', '>=', 4)->count() / $total_testimoni) * 100) : 0 }}%</div>
            <div class="stat-label">😊 Pelanggan Puas</div>
        </div>
    </div>

    <!-- FORM TESTIMONI -->
    <div class="form-container">
        <div class="form-card">
            <div class="form-title">
                <div class="form-title-icon">
                    <i class="fas fa-pen-fancy"></i>
                </div>
                <h5>Tulis Ulasan Anda</h5>
            </div>

            <form action="{{ route('testimoni.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <input type="text" 
                           name="nama_pelanggan" 
                           class="form-control-custom" 
                           placeholder="Nama lengkap Anda" 
                           required>
                </div>

                <div class="mb-3">
                    <textarea name="komentar" 
                              class="form-control-custom" 
                              rows="3" 
                              placeholder="Ceritakan pengalaman Anda di Wijaya Farma..." 
                              required></textarea>
                </div>

                <div class="rating-container">
                    <div class="rating-title">
                        <i class="fas fa-star me-1" style="color: #fbbf24;"></i> Beri Rating Anda
                    </div>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
                        <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                        <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                        <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                        <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Kirim Testimoni
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- GRID TESTIMONI - 3 KOLOM TIDAK GEPENG -->
    <div class="testimoni-grid">
        @forelse($list_testimoni as $index => $item)
        <div class="testimoni-card">
            <div class="quote-icon">“</div>
            
            <!-- Rating Bintang -->
            <div class="card-rating">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= ($item->rating ?? 0))
                        <i class="fas fa-star star"></i>
                    @else
                        <i class="far fa-star star-empty"></i>
                    @endif
                @endfor
            </div>

            <!-- ISI TESTIMONI -->
            <p class="comment-text">
                "{{ \Illuminate\Support\Str::limit($item->komentar, 120) }}"
            </p>

            <div class="card-divider"></div>

            <!-- NAMA PELANGGAN -->
            <div class="customer-info">
                <div class="customer-avatar">
                    {{ strtoupper(substr($item->nama_pelanggan, 0, 1)) }}
                </div>
                <div class="customer-detail">
                    <h6>{{ $item->nama_pelanggan }}</h6>
                    <p>
                        <i class="fas fa-check-circle verified-badge"></i> Verified Customer
                        <span class="rating-text">⭐ {{ $item->rating ?? 0 }}/5</span>
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-comment-dots fa-4x mb-3" style="color: var(--primary); opacity: 0.6;"></i>
            <h4 class="text-dark mb-2">Belum Ada Testimoni</h4>
            <p class="text-muted">Jadilah yang pertama memberikan ulasan untuk Wijaya Farma!</p>
        </div>
        @endforelse
    </div>

</div>

@endsection
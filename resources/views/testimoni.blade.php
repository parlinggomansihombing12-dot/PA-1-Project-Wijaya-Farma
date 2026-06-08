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
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
        --shadow-lg: 0 8px 20px rgba(0,0,0,0.08);
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
        min-height: 100vh;
    }

    .container-testimoni {
        max-width: 1200px;
        margin: 0 auto;
        padding: 35px 25px;
    }

    /* ================= HEADER SECTION ================= */
    .testimoni-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .header-badge {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary-light), var(--primary));
        color: var(--primary-dark);
        padding: 4px 16px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        margin-bottom: 12px;
        letter-spacing: 1px;
    }

    .header-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 8px;
    }

    .header-title span {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .header-underline {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        margin: 0 auto 12px;
        border-radius: 3px;
    }

    .header-subtitle {
        color: var(--text-muted);
        font-size: 0.85rem;
        max-width: 500px;
        margin: 0 auto;
        line-height: 1.5;
    }

    /* ================= STATISTIK ================= */
    .stats-section {
        display: flex;
        justify-content: center;
        gap: 25px;
        margin-bottom: 35px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        background: white;
        padding: 16px 28px;
        border-radius: 20px;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        transition: all 0.2s;
        min-width: 130px;
    }

    .stat-item:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.7rem;
        color: var(--text-muted);
        font-weight: 500;
        margin-top: 6px;
    }

    .stat-rating {
        font-size: 0.75rem;
        color: #fbbf24;
        letter-spacing: 1px;
        margin-top: 4px;
    }

    /* ================= FORM TESTIMONI ================= */
    .form-container {
        max-width: 500px;
        margin: 0 auto 40px;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(26,188,156,0.1);
    }

    .form-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--primary-light);
    }

    .form-title-icon {
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

    .form-title h5 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    .form-control-custom {
        width: 100%;
        padding: 10px 15px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.8rem;
        transition: all 0.2s;
        font-family: 'Inter', sans-serif;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
    }

    .rating-container {
        text-align: center;
        padding: 8px 0;
    }

    .rating-title {
        font-size: 0.7rem;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 8px;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        gap: 6px;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 1.5rem;
        color: #cbd5e1;
        cursor: pointer;
        transition: all 0.2s;
    }

    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
        color: #fbbf24;
        transform: scale(1.05);
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.8rem;
        width: 100%;
        transition: all 0.2s;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(26,188,156,0.3);
        gap: 10px;
    }

    /* ================= GRID TESTIMONI - 4 KOLOM ================= */
    .testimoni-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    /* ================= CARD TESTIMONI ================= */
    .testimoni-card {
        background: white;
        border-radius: 16px;
        padding: 18px;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .testimoni-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
    }

    .testimoni-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .quote-icon {
        position: absolute;
        top: 12px;
        right: 12px;
        font-size: 2.5rem;
        color: var(--primary-light);
        opacity: 0.3;
        font-family: serif;
    }

    .card-rating {
        margin-bottom: 12px;
        display: flex;
        gap: 4px;
    }

    .card-rating .star {
        color: #fbbf24;
        font-size: 0.75rem;
    }

    .card-rating .star-empty {
        color: #e2e8f0;
        font-size: 0.75rem;
    }

    .comment-text {
        font-size: 0.8rem;
        line-height: 1.55;
        color: var(--dark);
        margin-bottom: 15px;
        font-weight: 500;
        position: relative;
        z-index: 1;
        flex: 1;
    }

    .comment-text::before {
        content: '"';
        font-size: 1.8rem;
        color: var(--primary-light);
        opacity: 0.4;
        position: absolute;
        top: -10px;
        left: -5px;
        font-family: serif;
    }

    .card-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--primary-light), transparent);
        margin: 10px 0 12px;
    }

    .customer-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 5px;
    }

    .customer-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 1rem;
        box-shadow: 0 3px 8px rgba(26,188,156,0.2);
        flex-shrink: 0;
    }

    .customer-detail h6 {
        font-size: 0.85rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 3px;
    }

    .customer-detail p {
        font-size: 0.6rem;
        color: var(--text-muted);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 5px;
        flex-wrap: wrap;
    }

    .verified-badge {
        color: var(--primary);
        font-size: 0.6rem;
    }

    .rating-text {
        background: var(--primary-light);
        padding: 2px 6px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.6rem;
        color: var(--primary-dark);
    }

    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 40px;
        background: white;
        border-radius: 20px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1100px) {
        .testimoni-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 800px) {
        .testimoni-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 500px) {
        .testimoni-grid {
            grid-template-columns: 1fr;
        }
        .stats-section {
            gap: 15px;
        }
        .stat-item {
            padding: 12px 18px;
            min-width: 100px;
        }
        .stat-number {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 768px) {
        .container-testimoni {
            padding: 25px 20px;
        }
        .header-title {
            font-size: 1.5rem;
        }
        .form-card {
            padding: 20px;
        }
        .comment-text {
            font-size: 0.75rem;
        }
        .customer-detail h6 {
            font-size: 0.8rem;
        }
        .customer-avatar {
            width: 36px;
            height: 36px;
            font-size: 0.9rem;
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

                <div class="mt-3">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Kirim Testimoni
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- GRID TESTIMONI - 4 KOLOM -->
    <div class="testimoni-grid">
        @forelse($list_testimoni as $index => $item)
        <div class="testimoni-card">
            <div class="quote-icon">“</div>
            
            <div class="card-rating">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= ($item->rating ?? 0))
                        <i class="fas fa-star star"></i>
                    @else
                        <i class="far fa-star star-empty"></i>
                    @endif
                @endfor
            </div>

            <p class="comment-text">
                "{{ \Illuminate\Support\Str::limit($item->komentar, 100) }}"
            </p>

            <div class="card-divider"></div>

            <div class="customer-info">
                <div class="customer-avatar">
                    {{ strtoupper(substr($item->nama_pelanggan, 0, 1)) }}
                </div>
                <div class="customer-detail">
                    <h6>{{ \Illuminate\Support\Str::limit($item->nama_pelanggan, 15) }}</h6>
                    <p>
                        <i class="fas fa-check-circle verified-badge"></i> Verified
                        <span class="rating-text">⭐ {{ $item->rating ?? 0 }}/5</span>
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-comment-dots fa-3x mb-3" style="color: var(--primary); opacity: 0.6;"></i>
            <h4 class="text-dark mb-2">Belum Ada Testimoni</h4>
            <p class="text-muted">Jadilah yang pertama memberikan ulasan untuk Wijaya Farma!</p>
        </div>
        @endforelse
    </div>

</div>

@endsection
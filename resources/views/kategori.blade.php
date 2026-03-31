@extends('layouts.main')
@section('title', 'Kategori Obat - Wijaya Farma')

@push('custom-css')
<style>
    body { background-color: #f8f9fa; }
    
    /* SIDEBAR KATEGORI */
    .sidebar-kategori { background: white; border-radius: 12px; padding: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .kategori-item { display: flex; align-items: center; padding: 12px 20px; color: #495057; text-decoration: none; border-radius: 8px; font-weight: 500; margin-bottom: 5px; transition: 0.2s; }
    .kategori-item:hover { background-color: #f1f3f5; color: #1ABC9C; }
    /* Warna saat kategori aktif diklik */
    .kategori-item.active { background-color: #1ABC9C; color: white; }
    
    /* KARTU PRODUK */
    .card-produk { border: 1px solid #eee; border-radius: 12px; transition: 0.3s; overflow: hidden; }
    .card-produk:hover { border-color: #1ABC9C; box-shadow: 0 5px 15px rgba(26,188,156,0.15); transform: translateY(-3px); }
    .foto-produk { height: 180px; width: 100%; object-fit: cover; }
    .foto-kosong { height: 180px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; }
    .harga-obat { color: #2980B9; font-size: 1.1rem; font-weight: bold; }
    .badge-resep { position: absolute; top: 10px; right: 10px; background: #dc3545; color: white; padding: 4px 8px; border-radius: 50%; font-size: 0.8rem; font-weight: bold;}
    
    /* PENCARIAN */
    .search-box { border-radius: 30px; padding: 12px 25px; border: 1px solid #ddd; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .search-box:focus { box-shadow: 0 2px 10px rgba(26,188,156,0.2); border-color: #1ABC9C; }
</style>
@endpush

@section('content')
<div class="container my-4">
    <div class="row">
        
        <!-- ================= KIRI: SIDEBAR KATEGORI ================= -->
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="sidebar-kategori sticky-top" style="top: 80px; z-index: 1;">
                
                <h6 class="fw-bold px-3 pt-2 text-muted">Pilih Kategori</h6>
                <hr>

                <!-- Tombol Semua Obat (Mengarahkan ke /kategori) -->
                <a href="/kategori" class="kategori-item {{ empty($kategori_aktif) ? 'active' : '' }}">
                    <span class="me-3 fs-5">💊</span> Semua Obat
                </a>
                
                <!-- Looping Daftar Kategori -->
                @foreach($list_kategori as $kat)
                <a href="/kategori?kategori={{ $kat->id }}" class="kategori-item {{ $kategori_aktif == $kat->id ? 'active' : '' }}">
                    <span class="me-3 fs-5">🟢</span> {{ $kat->nama_kategori }}
                </a>
                @endforeach
            </div>
        </div>

        <!-- ================= KANAN: KONTEN PRODUK ================= -->
        <div class="col-lg-9 col-md-8">
            
            <!-- 1. KOTAK PENCARIAN -->
            <form action="/kategori" method="GET" class="mb-4">
                @if($kategori_aktif)
                    <input type="hidden" name="kategori" value="{{ $kategori_aktif }}">
                @endif
                <input type="search" name="cari" class="form-control search-box w-100" placeholder="🔍 Cari obat di kategori ini..." value="{{ request('cari') }}">
            </form>

            <!-- 2. GRID PRODUK -->
            <div class="row">
                @forelse($list_produk as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card card-produk h-100 bg-white position-relative">
                        
                        <!-- Logo Obat Keras -->
                        <div class="badge-resep">K</div>

                        <!-- LOGIKA FOTO PINTAR -->
                        @if($item->foto)
                            <img src="{{ asset('images/produk/' . $item->foto) }}" class="foto-produk" alt="{{ $item->nama_obat }}">
                        @else
                            <div class="foto-kosong text-center text-muted">
                                <div><span style="font-size: 2rem;">📷</span><br><small>Belum Ada Foto</small></div>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column p-3">
                            <h6 class="card-title fw-bold text-dark" style="font-size: 0.9rem;">{{ $item->nama_obat }}</h6>
                            <div class="mb-2"><span class="badge bg-light text-dark border" style="font-size: 0.6rem;">Wijaya Farma</span></div>
                            <hr class="mt-auto mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="harga-obat">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            </div>
                            <button class="btn btn-tema btn-sm w-100 fw-bold" style="border-radius: 8px;">Detail / Beli</button>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Jika Obat Kosong -->
                <div class="col-12 text-center py-5 bg-white rounded-3 border shadow-sm">
                    <h1 class="display-1 text-muted">📦</h1>
                    <h5 class="text-muted mt-3">Belum ada obat di kategori ini.</h5>
                    <a href="/kategori" class="btn btn-tema mt-3">Lihat Semua Kategori</a>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection
@extends('layouts.admin_master')
@section('title', 'Pengaturan Profil Toko - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">⚙️ Pengaturan Profil Toko</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Kolom Kiri: Form Edit -->
        <div class="col-md-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.profil-toko.update') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Toko/Apotek <span class="text-danger">*</span></label>
                            <input type="text" name="nama_toko" class="form-control" value="{{ $toko->nama_toko ?? '' }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nomor HP/WhatsApp <span class="text-danger">*</span></label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $toko->no_hp ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email (Opsional)</label>
                                <input type="email" name="email" class="form-control" value="{{ $toko->email ?? '' }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ $toko->alamat ?? '' }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Deskripsi Toko (Slogan/Moto)</label>
                            <textarea name="deskripsi" class="form-control" rows="2">{{ $toko->deskripsi ?? '' }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-bold py-2">💾 Simpan Pengaturan Profil</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Preview Info -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="background-color: #2C3E50; color: white;">
                <div class="card-body p-4 text-center">
                    <div style="font-size: 3rem; margin-bottom: 10px;">🏪</div>
                    <h4 class="fw-bold text-info">{{ $toko->nama_toko ?? 'Apotek Anda' }}</h4>
                    <hr class="border-secondary">
                    <p class="small text-light text-start mb-2"><strong>📍 Alamat:</strong><br> {{ $toko->alamat ?? 'Belum diisi' }}</p>
                    <p class="small text-light text-start mb-2"><strong>📞 Telp:</strong><br> {{ $toko->no_hp ?? 'Belum diisi' }}</p>
                    <p class="small text-light text-start mb-0"><strong>💬 Slogan:</strong><br> <em>"{{ $toko->deskripsi ?? 'Belum ada slogan' }}"</em></p>
                </div>
            </div>
        </div>
    </div>
@endsection
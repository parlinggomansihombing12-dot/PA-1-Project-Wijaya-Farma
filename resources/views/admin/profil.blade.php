@extends('layouts.admin_master')
@section('title', 'Pengaturan Profil Toko')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">⚙️ Pengaturan Profil Toko</h2>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <!-- WAJIB enctype untuk upload file -->
        <form action="{{ route('admin.profil-toko.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nama Toko / Apotek</label>
                    <input type="text" name="nama_toko" class="form-control" value="{{ $toko->nama_toko ?? '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Upload Foto Toko Depan</label>
                    <input type="file" name="foto_toko" class="form-control" accept="image/*">
                    @if(isset($toko->foto_toko))
                        <small class="text-success">✔️ Foto saat ini sudah tersimpan.</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Slogan Singkat (Deskripsi)</label>
                    <textarea name="deskripsi" class="form-control" rows="2">{{ $toko->deskripsi ?? '' }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Sejarah Berdirinya Toko</label>
                    <textarea name="sejarah" class="form-control" rows="2">{{ $toko->sejarah ?? '' }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="fw-bold text-primary">Visi Toko</label>
                    <textarea name="visi" class="form-control" rows="3">{{ $toko->visi ?? '' }}</textarea>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="fw-bold text-success">Misi Toko</label>
                    <textarea name="misi" class="form-control" rows="3">{{ $toko->misi ?? '' }}</textarea>
                </div>
            </div>

            <!-- Input tersembunyi untuk Alamat & HP agar validasi Controller tidak error -->
            <input type="hidden" name="alamat" value="{{ $toko->alamat ?? '-' }}">
            <input type="hidden" name="no_hp" value="{{ $toko->no_hp ?? '-' }}">

            <button type="submit" class="btn btn-success w-100 fw-bold py-2">💾 Simpan Semua Pengaturan</button>
        </form>
    </div>
</div>
@endsection
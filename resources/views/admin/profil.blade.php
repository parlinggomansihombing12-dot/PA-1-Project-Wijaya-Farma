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
        <!-- PERBAIKAN: Mengubah admin.profil-toko.update menjadi admin.profil.update -->
        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
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

            <hr class="my-4 border-secondary">
            
            <h4 class="fw-bold mb-4" style="color: #2C3E50;">👨‍⚕️ Profil Pemilik / Apoteker</h4>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nama Pemilik beserta Gelar</label>
                    <input type="text" name="nama_pemilik" class="form-control" value="{{ $toko->nama_pemilik ?? '' }}" placeholder="Contoh: apt. Budi Wijaya, S.Farm.">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Upload Foto Pemilik</label>
                    <input type="file" name="foto_pemilik" class="form-control" accept="image/*">
                    @if(isset($toko->foto_pemilik))
                        <small class="text-success">✔️ Foto saat ini sudah tersimpan.</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Riwayat Pendidikan Singkat</label>
                    <textarea name="pendidikan_pemilik" class="form-control" rows="2" placeholder="Contoh: Profesi Apoteker - Univ. Indonesia">{{ $toko->pendidikan_pemilik ?? '' }}</textarea>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Pengalaman / Spesialisasi</label>
                    <textarea name="pengalaman_pemilik" class="form-control" rows="2" placeholder="Contoh: 10 tahun melayani konsultasi resep.">{{ $toko->pengalaman_pemilik ?? '' }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 fw-bold py-2">💾 Simpan Semua Pengaturan</button>
        </form>
    </div>
</div>
@endsection
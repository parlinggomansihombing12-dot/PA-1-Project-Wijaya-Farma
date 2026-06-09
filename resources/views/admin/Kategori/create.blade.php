@extends('layouts.admin_master')
@section('title', 'Tambah Kategori - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">➕ Tambah Kategori Baru</h2>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
    </div>

    <!-- Menampilkan pesan error jika ada isian yang gagal divalidasi Controller -->
    @if($errors->any())
        <div class="alert alert-danger shadow-sm rounded-3">
            <ul class="mb-0 ps-3">@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            
            <!-- FORM TAMBAH -->
            <form action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kategori" class="form-control" required placeholder="Contoh: Obat Kepala">
                </div>

                <!-- INI PERBAIKANNYA: name diubah menjadi 'foto' -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Kategori (Opsional)</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Gunakan gambar transparan (.png) agar tampilan di web pengunjung lebih profesional. Maksimal 2MB.</small>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Contoh: Obat untuk meredakan sakit kepala dan pusing."></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2">💾 Simpan Kategori Baru</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.admin_master')
@section('title', 'Edit Kategori - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">✏️ Edit Kategori</h2>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger shadow-sm rounded-3">
            <ul class="mb-0 ps-3">@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            
            <!-- FORM UPDATE -->
            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
                </div>

                <!-- INI PERBAIKANNYA: Logika pengecekan foto dan nama inputnya -->
                <div class="mb-3 p-3 rounded bg-light border">
                    <label class="form-label fw-bold text-primary">Ganti Foto Kategori</label>
                    
                    <!-- Mengecek apakah kategori ini punya 'foto' di database -->
                    @if($kategori->foto)
                        <div class="mb-3">
                            <small class="text-muted d-block mb-2">Foto Saat Ini:</small>
                            <img src="{{ asset('images/kategori/' . $kategori->foto) }}" alt="foto kategori" class="img-thumbnail" style="height: 60px; object-fit: contain; background: white;">
                        </div>
                    @endif

                    <!-- name diubah menjadi 'foto' -->
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted mt-2 d-block">Kosongkan saja jika tidak ingin mengubah foto. Jika Anda meng-upload file baru, foto yang lama akan otomatis terhapus.</small>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $kategori->deskripsi }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-success w-100 fw-bold py-2">💾 Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
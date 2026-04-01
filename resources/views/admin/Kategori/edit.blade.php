@extends('layouts.admin_master')
@section('title', 'Edit Kategori - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">✏️ Edit Kategori</h2>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
    </div>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            <!-- PENTING: Tambahkan enctype="multipart/form-data" -->
            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
                </div>

                <!-- EDIT ICON BARU -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Ganti Icon Kategori</label>
                    
                    <!-- Menampilkan Icon Lama Jika Ada -->
                    @if($kategori->icon)
                        <div class="mb-2">
                            <small class="text-muted d-block mb-1">Icon saat ini:</small>
                            <img src="{{ asset('images/kategori/' . $kategori->icon) }}" alt="icon" style="height: 50px; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                        </div>
                    @endif

                    <input type="file" name="icon" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah icon.</small>
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
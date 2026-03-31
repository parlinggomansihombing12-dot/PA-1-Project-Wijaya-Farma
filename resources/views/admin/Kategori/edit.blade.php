@extends('layouts.admin_master')
@section('title', 'Edit Kategori - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">✏️ Edit Kategori</h2>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
    </div>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $kategori->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-success w-100 fw-bold py-2">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
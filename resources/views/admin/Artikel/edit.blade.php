@extends('layouts.admin_master')
@section('title', 'Edit Artikel - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">✏️ Edit Artikel</h2>
    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
</div>

@if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul></div>
@endif

<div class="card border-0 shadow-sm" style="max-width: 800px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Wajib untuk proses Update -->
            
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Artikel <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control form-control-lg" value="{{ $artikel->judul }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Isi Konten Artikel <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" rows="10" required>{{ $artikel->konten }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Nama Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ $artikel->penulis }}">
            </div>

            <button type="submit" class="btn btn-success w-100 fw-bold py-3 fs-5">💾 Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
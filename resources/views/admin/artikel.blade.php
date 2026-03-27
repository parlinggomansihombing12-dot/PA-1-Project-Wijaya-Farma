@extends('layouts.admin_master')

@section('title', 'Kelola Artikel - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">Data Artikel Kesehatan</h2>
        <a href="#" class="btn btn-primary fw-bold">+ Tambah Artikel Baru</a>
    </div>

    <div class="card border-0 shadow-sm mt-3">
        <div class="card-body">
            <p class="text-muted">Di sini nanti tabel berisi daftar judul artikel, ringkasan, dan penulis akan ditampilkan.</p>
            <!-- Nanti tabel datanya kita masukkan ke sini -->
        </div>
    </div>
@endsection
@extends('layouts.admin_master')

@section('title', 'Kelola Layanan - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">Data Layanan Apotek</h2>
        <a href="#" class="btn btn-primary fw-bold">+ Tambah Layanan Baru</a>
    </div>

    <div class="card border-0 shadow-sm mt-3">
        <div class="card-body">
            <p class="text-muted">Di sini nanti tabel berisi daftar layanan (seperti Cek Tensi, dll) akan ditampilkan.</p>
        </div>
    </div>
@endsection
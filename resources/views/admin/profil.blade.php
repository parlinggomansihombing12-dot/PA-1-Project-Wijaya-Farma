@extends('layouts.admin_master')

@section('title', 'Pengaturan Profil Toko')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">Pengaturan Profil Toko</h2>
        <a href="#" class="btn btn-warning fw-bold text-dark">✏️ Edit Profil</a>
    </div>

    <div class="card border-0 shadow-sm mt-3">
        <div class="card-body">
            <h5 class="fw-bold mb-4">Informasi Saat Ini:</h5>
            
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Nama Toko:</strong> {{ $toko->nama_toko ?? 'Belum ada' }}</li>
                <li class="list-group-item"><strong>Alamat:</strong> {{ $toko->alamat ?? 'Belum ada' }}</li>
                <li class="list-group-item"><strong>No. HP:</strong> {{ $toko->no_hp ?? 'Belum ada' }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $toko->email ?? 'Belum ada' }}</li>
                <li class="list-group-item"><strong>Deskripsi:</strong> {{ $toko->deskripsi ?? 'Belum ada' }}</li>
            </ul>
            
            <p class="text-muted mb-0">Di sini nanti ada form untuk mengubah nama, alamat, nomor HP, dan email apotek Anda dari halaman web.</p>
        </div>
    </div>
@endsection
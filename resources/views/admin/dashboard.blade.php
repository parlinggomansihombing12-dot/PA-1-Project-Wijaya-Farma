@extends('layouts.admin_master')

@section('title', 'Dashboard - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">Dashboard Statistik</h2>
        <p class="mb-0">Halo, <strong class="text-success">{{ Auth::user()->name }}</strong>!</p>
    </div>

    <!-- KARTU STATISTIK -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 text-white h-100" style="background-color: #2980B9;">
                <div class="card-body">
                    <h6 class="text-uppercase fw-bold">Total Produk</h6>
                    <h1 class="display-4 fw-bold mb-0">15</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 text-white h-100" style="background-color: #1ABC9C;">
                <div class="card-body">
                    <h6 class="text-uppercase fw-bold">Total Kategori</h6>
                    <h1 class="display-4 fw-bold mb-0">5</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 text-white h-100" style="background-color: #f39c12;">
                <div class="card-body">
                    <h6 class="text-uppercase fw-bold">Pesan Baru</h6>
                    <h1 class="display-4 fw-bold mb-0">3</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
            <h5 class="fw-bold">Selamat Datang di Ruang Kendali!</h5>
            <p class="text-muted mb-0">Di halaman ini Anda dapat mengelola seluruh isi website Apotek Wijaya Farma.</p>
        </div>
    </div>
@endsection
@extends('layouts.admin') {{-- Pastikan nama layout sesuai dengan file layout admin Anda --}}
@section('title', 'Kelola Kontak')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan Kontak & Lokasi</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-0 rounded-3">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 fw-bold text-primary">Form Informasi Kontak</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kontak.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ $toko->alamat ?? '' }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nomor WhatsApp (Contoh: 62823...)</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $toko->no_hp ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $toko->email ?? '' }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Jam Operasional</label>
                            <input type="text" name="jam_operasional" class="form-control" placeholder="Contoh: Senin - Sabtu: 08.00 - 21.00" value="{{ $toko->jam_operasional ?? '' }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-danger">Google Maps Embed URL (Link src saja)</label>
                            <input type="text" name="map_url" class="form-control" placeholder="https://www.google.com/maps/embed?pb=..." value="{{ $toko->map_url ?? '' }}" required>
                            <small class="text-muted mt-1 d-block">Cara ambil: Buka Google Maps > Share > Embed map > Ambil isi di dalam tanda petik <b>src="..."</b></small>
                        </div>

                        <button type="submit" class="btn btn-primary px-4 shadow-sm">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow border-0 rounded-3 bg-light">
                <div class="card-body">
                    <h6 class="fw-bold"><i class="fas fa-info-circle me-1"></i> Petunjuk</h6>
                    <hr>
                    <p class="small text-muted">Data yang Anda masukkan di sini akan tampil secara otomatis di halaman <b>Kontak</b> yang diakses oleh pengunjung.</p>
                    <p class="small text-muted">Pastikan nomor WhatsApp diawali dengan kode negara (contoh: <b>62</b> untuk Indonesia).</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
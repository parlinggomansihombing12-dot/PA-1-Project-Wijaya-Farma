{{-- 1. Ganti extends ke layout admin Anda (biasanya layouts.admin atau layouts.app_admin) --}}
@extends('layouts.admin') 

@section('title', 'Data Produk - Admin Wijaya Farma')

@section('content')
<div class="container-fluid p-4">
    
    <!-- HEADER HALAMAN -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Data Produk Obat</h3>
        
        <!-- TOMBOL TAMBAH -->
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary shadow-sm px-4">
            <i class="fas fa-plus me-2"></i>Tambah Produk
        </a>
    </div>

    <!-- FORM PENCARIAN -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.produk.index') }}" method="GET" class="row g-2">
                <div class="col-md-10">
                    <input type="search" name="cari" class="form-control" placeholder="Cari berdasarkan nama obat..." value="{{ request('cari') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TABEL DATA (Agar Seragam dengan Halaman Kategori) -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="py-3 px-4" style="width: 50px;">No</th>
                            <th class="py-3">Foto</th>
                            <th class="py-3">Nama Obat</th>
                            <th class="py-3">Harga</th>
                            <th class="py-3">Stok</th>
                            <th class="py-3 text-center" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $index => $item)
                        <tr>
                            <td class="px-4 text-center">{{ $index + 1 }}</td>
                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('images/produk/' . $item->foto) }}" width="60" class="rounded shadow-sm border">
                                @else
                                    <div class="bg-light rounded text-center d-flex align-items-center justify-content-center" style="width: 60px; height: 45px;">
                                        <small class="text-muted" style="font-size: 10px;">No Img</small>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $item->nama_obat }}</div>
                                <small class="text-muted">{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}</small>
                            </td>
                            <td class="fw-bold text-primary">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $item->stok > 10 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->stok }} pcs
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn btn-warning btn-sm text-white px-3">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-box-open fa-3x mb-3 opacity-25"></i><br>
                                Belum ada data produk yang tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
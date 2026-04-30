@extends('layouts.admin_master') 
@section('title', 'Data Produk - Admin Wijaya Farma')

@section('content')
<div class="container-fluid p-0"> <!-- Saya ubah p-4 jadi p-0 agar selaras dengan desain admin kita -->
    
    <!-- HEADER HALAMAN -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">Data Produk Obat</h2>
        
        <!-- TOMBOL TAMBAH -->
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary shadow-sm px-4 fw-bold">
            <i class="fas fa-plus me-2"></i>Tambah Produk
        </a>
    </div>

    <!-- Menampilkan Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- TABEL DATA -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4 text-center" style="width: 50px;">No</th>
                            <th class="py-3 text-center">Foto</th>
                            <th class="py-3">Nama Obat</th>
                            <th class="py-3">Harga</th>
                            <th class="py-3 text-center">Stok</th>
                            <th class="py-3 text-center" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $index => $item)
                        <tr>
                            <td class="px-4 text-center">{{ $index + 1 }}</td>
                            <td class="text-center">
                                @if($item->foto)
                                    <img src="{{ asset('images/produk/' . $item->foto) }}" class="rounded shadow-sm border" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded mx-auto d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-camera text-muted opacity-50"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $item->nama_obat }}</div>
                                <small class="text-muted"><i class="fas fa-tag me-1"></i> {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}</small>
                            </td>
                            <td class="fw-bold text-primary">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="badge {{ $item->stok > 10 ? 'bg-success' : 'bg-danger' }} px-3 py-2">
                                    {{ $item->stok }} pcs
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark fw-bold px-3">
                                        ✏️ Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk beserta fotonya secara permanen?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold px-3">
                                            🗑️ Hapus
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
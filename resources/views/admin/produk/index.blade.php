@extends('layouts.admin_master')

@section('title', 'Kelola Produk - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">Data Produk Obat</h2>
        <!-- Tombol ini diarahkan ke fungsi create() di Controller Anda -->
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary fw-bold">+ Tambah Produk Baru</a>
    </div>

    <!-- Menampilkan Notifikasi Sukses dari Controller -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th>Nama Obat</th>
                        <th width="20%">Harga</th>
                        <th width="10%" class="text-center">Stok</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Perhatikan: Variabelnya 'produks' sesuai dari Controller Anda -->
                    @forelse($produks as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <!-- Sesuai nama kolom di Controller Anda: 'nama_obat' -->
                        <td class="fw-bold">{{ $item->nama_obat }}</td>
                        <td class="text-primary fw-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="text-center"><span class="badge bg-success px-3 py-2">{{ $item->stok }}</span></td>
                        <td class="text-center">
                            
                            <!-- Tombol Edit & Hapus (Disambungkan ke Route Resource) -->
                            <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus obat ini?');">
                                <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark fw-bold">✏️ Edit</a>
                                
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-bold">🗑️ Hapus</button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada produk obat yang ditambahkan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('layouts.admin_master')
@section('title', 'Kelola Artikel & Kategori - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">📝 Kelola Artikel & Kategori</h2>
</div>

<!-- Menampilkan Pesan Sukses/Error -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row align-items-start">
    
    <!-- ================= KOLOM KIRI (KELOLA KATEGORI ARTIKEL) ================= -->
    <div class="col-lg-4 mb-4">
        
        <!-- Form Tambah Kategori Artikel -->
        <div class="card border-0 shadow-sm mb-4" style="border-top: 4px solid #3498db;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3 text-primary"><i class="fas fa-tags me-2"></i>Tambah Kategori Artikel</h6>
                
                <!-- Form diarahkan ke rute admin.kategori-artikel.store -->
                <form action="{{ route('admin.kategori-artikel.store') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="nama_kategori" class="form-control bg-light border-0" placeholder="Misal: Info Obat" required>
                        <button type="submit" class="btn btn-primary fw-bold">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Kategori Artikel -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">Nama Kategori</th>
                            <th width="30%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategori_artikel as $kat)
                        <tr>
                            <td class="ps-3 fw-bold text-secondary">{{ $kat->nama_kategori }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.kategori-artikel.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori artikel ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="text-center py-3 text-muted small">Belum ada kategori yang dibuat.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- ================= KOLOM KANAN (DAFTAR ARTIKEL KESEHATAN) ================= -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-top: 4px solid #1ABC9C;">
            <div class="card-body p-0">
                
                <div class="d-flex justify-content-between align-items-center p-3 bg-light border-bottom">
                    <h6 class="fw-bold mb-0 text-success"><i class="fas fa-newspaper me-2"></i>Daftar Artikel Tersimpan</h6>
                    <!-- Tombol Tulis Artikel Baru (Arahnya ke create.blade.php) -->
                    <a href="{{ route('admin.artikel.create') }}" class="btn btn-sm btn-success fw-bold px-3">+ Tulis Artikel Baru</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="35%">Judul Artikel</th>
                                <th>Kategori</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($artikels as $item)
                            <tr>
                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                
                                <td>
                                    <div class="fw-bold text-dark">{{ Str::limit($item->judul, 40) }}</div>
                                    <div class="small text-muted"><i class="far fa-calendar-alt me-1"></i> {{ $item->created_at->format('d M Y') }}</div>
                                </td>
                                
                                <td><span class="badge bg-light text-primary border">{{ $item->kategori_artikel ?? 'Umum' }}</span></td>
                                
                                <td class="text-center">
                                    <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus artikel beserta fotonya permanen?');">
                                        <a href="{{ route('admin.artikel.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark fw-bold mb-1">✏️ Edit</a>
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold mb-1">🗑️ Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada artikel yang diterbitkan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
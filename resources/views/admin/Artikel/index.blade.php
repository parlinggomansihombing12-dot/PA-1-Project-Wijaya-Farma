@extends('layouts.admin_master')
@section('title', 'Kelola Artikel - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">📝 Kelola Artikel Kesehatan</h2>
    <!-- Tombol Mengarah ke Halaman Create -->
    <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary fw-bold">+ Tambah Artikel</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="30%">Judul Artikel</th>
                        <th>Ringkasan Konten</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ingat: Controller kita mengirim nama variabel 'artikels' -->
                    @forelse($artikels as $item)
                    <tr>
                        <td class="text-center text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-bold text-primary">{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->konten, 80) }}</td>
                        <td class="text-center">
                            <!-- Tombol Hapus & Edit Terpisah -->
                            <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus artikel ini?');">
                                <a href="{{ route('admin.artikel.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark fw-bold">✏️ Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-bold">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada artikel yang diterbitkan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
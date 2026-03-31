@extends('layouts.admin_master')
@section('title', 'Kelola Kategori - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">Data Kategori Obat</h2>
        <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary fw-bold">+ Tambah Kategori</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th width="30%">Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="fw-bold text-primary">{{ $item->nama_kategori }}</td>
                        <td>{{ $item->deskripsi ?? '-' }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?');">
                                <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark fw-bold">✏️ Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-bold">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada kategori obat.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
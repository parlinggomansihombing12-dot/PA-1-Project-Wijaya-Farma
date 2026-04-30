@extends('layouts.admin_master')
@section('title', 'Kelola Testimoni - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">⭐ Kelola Testimoni Pelanggan</h2>
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
                        <th width="20%">Nama Pelanggan</th>
                        <th width="15%" class="text-center">Rating</th>
                        <th>Ulasan / Komentar</th>
                        <th width="15%" class="text-center">Status</th>
                        <th width="20%" class="text-center">Aksi Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonis as $item)
                    <tr class="{{ $item->status == 'pending' ? 'table-warning' : '' }}">
                        <td class="text-center text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $item->nama_pelanggan }}</td>
                        <td class="text-center text-warning" style="font-size: 1.2rem;">
                            {{ str_repeat('★', $item->rating) }}
                        </td>
                        <td>"{{ $item->komentar }}"</td>
                        <td class="text-center">
                            @if($item->status == 'pending')
                                <span class="badge bg-warning text-dark py-2 px-3">Menunggu Persetujuan</span>
                            @else
                                <span class="badge bg-success py-2 px-3">Ditampilkan di Publik</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- JIKA PENDING, TAMPILKAN TOMBOL SETUJUI (Method PUT) -->
                            @if($item->status == 'pending')
                                <form action="{{ route('admin.testimoni.update', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm fw-bold">✔️ Setujui</button>
                                </form>
                            @endif

                            <!-- TOMBOL HAPUS (Untuk Spam/Ditolak) -->
                            <form action="{{ route('admin.testimoni.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin tolak & hapus testimoni ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-bold">🗑️ Tolak/Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center py-4 text-muted">Belum ada ulasan dari pelanggan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
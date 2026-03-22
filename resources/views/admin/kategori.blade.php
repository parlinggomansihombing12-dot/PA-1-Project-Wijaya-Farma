@extends('layouts.admin_master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold teks-hijau">Manajemen Kategori</h2>
        <!-- Tombol ini nanti bisa diarahkan ke route tambah data -->
        <button class="btn btn-tema">+ Tambah Kategori</button>
    </div>

    <div class="card card-admin p-4 bg-white border-0 shadow-sm" style="border-radius: 12px;">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th width="50">No</th>
                    <th>Nama Kategori</th>
                    <th width="200" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- PERHATIKAN: Variabelnya harus $list_kategori sesuai Controller Anda --}}
                @foreach($list_kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori }}</td> {{-- Pastikan kolom di database namanya 'nama_kategori' --}}
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning">Edit</button>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
                @endforeach

                {{-- Jika data kosong --}}
                @if($list_kategori->isEmpty())
                <tr>
                    <td colspan="3" class="text-center py-4 text-muted">
                        Belum ada data kategori yang tersedia.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
@extends('admin.layout')

@section('content')

<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8fafc;
    }

    .container-custom {
        max-width: 1100px;
        margin: 0 auto;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    h2 {
        font-size: 24px;
        font-weight: 700;
        color: #0f172a;
    }

    .alert-success {
        background-color: #ecfdf5;
        border-left: 5px solid #10b981;
        color: #065f46;
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        font-size: 14px;
    }

    .btn-primary {
        background-color: #2563eb;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #f1f5f9;
    }

    th, td {
        padding: 14px;
        border-bottom: 1px solid #eee;
    }

    .btn-edit {
        color: #2563eb;
        font-weight: 600;
        margin-right: 10px;
    }

    .btn-delete {
        background-color: #fee2e2;
        color: #dc2626;
        border: none;
        padding: 5px 10px;
        border-radius: 6px;
    }

    .stock-badge {
        background: #f1f5f9;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 12px;
    }
</style>

<div class="container-custom">

    <div class="header-section">
        <h2>Data Produk Obat</h2>
        <a href="{{ route('admin.produk.create') }}" class="btn-primary">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($produks as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>Rp {{ number_format($p->harga,0,',','.') }}</td>
                    <td><span class="stock-badge">{{ $p->stok }}</span></td>
                    <td class="text-center">

                        <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn-delete">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Belum ada data produk
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
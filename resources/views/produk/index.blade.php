<h2>Data Produk Obat</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('produk.create') }}">+ Tambah Produk Baru</a>

<table border="1" width="100%">
    <tr>
        <th>No</th>
        <th>Nama Obat</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @forelse($list_produk as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->nama_obat }}</td>
        <td>Rp {{ number_format($p->harga) }}</td>
        <td>{{ $p->stok }}</td>
        <td>
            <a href="{{ route('produk.edit', $p->id) }}">Edit</a>

            <form action="{{ route('produk.destroy', $p->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus data?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">Belum ada produk yang ditambahkan.</td>
    </tr>
    @endforelse
</table>
<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
</head>
<body>

<h2>Data Produk Obat (Admin)</h2>

@if(session('success'))
    <p style="color: green; background: #e6ffed; padding: 10px; border-radius: 5px;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('admin.produk.create') }}" 
   style="display:inline-block; margin-bottom:10px; padding:8px 12px; background:#3490dc; color:white; text-decoration:none; border-radius:5px;">
   + Tambah Produk Baru
</a>

<table border="1" width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
    <thead style="background:#f2f2f2;">
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Stok</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>

    <tbody>
    @forelse($produks as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama_obat }}</td>
            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
            <td>{{ $p->stok }}</td>
            <td>
                <a href="{{ route('admin.produk.edit', $p->id) }}" 
                   style="color:blue;">Edit</a>

                |

                <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        onclick="return confirm('Yakin hapus data?')" 
                        style="color:red; background:none; border:none; cursor:pointer;">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" style="text-align:center;">Belum ada produk</td>
        </tr>
    @endforelse
    </tbody>
</table>

</body>
</html>
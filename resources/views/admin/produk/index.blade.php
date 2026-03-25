<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Produk Obat</title>
    
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
            padding: 40px 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Header Section */
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

        /* Alert Success */
        .alert-success {
            background-color: #ecfdf5;
            border-left: 5px solid #10b981;
            color: #065f46;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 14px;
            display: flex;
            align-items: center;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        /* Button Style */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }

        /* Table Card */
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        thead {
            background-color: #f1f5f9;
        }

        th {
            padding: 16px;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
            color: #64748b;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #334155;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        /* Action Buttons */
        .action-btns {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-edit {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
            background-color: #eff6ff;
            transition: 0.2s;
        }

        .btn-edit:hover {
            background-color: #dbeafe;
        }

        .btn-delete {
            background-color: #fff1f2;
            color: #e11d48;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            transition: 0.2s;
        }

        .btn-delete:hover {
            background-color: #ffe4e6;
        }

        /* Badge Stock */
        .stock-badge {
            display: inline-block;
            padding: 2px 10px;
            background-color: #f1f5f9;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
            color: #475569;
        }

        /* Empty State */
        .empty-state {
            padding: 50px;
            text-align: center;
            color: #94a3b8;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="header-section">
        <h2>Data Produk Obat</h2>
        <a href="{{ route('admin.produk.create') }}" class="btn-primary">
           + Tambah Produk Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <strong>Berhasil!</strong> &nbsp; {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th width="80">No</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th width="120">Stok</th>
                    <th width="200" style="text-align: center;">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @forelse($produks as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div style="font-weight: 600; color: #1e293b;">{{ $p->nama_obat }}</div>
                    </td>
                    <td>
                        <span style="color: #059669; font-weight: 600;">
                            Rp {{ number_format($p->harga, 0, ',', '.') }}
                        </span>
                    </td>
                    <td>
                        <span class="stock-badge">{{ $p->stok }} unit</span>
                    </td>
                    <td>
                        <div class="action-btns" style="justify-content: center;">
                            <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        Belum ada data produk yang tersedia.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
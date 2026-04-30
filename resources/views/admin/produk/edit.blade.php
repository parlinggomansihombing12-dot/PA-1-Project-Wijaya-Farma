<!-- 1. Panggil Template Induk Admin -->
@extends('layouts.admin_master')

<!-- 2. Beri Judul Halaman -->
@section('title', 'Edit Produk - Admin Panel')

<!-- 3. Masukkan Konten Form Edit -->
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">✏️ Edit Produk</h2>
        <!-- Tombol Kembali ke Daftar Produk -->
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
    </div>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            
            <!-- TAMPILKAN PESAN ERROR (Sangat penting untuk debugging) -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Form Update diarahkan ke Controller dengan method PUT -->
            <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Input Nama Obat -->
                <div class="mb-3">
                    <label for="nama_obat" class="form-label fw-bold">Nama Obat / Produk</label>
                    <input type="text" name="nama_obat" id="nama_obat" value="{{ old('nama_obat', $produk->nama_obat) }}" class="form-control" required>
                </div>

                <!-- 🟢 TAMBAHAN: INPUT KATEGORI (WAJIB ADA) -->
                <div class="mb-3">
                    <label for="kategori_id" class="form-label fw-bold">Kategori Produk</label>
                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kat)
                            <option value="{{ $kat->id }}" {{ $produk->kategori_id == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <!-- Input Harga -->
                    <div class="col-md-6 mb-3">
                        <label for="harga" class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" name="harga" id="harga" value="{{ old('harga', $produk->harga) }}" class="form-control" required>
                    </div>

                    <!-- Input Stok -->
                    <div class="col-md-6 mb-3">
                        <label for="stok" class="form-label fw-bold">Stok Awal</label>
                        <input type="number" name="stok" id="stok" value="{{ old('stok', $produk->stok) }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                     <label class="form-label fw-bold">Deskripsi Produk</label>
                     <textarea name="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                </div>

                <!-- Input Upload Foto -->
                <div class="mb-4">
                    <label for="foto" class="form-label fw-bold">Ganti Foto Produk (Opsional)</label>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                    <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengganti foto.</small>
                    
                    <!-- Menampilkan Foto Lama Jika Ada -->
                    @if($produk->foto)
                        <div class="mt-2 p-2 border rounded d-inline-block">
                            <p class="small mb-1 text-muted">Foto Saat Ini:</p>
                            <img src="{{ asset('images/produk/' . $produk->foto) }}" alt="Foto Lama" class="img-thumbnail" style="height: 100px; object-fit: cover;">
                        </div>
                    @endif
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-success w-100 fw-bold py-2">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                
            </form>
            
        </div>
    </div>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class AdminKategoriController extends Controller
{
    // ================= 1. INDEX (Menampilkan Tabel Kategori) =================
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('admin.Kategori.index', compact('kategoris'));
    }

    // ================= 2. CREATE (Menampilkan Form Tambah) =================
    public function create()
    {
        return view('admin.Kategori.create');
    }

    // ================= 3. STORE (Menyimpan Data Baru) =================
    public function store(Request $request)
    {
        // Validasi inputan admin
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string'
        ]);

        // Simpan ke database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    // ================= 4. EDIT (Menampilkan Form Edit) =================
    // INILAH FUNGSI YANG TADI HILANG DAN MEMBUAT ERROR!
    public function edit($id)
    {
        // Cari kategori berdasarkan ID yang diklik
        $kategori = Kategori::findOrFail($id);
        
        // Arahkan ke file resources/views/admin/Kategori/edit.blade.php
        return view('admin.Kategori.edit', compact('kategori'));
    }

    // ================= 5. UPDATE (Menyimpan Perubahan Data) =================
    public function update(Request $request, $id)
    {
        // Validasi inputan admin (sama dengan saat create)
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string'
        ]);

        // Cari kategori yang mau diedit
        $kategori = Kategori::findOrFail($id);
        
        // Update datanya di database
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // ================= 6. DESTROY (Menghapus Data) =================
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
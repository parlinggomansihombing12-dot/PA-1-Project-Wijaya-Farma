<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriArtikel; // Pastikan Model-nya dipanggil

class AdminKategoriArtikelController extends Controller
{
    // ================= 1. PROSES SIMPAN KATEGORI BARU (STORE) =================
    // Fungsi ini yang tadi dicari-cari oleh Laravel!
    public function store(Request $request)
    {
        // Validasi inputan admin
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        // Simpan data ke database
        KategoriArtikel::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori Artikel berhasil ditambahkan!');
    }

    // ================= 2. PROSES HAPUS KATEGORI (DESTROY) =================
    // Sekalian kita pastikan fungsi hapusnya juga ada
    public function destroy($id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori Artikel berhasil dihapus!');
    }
}
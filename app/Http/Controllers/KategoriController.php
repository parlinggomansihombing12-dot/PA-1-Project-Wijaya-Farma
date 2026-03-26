<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;    // Model untuk data kategori
use App\Models\ProfilToko;  // Model untuk data profil/navbar

class KategoriController extends Controller
{
    /**
     * Menampilkan halaman daftar kategori (Gambar 1)
     */
    public function index()
    {
        $toko = ProfilToko::first();
        $kategori = Kategori::all();

        return view('kategori', [
            'toko' => $toko,
            'list_kategori' => $kategori,
            'title' => 'Data Kategori' // Judul untuk heading di Gambar 1
        ]);
    }

    /**
     * Menyimpan kategori baru (Tombol Biru + Tambah Baru)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Update data kategori (Tombol Edit)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Menghapus kategori (Tombol Delete Merah)
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
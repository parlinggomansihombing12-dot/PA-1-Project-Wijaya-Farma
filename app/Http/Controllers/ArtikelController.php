<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;    // Memanggil Model Artikel
use App\Models\ProfilToko; // Memanggil Model ProfilToko untuk Navbar/Sidebar

class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar artikel (Tampilan Tabel sesuai Gambar 1)
     */
    public function index()
    {
        $toko = ProfilToko::first();
        $artikel = Artikel::latest()->get(); // Mengambil artikel terbaru

        return view('artikel', [
            'toko' => $toko, 
            'list_artikel' => $artikel,
            'title' => 'Kelola Artikel' // Judul halaman
        ]);
    }

    /**
     * Menyimpan artikel baru (Aksi dari tombol biru + Tambah Baru)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'penulis' => 'required|string|max:100',
        ]);

        // Simpan ke database
        Artikel::create([
            'judul'   => $request->judul,
            'konten'  => $request->konten,
            'penulis' => $request->penulis,
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Memperbarui artikel (Tombol Edit)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'penulis' => 'required|string|max:100',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->all());

        return redirect()->back()->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Menghapus artikel (Tombol Delete Merah)
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->back()->with('success', 'Artikel berhasil dihapus!');
    }
}
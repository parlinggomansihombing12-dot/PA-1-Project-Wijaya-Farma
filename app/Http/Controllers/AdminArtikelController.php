<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\File;

class AdminArtikelController extends Controller
{
    // ================= 1. TAMPIL TABEL =================
    public function index() 
    {
        $artikels = Artikel::latest()->get();
        return view('admin.Artikel.index', compact('artikels'));
    }

    // ================= 2. TAMPIL HALAMAN TAMBAH (CREATE) =================
    public function create()
    {
        return view('admin.Artikel.create');
    }

    // ================= 3. PROSES SIMPAN (STORE) BERSAMA FOTO =================
    public function store(Request $request)
    {
        // Tambahkan validasi kategori_artikel
        $request->validate([
            'judul'            => 'required|string|max:255',
            'kategori_artikel' => 'required|string|max:100', // Wajib diisi
            'konten'           => 'required|string',
            'penulis'          => 'nullable|string|max:100',
            'foto'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072' 
        ]);

        $nama_foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_artikel_' . $file->getClientOriginalName();
            $file->move(public_path('images/artikel'), $nama_foto);
        }

        // Masukkan semua data
        Artikel::create([
            'judul'            => $request->judul,
            'kategori_artikel' => $request->kategori_artikel, // Masukkan kategori
            'konten'           => $request->konten,
            'penulis'          => $request->penulis,
            'foto'             => $nama_foto
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    // ================= 4. TAMPIL HALAMAN EDIT =================
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.Artikel.edit', compact('artikel'));
    }

    // ================= 5. PROSES UBAH DATA (UPDATE) & GANTI FOTO =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'            => 'required|string|max:255',
            'kategori_artikel' => 'required|string|max:100', // Wajib diisi
            'konten'           => 'required|string',
            'penulis'          => 'nullable|string|max:100',
            'foto'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072'
        ]);

        $artikel = Artikel::findOrFail($id);
        $nama_foto = $artikel->foto; 

        if ($request->hasFile('foto')) {
            if ($nama_foto && File::exists(public_path('images/artikel/' . $nama_foto))) {
                File::delete(public_path('images/artikel/' . $nama_foto));
            }
            $file = $request->file('foto');
            $nama_foto = time() . '_artikel_' . $file->getClientOriginalName();
            $file->move(public_path('images/artikel'), $nama_foto);
        }

        $artikel->update([
            'judul'            => $request->judul,
            'kategori_artikel' => $request->kategori_artikel, // Update kategori
            'konten'           => $request->konten,
            'penulis'          => $request->penulis,
            'foto'             => $nama_foto
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // ================= 6. PROSES HAPUS (DESTROY) =================
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->foto && File::exists(public_path('images/artikel/' . $artikel->foto))) {
            File::delete(public_path('images/artikel/' . $artikel->foto));
        }

        $artikel->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel beserta foto berhasil dihapus permanen!');
    }
}
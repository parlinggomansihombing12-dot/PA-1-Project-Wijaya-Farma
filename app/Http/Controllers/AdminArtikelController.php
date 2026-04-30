<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\File;

class AdminArtikelController extends Controller
{
    // ================= 1. TAMPIL TABEL (Sudah Benar) =================
    public function index() 
    {
        $artikels = Artikel::latest()->get(); 
        $kategori_artikel = \App\Models\KategoriArtikel::latest()->get();

        return view('admin.Artikel.index', compact('artikels', 'kategori_artikel'));
    }

    // ================= 2. TAMPIL HALAMAN TAMBAH (CREATE) =================
    public function create()
    {
        // AMBIL DATA KATEGORI DARI DATABASE (INI YANG TADI HILANG)
        $kategori_artikel = \App\Models\KategoriArtikel::all();
        
        // KIRIMKAN DATA TERSEBUT KE VIEW
        return view('admin.Artikel.create', compact('kategori_artikel'));
    }

    // ================= 3. PROSES SIMPAN (STORE) BERSAMA FOTO =================
    public function store(Request $request)
    {
        $request->validate([
            'judul'            => 'required|string|max:255',
            'kategori_artikel' => 'required|string|max:100', 
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

        Artikel::create([
            'judul'            => $request->judul,
            'kategori_artikel' => $request->kategori_artikel, 
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
        
        // AMBIL JUGA DATA KATEGORI SAAT MAU EDIT (INI YANG TADI HILANG)
        $kategori_artikel = \App\Models\KategoriArtikel::all();

        // KIRIMKAN KEDUANYA (ARTIKEL & KATEGORI) KE VIEW
        return view('admin.Artikel.edit', compact('artikel', 'kategori_artikel'));
    }

    // ================= 5. PROSES UBAH DATA (UPDATE) & GANTI FOTO =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'            => 'required|string|max:255',
            'kategori_artikel' => 'required|string|max:100',
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
            'kategori_artikel' => $request->kategori_artikel, 
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
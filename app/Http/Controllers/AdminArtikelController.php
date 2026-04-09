<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class AdminArtikelController extends Controller
{
    // 1. TAMPIL TABEL
    public function index() 
    {
        $artikel = Artikel::latest()->get();
        return view('admin.Artikel.index', ['artikels' => $artikel]);
    }

    // 2. TAMPIL HALAMAN TAMBAH (CREATE)
    public function create()
    {
        return view('admin.Artikel.create');
    }

    // 3. PROSES SIMPAN (STORE)
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'penulis' => 'nullable|string|max:100'
        ]);

        Artikel::create($request->all());

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    // 4. TAMPIL HALAMAN EDIT
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.Artikel.edit', compact('artikel'));
    }

    // 5. PROSES UBAH DATA (UPDATE)
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'penulis' => 'nullable|string|max:100'
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->all());

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // 6. PROSES HAPUS (DESTROY)
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
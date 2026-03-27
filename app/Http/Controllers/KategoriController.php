<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\ProfilToko;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $kategori = Kategori::latest()->get();

        return view('admin.kategori.index', [
            'toko' => $toko,
            'list_kategori' => $kategori,
            'title' => 'Manajemen Kategori'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::findOrFail($id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return back()->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();

        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}
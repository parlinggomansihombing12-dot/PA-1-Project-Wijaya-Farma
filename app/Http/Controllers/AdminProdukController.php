<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminProdukController extends Controller
{
    // 🔍 TAMPIL DATA
    public function index()
    {
        $produks = Produk::latest()->get();

        return view('admin.produk.index', compact('produks'));
    }

    // ➕ FORM TAMBAH
    public function create()
    {
        return view('admin.produk.create');
    }

    // 💾 SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        Produk::create([
            'nama_obat' => $request->nama_obat,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk berhasil ditambahkan');
    }

    // ✏️ FORM EDIT
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('admin.produk.edit', compact('produk'));
    }

    // 🔄 UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        $produk = Produk::findOrFail($id);

        $produk->update([
            'nama_obat' => $request->nama_obat,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk berhasil diupdate');
    }

    // 🗑️ HAPUS DATA
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk berhasil dihapus');
    }
}
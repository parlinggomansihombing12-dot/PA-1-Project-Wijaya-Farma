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
        // 1. Validasi Inputan
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi khusus foto
        ]);

        // 2. Proses Upload Foto (Jika ada)
        $nama_foto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Buat nama file unik (waktu_namaasli.ext)
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            // Simpan foto ke folder public/images/produk
            $file->move(public_path('images/produk'), $nama_foto);
        }

        // 3. Simpan ke Database
        Produk::create([
            'nama_obat' => $request->nama_obat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $nama_foto // Simpan nama file fotonya
        ]);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk berhasil ditambahkan');
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
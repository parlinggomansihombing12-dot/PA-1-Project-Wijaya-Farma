<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\File;

class AdminProdukController extends Controller
{
    // 🔍 1. TAMPIL DATA DI TABEL ADMIN
    public function index()
    {
        $produks = Produk::latest()->get();
        return view('admin.produk.index', compact('produks'));
    }

    // ➕ 2. HALAMAN FORM TAMBAH
    public function create()
    {
        return view('admin.produk.create');
    }

    // 💾 3. PROSES SIMPAN DATA & FOTO BARU
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Maksimal 2MB
        ]);

        $nama_foto = null;

        // Proses Upload Foto (Jika ada)
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            // Buat folder jika belum ada, lalu simpan fotonya
            $file->move(public_path('images/produk'), $nama_foto);
        }

        // Simpan ke Database
        Produk::create([
            'nama_obat' => $request->nama_obat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $nama_foto
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // ✏️ 4. HALAMAN FORM EDIT
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    // 🔄 5. PROSES UPDATE DATA & GANTI FOTO
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $produk = Produk::findOrFail($id);
        $nama_foto = $produk->foto; // Ingat nama foto lama

        // Jika admin mengupload foto baru
        if ($request->hasFile('foto')) {
            // Hapus file foto lama dari folder komputer
            if ($nama_foto && File::exists(public_path('images/produk/' . $nama_foto))) {
                File::delete(public_path('images/produk/' . $nama_foto));
            }

            // Upload foto baru
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $nama_foto);
        }

        // Update ke Database
        $produk->update([
            'nama_obat' => $request->nama_obat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $nama_foto
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // 🗑️ 6. PROSES HAPUS DATA & FOTO
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus file foto fisiknya agar memori tidak penuh
        if ($produk->foto && File::exists(public_path('images/produk/' . $produk->foto))) {
            File::delete(public_path('images/produk/' . $produk->foto));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
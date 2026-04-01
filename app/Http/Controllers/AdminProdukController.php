<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori; // TAMBAHKAN INI
use Illuminate\Support\Facades\File;

class AdminProdukController extends Controller
{
    // 🔍 1. TAMPIL DATA DI TABEL ADMIN
    public function index()
    {
        // Menggunakan with('kategori') agar lebih cepat (Eager Loading)
        $produks = Produk::with('kategori')->latest()->get();
        return view('admin.produk.index', compact('produks'));
    }

    // ➕ 2. HALAMAN FORM TAMBAH
    public function create()
    {
        $kategoris = Kategori::all(); // AMBIL SEMUA KATEGORI
        return view('admin.produk.create', compact('kategoris'));
    }

    // 💾 3. PROSES SIMPAN DATA & FOTO BARU
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori_id' => 'required', // VALIDASI KATEGORI WAJIB
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $nama_foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $nama_foto);
        }

        // Simpan ke Database
        Produk::create([
            'nama_obat' => $request->nama_obat,
            'kategori_id' => $request->kategori_id, // SIMPAN ID KATEGORI
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
        $kategoris = Kategori::all(); // AMBIL KATEGORI UNTUK EDIT
        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    // 🔄 5. PROSES UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $produk = Produk::findOrFail($id);
        $nama_foto = $produk->foto;

        if ($request->hasFile('foto')) {
            if ($nama_foto && File::exists(public_path('images/produk/' . $nama_foto))) {
                File::delete(public_path('images/produk/' . $nama_foto));
            }

            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $nama_foto);
        }

        $produk->update([
            'nama_obat' => $request->nama_obat,
            'kategori_id' => $request->kategori_id, // UPDATE KATEGORI
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $nama_foto
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->foto && File::exists(public_path('images/produk/' . $produk->foto))) {
            File::delete(public_path('images/produk/' . $produk->foto));
        }
        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
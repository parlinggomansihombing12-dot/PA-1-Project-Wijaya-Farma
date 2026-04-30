<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori; 
use Illuminate\Support\Facades\File;

class AdminProdukController extends Controller
{
    // ================= 1. TAMPIL DATA =================
    public function index()
    {
        $produks = Produk::latest()->get();
        return view('admin.produk.index', compact('produks'));
    }

    // ================= 2. HALAMAN TAMBAH =================
    public function create()
    {
        // 1. Ambil SEMUA data kategori dari database
        $kategoris = \App\Models\Kategori::all(); 

        // 2. Kirim variabel $kategoris tersebut ke halaman form
        return view('admin.produk.create', compact('kategoris'));
    }

    // ================= 3. PROSES SIMPAN =================
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat'   => 'required|string|max:255',
            'kategori_id' => 'required|integer',
            'harga'       => 'required|numeric|min:1|max:99000000', // BATAS MAX 99 JUTA
            'stok'        => 'required|numeric|min:0|max:10000',    // BATAS MAX STOK 10.000
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072'
        ], [
            'harga.max' => 'Harga obat tidak boleh lebih dari Rp 99.000.000!',
            'stok.max'  => 'Stok obat tidak boleh lebih dari 10.000 pcs!',
        ]);

        $nama_file = null;

        if ($request->hasFile('foto')) {
            $nama_file = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images/produk'), $nama_file);
        }

        Produk::create([
            'nama_obat'   => $request->nama_obat,
            'kategori_id' => $request->kategori_id,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'deskripsi'   => $request->deskripsi,
            'foto'        => $nama_file,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // ================= 4. HALAMAN FORM EDIT =================
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        
        // 1. Ambil JUGA data kategori saat mau edit
        $kategoris = \App\Models\Kategori::all();

        // 2. Kirim KEDUA variabel ke halaman edit
        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    // ================= 5. PROSES UPDATE =================
    public function update(Request $request, $id)
    {
        // TERAPKAN VALIDASI YANG SAMA DI PROSES EDIT:
        $request->validate([
            'nama_obat'   => 'required|string|max:255',
            'kategori_id' => 'required|integer',
            'harga'       => 'required|numeric|min:1|max:99000000', 
            'stok'        => 'required|numeric|min:0|max:10000',   
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072'
        ], [
            'harga.max' => 'Harga obat tidak boleh lebih dari Rp 99.000.000!',
            'stok.max'  => 'Stok obat tidak boleh lebih dari 10.000 pcs!',
        ]);

        $produk = Produk::findOrFail($id);
        $nama_file = $produk->foto;

        if ($request->hasFile('foto')) {
            if ($nama_file && File::exists(public_path('images/produk/' . $nama_file))) {
                File::delete(public_path('images/produk/' . $nama_file));
            }
            $nama_file = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images/produk'), $nama_file);
        }

        $produk->update([
            'nama_obat'   => $request->nama_obat,
            'kategori_id' => $request->kategori_id,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'deskripsi'   => $request->deskripsi,
            'foto'        => $nama_file,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // ================= 6. HAPUS DATA =================
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto && File::exists(public_path('images/produk/' . $produk->foto))) {
            File::delete(public_path('images/produk/' . $produk->foto));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk dan foto berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
<<<<<<< HEAD
use App\Models\Kategori; 
=======
use App\Models\Kategori;
>>>>>>> 66601765ea31b82f93cf56b08b2fde51ac861ae6
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
        // 1. Validasi
        $request->validate([
            'nama_obat' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // 2. Upload Foto (Jika ada)
        $nama_file = null;
        if ($request->hasFile('foto')) {
            $nama_file = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images/produk'), $nama_file);
        }

        // 3. Simpan ke Database
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

<<<<<<< HEAD
    // 3. Simpan ke Database
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

=======
>>>>>>> 66601765ea31b82f93cf56b08b2fde51ac861ae6
    // ✏️ 4. HALAMAN FORM EDIT
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all(); 
        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    // 🔄 5. PROSES UPDATE DATA
<<<<<<< HEAD
public function update(Request $request, $id)
{
    $request->validate([
        'nama_obat' => 'required|string|max:255',
        'kategori_id' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'deskripsi' => 'required', 
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);
=======
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
>>>>>>> 66601765ea31b82f93cf56b08b2fde51ac861ae6

        $produk = Produk::findOrFail($id);
        $nama_foto = $produk->foto;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($nama_foto && File::exists(public_path('images/produk/' . $nama_foto))) {
                File::delete(public_path('images/produk/' . $nama_foto));
            }

            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $nama_foto);
        }

        $produk->update([
            'nama_obat' => $request->nama_obat,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $nama_foto
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // 🗑️ 6. PROSES HAPUS DATA (Fungsi yang sebelumnya kurang)
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus file foto dari folder public jika ada
        if ($produk->foto && File::exists(public_path('images/produk/' . $produk->foto))) {
            File::delete(public_path('images/produk/' . $produk->foto));
        }

        // Hapus data dari database
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
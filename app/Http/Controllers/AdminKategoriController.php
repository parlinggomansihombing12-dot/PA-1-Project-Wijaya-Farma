<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\File; // INI WAJIB ADA AGAR BISA HAPUS FOTO!

class AdminKategoriController extends Controller
{
    // ================= 1. INDEX (Menampilkan Tabel Kategori) =================
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('admin.Kategori.index', compact('kategoris'));
    }

    // ================= 2. CREATE (Menampilkan Form Tambah) =================
    public function create()
    {
        return view('admin.Kategori.create');
    }

    // ================= 3. STORE (SIMPAN DATA + FOTO!) =================
     public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048' // WAJIB ADA!
        ]);

        $nama_foto = null;

        // INILAH LOGIKA MENGAMBIL FOTO YANG HILANG DARI KODE ANDA:
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_kat_' . $file->getClientOriginalName();
            $file->move(public_path('images/kategori'), $nama_foto);
        }

        // SIMPAN KE DATABASE
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
            'foto'          => $nama_foto 
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori baru dan fotonya berhasil ditambahkan!');
    }

    // ================= 4. EDIT (Menampilkan Form Edit) =================
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.Kategori.edit', compact('kategori'));
    }

    // ================= 5. UPDATE (UBAH DATA + GANTI FOTO LAMA!) =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048'
        ]);

        $kategori = Kategori::findOrFail($id);
        
        // Simpan ingatan nama foto yang lama
        $nama_foto = $kategori->foto; 

        // INILAH LOGIKA GANTI FOTO YANG HILANG DARI KODE ANDA:
        if ($request->hasFile('foto')) {
            
            // Hapus yang lama dari komputer agar harddisk tidak penuh
            if ($nama_foto && File::exists(public_path('images/kategori/' . $nama_foto))) {
                File::delete(public_path('images/kategori/' . $nama_foto));
            }
            
            // Masukkan yang baru
            $file = $request->file('foto');
            $nama_foto = time() . '_kat_' . $file->getClientOriginalName();
            $file->move(public_path('images/kategori'), $nama_foto);
        }

        // SIMPAN PERUBAHAN KE DATABASE
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
            'foto'          => $nama_foto // WAJIB ADA!
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori dan fotonya berhasil diperbarui!');
    }

    // ================= 6. DESTROY (Menghapus Data) =================
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        
        // HAPUS FILE FISIKNYA SEKALIAN SEBELUM DATA DI DATABASE DIHAPUS
        if ($kategori->foto && File::exists(public_path('images/kategori/' . $kategori->foto))) {
            File::delete(public_path('images/kategori/' . $kategori->foto));
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori beserta fotonya berhasil dimusnahkan!');
    }
}
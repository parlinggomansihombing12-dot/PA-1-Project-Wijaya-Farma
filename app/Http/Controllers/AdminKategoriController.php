<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class AdminKategoriController extends Controller
{
    // 1. TAMPIL DATA DI TABEL ADMIN
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('admin.Kategori.index', compact('kategoris'));
    }

    // 2. HALAMAN FORM TAMBAH
    public function create()
    {
        return view('admin.Kategori.create');
    }

    // 3. PROSES SIMPAN DATA
   // ... bagian atas tetap sama ...

public function store(Request $request)
{
    $request->validate([
        'nama_kategori' => 'required|string|max:255',
        'icon' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048', // Validasi Icon
        'deskripsi' => 'nullable|string'
    ]);

    $data = $request->all();

    // Logika Upload Icon
    if ($request->hasFile('icon')) {
        $file = $request->file('icon');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('images/kategori'), $nama_file);
        $data['icon'] = $nama_file;
    }

    Kategori::create($data);
    return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_kategori' => 'required|string|max:255',
        'icon' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        'deskripsi' => 'nullable|string'
    ]);

    $kategori = Kategori::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('icon')) {
        // Hapus icon lama jika ada
        if ($kategori->icon && file_exists(public_path('images/kategori/' . $kategori->icon))) {
            unlink(public_path('images/kategori/' . $kategori->icon));
        }
        
        $file = $request->file('icon');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('images/kategori'), $nama_file);
        $data['icon'] = $nama_file;
    }

    $kategori->update($data);
    return redirect()->route('admin.kategori.index')->with('success', 'Kategori diperbarui!');
}

public function destroy($id)
{
    $kategori = Kategori::findOrFail($id);
    // Hapus file gambar dari folder
    if ($kategori->icon && file_exists(public_path('images/kategori/' . $kategori->icon))) {
        unlink(public_path('images/kategori/' . $kategori->icon));
    }
    $kategori->delete();
    return redirect()->route('admin.kategori.index')->with('success', 'Kategori dihapus!');
   }
}
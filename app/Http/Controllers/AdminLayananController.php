<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\File; // Wajib dipanggil untuk hapus foto lama

class AdminLayananController extends Controller
{
    // ================= 1. TAMPIL TABEL LAYANAN =================
    public function index() 
    {
        $layanans = Layanan::latest()->get();
        // Pastikan nama variabel yang dikirim ke view sama dengan yang ada di view admin Anda
        return view('admin.layanan.index', compact('layanans'));
    }

    // ================= 2. HALAMAN TAMBAH =================
    public function create()
    {
        return view('admin.layanan.create');
    }

    // ================= 3. PROSES SIMPAN FOTO BARU =================
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072' // Max 3MB
        ]);

        $nama_foto = null;

        // INI KUNCINYA: Pastikan setiap foto disimpan dengan nama yang UNIK
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Menambahkan time() dan uniqid() agar nama file tidak pernah kembar
            $nama_foto = time() . '_' . uniqid() . '_layanan.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/layanan'), $nama_foto);
        }

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi'    => $request->deskripsi,
            'foto'         => $nama_foto // Pastikan kolom database Anda bernama 'foto' (bukan ikon)
        ]);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // ================= 4. HALAMAN EDIT =================
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    // ================= 5. PROSES UBAH DATA & FOTO LAMA =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072'
        ]);

        $layanan = Layanan::findOrFail($id);
        $nama_foto = $layanan->foto; // Ingat nama foto lamanya

        if ($request->hasFile('foto')) {
            // Hapus file lama dari komputer
            if ($nama_foto && File::exists(public_path('images/layanan/' . $nama_foto))) {
                File::delete(public_path('images/layanan/' . $nama_foto));
            }
            
            // Upload foto baru
            $file = $request->file('foto');
            $nama_foto = time() . '_' . uniqid() . '_layanan.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/layanan'), $nama_foto);
        }

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi'    => $request->deskripsi,
            'foto'         => $nama_foto
        ]);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    // ================= 6. HAPUS DATA & FOTO =================
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->foto && File::exists(public_path('images/layanan/' . $layanan->foto))) {
            File::delete(public_path('images/layanan/' . $layanan->foto));
        }

        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus!');
    }
}
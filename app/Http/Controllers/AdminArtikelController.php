<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\File; // Wajib dipanggil untuk fitur hapus file fisik

class AdminArtikelController extends Controller
{
    // ================= 1. TAMPIL TABEL =================
    public function index() 
    {
        $artikels = Artikel::latest()->get(); // Diubah jadi $artikels agar sesuai standar
        return view('admin.Artikel.index', compact('artikels'));
    }

    // ================= 2. TAMPIL HALAMAN TAMBAH (CREATE) =================
    public function create()
    {
        return view('admin.Artikel.create');
    }

    // ================= 3. PROSES SIMPAN (STORE) BERSAMA FOTO =================
    public function store(Request $request)
    {
        // Validasi inputan (tambahkan validasi foto)
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required|string',
            'penulis' => 'nullable|string|max:100',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072' // Validasi file gambar maks 3MB
        ]);

        $nama_foto = null;

        // Proses jika Admin meng-upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Buat nama file unik: waktu_saat_ini_artikel_namafileasli.jpg
            $nama_foto = time() . '_artikel_' . $file->getClientOriginalName();
            
            // Pindahkan file asli ke folder komputer (public/images/artikel)
            $file->move(public_path('images/artikel'), $nama_foto);
        }

        // Simpan semua data ke database
        Artikel::create([
            'judul'   => $request->judul,
            'konten'  => $request->konten,
            'penulis' => $request->penulis,
            'foto'    => $nama_foto // Masukkan nama foto ke kolom database
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel beserta foto berhasil diterbitkan!');
    }

    // ================= 4. TAMPIL HALAMAN EDIT =================
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.Artikel.edit', compact('artikel'));
    }

    // ================= 5. PROSES UBAH DATA (UPDATE) & GANTI FOTO =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required|string',
            'penulis' => 'nullable|string|max:100',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072'
        ]);

        $artikel = Artikel::findOrFail($id);
        
        // Simpan nama foto lama sebagai default (jika Admin tidak upload foto baru)
        $nama_foto = $artikel->foto; 

        // Proses jika Admin MENGGANTI foto dengan yang baru
        if ($request->hasFile('foto')) {
            
            // Hapus file foto yang lama dari folder agar memori tidak penuh
            if ($nama_foto && File::exists(public_path('images/artikel/' . $nama_foto))) {
                File::delete(public_path('images/artikel/' . $nama_foto));
            }
            
            // Upload foto yang baru
            $file = $request->file('foto');
            $nama_foto = time() . '_artikel_' . $file->getClientOriginalName();
            $file->move(public_path('images/artikel'), $nama_foto);
        }

        // Update data ke database
        $artikel->update([
            'judul'   => $request->judul,
            'konten'  => $request->konten,
            'penulis' => $request->penulis,
            'foto'    => $nama_foto // Update dengan nama foto baru (atau tetap foto lama)
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // ================= 6. PROSES HAPUS (DESTROY) =================
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // PENTING: Hapus file foto fisiknya dari folder komputer saat artikel dihapus
        if ($artikel->foto && File::exists(public_path('images/artikel/' . $artikel->foto))) {
            File::delete(public_path('images/artikel/' . $artikel->foto));
        }

        // Hapus data dari database
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel beserta foto berhasil dihapus permanen!');
    }
}
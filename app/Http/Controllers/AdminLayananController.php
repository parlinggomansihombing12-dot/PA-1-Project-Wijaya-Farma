<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk mengelola file

class AdminLayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::latest()->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
            'deskripsi' => 'required',
        ]);

        // Proses Upload Foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('layanan', 'public');
        }

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'foto' => $fotoPath, // Simpan path foto
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'nama_layanan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Foto opsional saat update
            'deskripsi' => 'required',
        ]);

        $data = [
            'nama_layanan' => $request->nama_layanan,
            'deskripsi' => $request->deskripsi,
        ];

        // Jika ada foto baru yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($layanan->foto) {
                Storage::disk('public')->delete($layanan->foto);
            }
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diupdate');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        // Hapus file foto dari storage sebelum hapus data dari database
        if ($layanan->foto) {
            Storage::disk('public')->delete($layanan->foto);
        }

        $layanan->delete();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus');
    }
}
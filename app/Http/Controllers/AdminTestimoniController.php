<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\ProfilToko;
use Illuminate\Http\Request;

class AdminTestimoniController extends Controller
{
    // ================= 1. INDEX (TAMPILKAN TABEL ADMIN) =================
    public function index()
    {
        $toko = ProfilToko::first();
        
        // Tampilkan yang 'pending' di urutan paling atas agar Admin cepat lihat
        // Sisanya diurutkan berdasarkan yang terbaru
        $testimonis = Testimoni::orderByRaw("FIELD(status, 'pending', 'approved')")->latest()->get();

        return view('admin.Testimoni.index', compact('toko', 'testimonis'));
    }

    // ================= 2. STORE (JIKA ADMIN INGIN NAMBAH SENDIRI) =================
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'komentar'       => 'required',
            'rating'         => 'required|integer|min:1|max:5',
        ]);

        // Testimoni buatan admin otomatis langsung berstatus 'approved'
        Testimoni::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'komentar'       => $request->komentar,
            'rating'         => $request->rating,
            'status'         => 'approved' 
        ]);

        return back()->with('success', 'Testimoni buatan Admin berhasil ditambahkan & langsung tayang!');
    }

    // ================= UPDATE (FUNGSI PERSETUJUAN / APPROVAL) =================
    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // KITA PAKAI LOGIKA TOGGLE (SAKLAR) YANG LEBIH TEGAS
        if ($testimoni->status === 'pending') {
            
            // UBAH JADI APPROVED
            $testimoni->status = 'approved';
            $testimoni->save(); // Simpan paksa ke database
            
            $pesan = 'Testimoni disetujui! Sekarang tampil di halaman publik.';
            
        } else {
            
            // UBAH KEMBALI JADI PENDING (UNPUBLISH)
            $testimoni->status = 'pending';
            $testimoni->save(); // Simpan paksa ke database
            
            $pesan = 'Testimoni disembunyikan dari halaman publik.';
        }

        return redirect()->back()->with('success', $pesan);
    }

    // ================= 4. DELETE (TOLAK / HAPUS SPAM) =================
    public function destroy($id)
    {
        Testimoni::findOrFail($id)->delete();

        return back()->with('success', 'Testimoni berhasil dihapus permanen!');
    }
}
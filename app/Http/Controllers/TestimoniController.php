<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\ProfilToko;

class TestimoniController extends Controller
{
    // ================= 1. TAMPILKAN HALAMAN TESTIMONI =================
    public function index()
    {
        $toko = ProfilToko::first();
        
        // KUNCI RAHASIANYA DI SINI:
        // HANYA ambil testimoni yang berstatus 'approved'
        // Jika statusnya 'pending', sembunyikan dari pengunjung!
        $list_testimoni = Testimoni::where('status', 'approved')->latest()->get();

        return view('testimoni', [
            'toko' => $toko,
            'list_testimoni' => $list_testimoni
        ]);
    }

    // ================= 2. PENGUNJUNG MENGIRIM TESTIMONI BARU =================
    public function store(Request $request)
    {
        // 1. Validasi Inputan Pengunjung
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'komentar'       => 'required|string',
            'rating'         => 'required|integer|min:1|max:5',
        ]);

        // 2. Simpan ke Database dengan status PENDING
        Testimoni::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'komentar'       => $request->komentar,
            'rating'         => $request->rating,
            'status'         => 'pending' // Otomatis disembunyikan sampai disetujui Admin
        ]);

        // 3. Kembalikan pengunjung ke halaman testimoni dengan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih! Ulasan Anda telah terkirim dan sedang menunggu persetujuan Admin.');
    }
}
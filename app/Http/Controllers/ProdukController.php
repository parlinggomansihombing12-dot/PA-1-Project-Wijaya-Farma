<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProfilToko;
// use App\Models\Kategori; // (Jika teman Anda membutuhkannya nanti, tinggal buka garis miring ini)

class ProdukController extends Controller
{
    /**
     * MENAMPILKAN HALAMAN KATALOG SEMUA PRODUK (Pengunjung Biasa)
     */
    public function index(Request $request)
    {
        // 1. Ambil data Apotek (Sangat penting untuk Footer / Slogan)
        $toko = ProfilToko::first();

        // 2. Siapkan wadah query Produk (Menyertakan relasi kategori agar ringan dan tak perlu load 2 kali)
        $query = Produk::with('kategori');

        // 3. FITUR PENCARIAN BERBASIS TEKS (Jika pengunjung ngetik nama obat)
        if ($request->has('cari') && $request->cari != '') {
            $query->where('nama_obat', 'like', '%' . $request->cari . '%')
                  // Tambahkan baris di bawah ini JIKA Anda punya kolom deskripsi dan ingin ikut dicari:
                  ->orWhere('deskripsi', 'like', '%' . $request->cari . '%');
        }

        // 4. MENGAMBIL DATA PRODUK FINAL & DIPOTONG-POTONG (PAGINATION)
        // Kita limit 12 Produk per halaman.
        // Fungsi appends($request->all()) sangat vital agar saat klik halaman 2, hasil pencariannya (filter) tidak me-reset!
        $list_produk = $query->latest()->paginate(12)->appends($request->all()); 

        // 5. Kembalikan ke halaman (resources/views/produk.blade.php)
        return view('produk', [
            'toko' => $toko,
            'list_produk' => $list_produk
        ]);
    }

    /**
     * MENAMPILKAN HALAMAN BACA DETAIL SATU PRODUK (Saat tombol Detail / Beli diklik)
     */
    public function show($id)
    {
        // 1. Ambil data Apotek (Untuk informasi Peringatan bahwa Apotek cuma jual offline)
        $toko = ProfilToko::first();

        // 2. Ambil data 1 jenis obat yang diklik (Tarik bersama data kategorinya)
        // Fungsi findOrFail() sangat pintar: Jika ada hacker mengetik ID produk yg sudah dihapus, Laravel akan melempar halaman "404 Not Found" otomatis.
        $item = Produk::with('kategori')->findOrFail($id);

        // 3. Tampilkan ke file halaman detail (resources/views/produk_details.blade.php)
        return view('produk_details', [
            'toko' => $toko,
            'item' => $item
        ]);
    }
}
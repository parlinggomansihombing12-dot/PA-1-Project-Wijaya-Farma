<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko;

class KontakController extends Controller
{
    public function index()
    {
        // Mengambil data pertama dari tabel ProfilToko
        $toko = ProfilToko::first();

        // Jika data di database masih kosong, gunakan data default (Fallback)
        // Ini mencegah website error saat pertama kali dijalankan
        if (!$toko) {
            $toko = (object) [
                'alamat' => 'Jl. Lintas Porsea - Laguboti, Kecamatan Sigumpar, Kab. Toba',
                'no_hp'  => '6282370771069',
                'email'  => 'sitohangyesika8@gmail.com',
                'jam_operasional' => 'Senin - Sabtu: 08.00 - 21.00',
                'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.5186082218764!2d99.14589257404675!3d2.332029757601441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0460391216f5%3A0x470876793663806a!2sSigumpar%2C%20Toba%2C%20North%20Sumatra!5e0!3m2!1sen!2sid!4v1710000000000!5m2!1sen!2sid'
            ];
        }

        // Jika Anda ingin memastikan data jam_operasional dan map_url selalu ada 
        // meskipun data toko sudah ada di DB (tapi kolom tersebut mungkin kosong/null)
        if (isset($toko->id)) {
            $toko->jam_operasional = $toko->jam_operasional ?? 'Senin - Sabtu: 08.00 - 21.00';
            $toko->map_url = $toko->map_url ?? 'https://www.google.com/maps/embed?pb=...';
        }

        return view('kontak', compact('toko'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\ProfilToko;

class LayananController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $layanan = Layanan::all();

        // MENGARAH KE HALAMAN PENGUNJUNG (Bukan admin.layanan)
        return view('layanan',[
            'toko' => $toko,
            'list_layanan' => $layanan
        ]);
    }
}
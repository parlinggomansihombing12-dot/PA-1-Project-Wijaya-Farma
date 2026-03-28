<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko;

class KontakController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();

        if (!$toko) {
            $toko = (object) [
                'alamat' => 'Jl. Lintas Porsea - Laguboti, Kecamatan Sigumpar, Kab. Toba',
                'no_hp'  => '6282370771069',
                'email'  => 'sitohangyesika8@gmail.com',
            ];
        }

        return view('kontak', compact('toko'));
    }
}
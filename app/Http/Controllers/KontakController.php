<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProfilToko;

class KontakController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        return view('kontak', ['toko' => $toko]);
    }
}
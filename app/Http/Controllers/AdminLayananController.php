<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class AdminLayananController extends Controller
{
    public function index() 
    {
        $layanan = Layanan::all();
        
        // RAHASIANYA DI SINI: Harus pakai titik (admin.layanan)
        return view('admin.layanan', ['list_layanan' => $layanan]);
    }
}
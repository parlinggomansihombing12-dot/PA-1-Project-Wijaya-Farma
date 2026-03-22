<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategori; // Panggil model Kategori

class AdminKategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori', ['list_kategori' => $kategori]);
    }
}
<?php

namespace App\Models;

// INI YANG TADI TERLEWATKAN (Wajib ada agar HasFactory bisa bekerja)
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    use HasFactory;
    
    // Mengizinkan penyimpanan nama kategori
    protected $fillable = ['nama_kategori'];
}
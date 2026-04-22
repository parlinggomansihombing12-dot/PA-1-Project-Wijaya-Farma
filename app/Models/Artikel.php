<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    // INILAH KUNCI RAHASIANYA! 🗝️
    // Kita MENGIZINKAN Laravel untuk mengisi kolom-kolom ini ke database.
    // Jika nama kolom di database Anda berbeda (misal: 'deskripsi' bukan 'ringkasan'), sesuaikan saja.
    protected $fillable = [
        'judul',
        'kategori_artikel', 
        'ringkasan',
        'konten',
        'penulis',
        'foto', // Tambahkan jika nanti Artikel Anda punya fitur upload foto sendiri
    ];
}
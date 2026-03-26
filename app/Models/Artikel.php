<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi secara massal (Mass Assignable)
     * Sesuaikan dengan field yang ada di migrasi tabel 'artikels' kamu
     */
    protected $fillable = [
        'judul',
        'konten',
        'penulis',
        // Jika kamu ada kolom gambar/foto artikel, tambahkan juga di sini:
        // 'gambar',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi (Mass Assignable)
     * Sesuaikan dengan field yang ada di tabel 'layanans' kamu
     */
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'ikon',
        // Jika di database kamu ada kolom harga/stok, tambahkan di sini:
        // 'harga',
        // 'stok',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // INI DIA KUNCINYA! Izin resmi ke database untuk memasukkan foto
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'foto' 
    ];

    // JIKA ANDA PUNYA KODE RELASI DI BAWAHNYA, BIARKAN SAJA SEPERTI INI:
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
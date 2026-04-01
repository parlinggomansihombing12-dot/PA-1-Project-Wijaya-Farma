<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama_obat',
        'harga',
        'stok',
        'foto',
        'kategori_id',
        'deskripsi',
    ];

    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kategori_id');
}
}
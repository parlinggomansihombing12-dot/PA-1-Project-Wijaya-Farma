<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    
    // Izin simpan data ke kolom ini
    // SAYA SUDAH MENAMBAHKAN KATA 'foto' DI SINI! (INI KUNCI KESUKSESANNYA!)
    protected $fillable = ['nama_kategori', 'deskripsi', 'foto']; 

    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilToko extends Model
{
    use HasFactory;

    // PASTIKAN SEMUA NAMA KOLOM INI ADA DI DALAM SINI
   protected $fillable = [
        'nama_toko', 'deskripsi', 'alamat', 'no_hp', 'email', 
        'foto_toko', 'sejarah', 'visi', 'misi', 
        'jam_operasional', 'map_url' // <--- DUA INI BARU DITAMBAHKAN
    ];
}
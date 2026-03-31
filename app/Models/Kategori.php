<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    
    // Izin simpan data ke kolom ini
    protected $fillable = ['nama_kategori', 'deskripsi']; 
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profil_tokos', function (Blueprint $table) {
            $table->string('foto_toko')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            
            // BARIS DI BAWAH INI DIHAPUS karena sudah ada di file migrasi awal (create_profil_tokos_table)
            // $table->text('deskripsi')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_tokos', function (Blueprint $table) {
            // Sebaiknya tambahkan dropColumn agar saat rollback database kembali bersih
            $table->dropColumn(['foto_toko', 'sejarah', 'visi', 'misi']);
        });
    }
};
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
    Schema::table('produks', function (Blueprint $table) {
        // Tambahkan kolom kategori_id setelah kolom id
        $table->unsignedBigInteger('kategori_id')->nullable()->after('id');
        
        // Opsional: Buat relasi ke tabel kategoris
        $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('produks', function (Blueprint $table) {
        $table->dropForeign(['kategori_id']);
        $table->dropColumn('kategori_id');
    });
  }
};

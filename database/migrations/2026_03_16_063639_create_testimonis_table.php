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
    Schema::create('testimonis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pelanggan');
        $table->text('komentar');
        $table->integer('rating')->default(5); // Angka 1 sampai 5 untuk bintang
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};

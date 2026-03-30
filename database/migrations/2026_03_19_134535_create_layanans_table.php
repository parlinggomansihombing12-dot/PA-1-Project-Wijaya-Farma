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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();

            $table->string('nama_layanan');
            $table->text('deskripsi');

            // Ikon bisa emoji atau FontAwesome
            $table->string('ikon')->default('fa-pills');

            // Optional (biar bisa urutkan layanan nanti)
            $table->integer('urutan')->default(0);

            // Optional (aktif/nonaktif layanan)
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
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
        Schema::create('kategori_lapangan', function (Blueprint $table) {
            $table->increments('id_katlapangan');
            $table->string('nama_katlapangan');
            $table->integer('id_lokasi');
            $table->integer('harga_katlapangan')->default(55000);
            $table->string('file_katlapangan')->nullable();
            $table->time('waktu_buka');
            $table->time('waktu_tutup');
            $table->string('created_by');
            $table->string('update_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_lapangan');
    }
};

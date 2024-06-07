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
        Schema::create('pengumuman_olahraga', function (Blueprint $table) {
            $table->increments('id_pengumuman');
            $table->string('nama_pengumuman');
            $table->string('isi_pengumuman');
            $table->string('file_pengumuman');
            $table->datetime('waktu_aktif_pengumuman');
            $table->string('created_by');
            $table->string('update_by');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman_olahraga');
    }
};

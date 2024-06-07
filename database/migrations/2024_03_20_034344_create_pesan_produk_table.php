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
        Schema::create('pesan_produk', function (Blueprint $table) {
            $table->increments('id_pesan_produk');
            $table->integer('id_user');
            $table->integer('id_produkolahraga');
            $table->integer('jumlah');
            $table->timestamp('waktu_pesan');
            $table->string('status');
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
        Schema::dropIfExists('pesan_produk');
    }
};

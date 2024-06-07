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
        Schema::create('produk_olahraga', function (Blueprint $table) {
            $table->increments('id_produkolahraga');
            $table->string('nama_produkolahraga');
            $table->integer('harga_produkolahraga');
            $table->string('file_olahraga')->nullable();
            $table->integer('stok_produkolahraga');
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
        Schema::dropIfExists('produk_olahraga');
    }
};

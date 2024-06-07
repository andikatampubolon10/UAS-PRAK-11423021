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
        Schema::create('booking_olahraga', function (Blueprint $table) {
            $table->increments('id_booking_olahraga');
            $table->integer('id_user');
            $table->integer('id_katlapangan');
            $table->date('tanggal_booking');
            $table->time('waktu_mulai_booking');
            $table->time('waktu_selesai_booking');
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
        Schema::dropIfExists('booking_olahraga');
    }
};

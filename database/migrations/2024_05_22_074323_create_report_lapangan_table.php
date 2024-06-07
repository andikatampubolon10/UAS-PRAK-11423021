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
        Schema::create('report_lapangan', function (Blueprint $table) {
            $table->increments('id_report_lapangan');
            $table->integer('id_katlapangan');
            $table->integer('id_booking_olahraga');
            $table->integer('id_user');
            $table->string('update_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_lapangan');
    }
};

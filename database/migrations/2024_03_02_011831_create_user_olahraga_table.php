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
        Schema::create('user_olahraga', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('role');
            $table->string('created_by');
            $table->string('update_by');
            $table->datetime('last_login');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_olahraga');
    }
};

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
        Schema::create('akun_peternak', function (Blueprint $table) {
            $table->increments('id_peternak');
            $table->string('nama_peternak');
            $table->string('no_handphone')->nullable();
            $table->string('alamat')->nullable();
            $table->string('password');
            $table->string('email');
            $table->string('username')->unique();
            $table->string('status_akun')->default('STANDARD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

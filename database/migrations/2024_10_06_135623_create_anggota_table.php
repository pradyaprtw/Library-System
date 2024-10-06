<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->string('email')->unique();
            $table->date('tanggal_daftar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota');
    }
};

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
        Schema::rename('anggota', 'users'); // Mengganti nama tabel dari 'anggota' menjadi 'users'
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::rename('users', 'anggota'); // Mengembalikan nama tabel dari 'users' ke 'anggota'
    }
    
};

<?php   

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */ 
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {        
            DB::statement('ALTER TABLE peminjaman MODIFY COLUMN status ENUM("Menunggu Konfirmasi", "Dipinjam", "Dikembalikan") DEFAULT "Menunggu Konfirmasi"');
        });
    }

    /**
     * Reverse the migrations.
     */ 
    public function down(): void
    {        
        Schema::table('peminjaman', function (Blueprint $table) {
            DB::statement('ALTER TABLE peminjaman MODIFY COLUMN status ENUM("Menunggu Konfirmasi", "Dipinjam", "Dikembalikan") DEFAULT "Menunggu Konfirmasi"');
        });
    }
};
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClearOldDataKategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Nonaktifkan foreign key checks
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
       // Hapus data dari tabel
       DB::table('buku')->truncate();
       DB::table('kategori')->truncate();
       
       // Aktifkan kembali foreign key checks
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');
   }
}

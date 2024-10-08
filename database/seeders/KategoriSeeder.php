<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'horror',
            'action',
            'romance',
            'academic'
        ];

        foreach ($data as $kategoriNama) {
            $kategori = new Kategori();
            $kategori->nama_kategori = $kategoriNama;
            $kategori->save();
        }
        
    }
}

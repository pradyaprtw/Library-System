<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku')->insert([
            [
                'judul_buku' => 'Ronggeng Dukuh Paruk',
                'penulis' => 'Ahmad Tohari',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => '1982',  // Format tahun yang benar
                'id_kategori' => '5',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 1.jpeg',
            ],
            [
                'judul_buku' => 'Danur',
                'penulis' => 'Risa Saraswati',
                'penerbit' => 'Bukune',
                'tahun_terbit' => '2011',  // Format tahun yang benar
                'id_kategori' => '4',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 2.jpeg',
            ],
            [
                'judul_buku' => 'The Case Book of Sherlock Holmes',
                'penulis' => 'Arthur Conan Doyle',
                'penerbit' => 'John Murray',
                'tahun_terbit' => '1927',  // Format tahun yang benar
                'id_kategori' => '3',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 3.jpeg',
            ],
            [
                'judul_buku' => 'Bumi',
                'penulis' => 'Tere Liye',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => '2014',  // Format tahun yang benar
                'id_kategori' => '2',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 4.jpeg',
            ],
            [
                'judul_buku' => 'Ayat-ayat Cinta',
                'penulis' => 'Habiburrahman El Shirazy',
                'penerbit' => 'Republika dan Pesantren Basmala Indonesia',
                'tahun_terbit' => '2004',  // Format tahun yang benar
                'id_kategori' => '1',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 5.jpeg',
            ],
            [
                'judul_buku' => 'Ayah',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => '2015',  // Format tahun yang benar
                'id_kategori' => '6',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 6.jpeg',
            ],
            [
                'judul_buku' => 'Pendidikan Kaum Tertindas (Pedagogy of the Oppressed)',
                'penulis' => 'Paulo Freire',
                'penerbit' => 'LP3ES (terjemahan Bahasa Indonesia)',
                'tahun_terbit' => '2000',  // Format tahun yang benar
                'id_kategori' => '7',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 7.jpeg',
            ],
            [
                'judul_buku' => 'The Three-Body Problem',
                'penulis' => 'Liu Cixin',
                'penerbit' => 'Tor Books',
                'tahun_terbit' => '2008',  // Format tahun yang benar
                'id_kategori' => '8',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 8.jpeg',
            ],
            [
                'judul_buku' => 'Pergi',
                'penulis' => 'Tere Liye',
                'penerbit' => 'Republika Penerbit',
                'tahun_terbit' => '2018',  // Format tahun yang benar
                'id_kategori' => '9',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 9.jpeg',
            ],
            [
                'judul_buku' => 'Steve Jobs',
                'penulis' => 'Walter Isaacson',
                'penerbit' => 'Simon & Schuster',
                'tahun_terbit' => '2011',  // Format tahun yang benar
                'id_kategori' => '10',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 10.jpeg',
            ],
            [
                'judul_buku' => 'Real Face',
                'penulis' => 'Chinen Mikito',
                'penerbit' => 'Penerbit Haru',
                'tahun_terbit' => '2021',  // Hanya tahun
                'id_kategori' => '13',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 11.jpeg',
            ],
            [
                'judul_buku' => 'Koala Kumal',
                'penulis' => 'Raditya Dika',
                'penerbit' => 'Kawah Media',
                'tahun_terbit' => '2017',  // Hanya tahun
                'id_kategori' => '12',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 12.jpeg',
            ],
            [
                'judul_buku' => 'My Capricorn Friend',
                'penulis' => 'OTSUICHI/MASARU MIYOKAWA',
                'penerbit' => 'm&c!',
                'tahun_terbit' => '2022',  // Hanya tahun
                'id_kategori' => '11',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 13.jpeg',
            ],
            [
                'judul_buku' => 'Almond',
                'penulis' => 'Sohn Won - Pyung',
                'penerbit' => 'Gramedia Widiasarana Indonesia',
                'tahun_terbit' => '2019',  // Hanya tahun
                'id_kategori' => '15',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 14.jpeg',
            ],
            [
                'judul_buku' => 'Paradise',
                'penulis' => 'LITTLEUKIYO, DKK',
                'penerbit' => 'Aria Media Mandiri',
                'tahun_terbit' => '2021',  // Hanya tahun
                'id_kategori' => '14',
                'stok' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'foto' => 'images/Buku 15.jpeg',
            ],
        ]);
    }
}

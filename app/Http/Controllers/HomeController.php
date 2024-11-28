<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Kategori; // Pastikan namespace sesuai dengan model kategori

class HomeController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all(); // Ambil semua kategori dari tabel kategori
        $buku = Buku::all(); // Ambil semua buku dari tabel buku
        return view('welcome', compact('kategori', 'buku'));
    }
}


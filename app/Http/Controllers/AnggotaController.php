<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Role;
use App\Models\Kategori;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $buku = Buku::with('peminjaman')->get();
        // $buku = Buku::all(); // Adjust this according to your model
        $kategori = Kategori::all(); // Adjust this according to your model
        return view('anggota.home', compact('buku','kategori')); // Pass the $buku variable to the view
    }

    public function edit($id)
    {
        return view('anggota.profile_edit', [
            'id' => $id  // Pastikan mengirim id ke view
        ]);
    }

    
}

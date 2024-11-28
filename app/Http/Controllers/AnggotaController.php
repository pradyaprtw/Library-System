<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Role;
use App\Models\Kategori;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {   
        $kategoriId = $request->get('kategori'); // Ambil kategori yang dipilih
        
        // Ambil kategori jika ada, jika tidak, tampilkan semua buku
        if ($kategoriId) {
            $buku = Buku::with(['peminjaman.pembayaran'])->where('id_kategori', $kategoriId)->get();
        } else {
            $buku = Buku::with(['peminjaman.pembayaran'])->get(); // Tampilkan semua buku jika tidak ada kategori yang dipilih
        }
        
        $kategori = Kategori::all(); // Ambil semua kategori
        return view('anggota.home', compact('buku','kategori')); // Pass the $buku variable to the view
    }
    
    public function edit($id)
    {
        return view('anggota.profile_edit', [
            'id' => $id  // Pastikan mengirim id ke view
        ]);
    }

    
}

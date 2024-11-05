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
        return view('anggota.anggota');
    }

    public function home()
    {
        $buku = Buku::with('peminjaman')->get();
        $buku = Buku::all(); // Adjust this according to your model
        $kategori = Kategori::all(); // Adjust this according to your model
        return view('anggota.home', compact('buku','kategori')); // Pass the $buku variable to the view
    }
    public function create()
    {
        $users = UserModel::all();
        $role = Role::where('id', 2)->get(); 
        $data = [
            'users' => $users,
            'role' => $role 
        ] ;

        return view('anggota.create_anggota', compact('users', 'role'));
    }

    public function edit($id)
    {
        return view('anggota.edit_anggota', [
            'id' => $id  // Pastikan mengirim id ke view
        ]);
    }

    public function profile($id)
    {
        return view('anggota.profile_edit', [
            'id' => $id  // Pastikan mengirim id ke view
        ]);
    }

    
}

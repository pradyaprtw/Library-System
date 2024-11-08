<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AdminAnggotaController extends Controller
{
    public function index()
    {
       return view('anggota.anggota');
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
}

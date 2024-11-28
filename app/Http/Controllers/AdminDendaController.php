<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDendaController extends Controller
{
    public function index()
    {
        return view('admin.riwayat_denda');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Menampilkan halaman home untuk admin
    public function index()
    {
        return view('admin.home'); // Pastikan view ini ada di resources/views/admin/home.blade.php
    }

    // Fungsi untuk logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Logout admin
        $request->session()->invalidate(); // Menghapus session
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect('/admin/login')->with('success', 'Anda telah logout'); // Redirect ke halaman login
    }

    // Tambahkan metode lainnya sesuai kebutuhan
}

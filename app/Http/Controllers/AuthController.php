<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login admin
    public function index() {
        return view('auth.login'); // Pastikan view ini ada
    }

    // Menangani login admin
    public function login(Request $request) {
        $credentials = $request->only('username', 'password');

        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Cek kredensial admin
        if (Auth::guard('admin')->attempt($credentials)) {
            // Redirect ke home khusus admin setelah login berhasil
            return redirect()->route('admin.home')->with('success', 'Berhasil login sebagai admin');
        } else {
            // Jika login gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }
}

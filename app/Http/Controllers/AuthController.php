<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Menampilkan halaman login admin
    public function login() {
        return view('auth.login'); // Pastikan view ini ada
    }

    // Menangani login admin
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $request->session()->regenerate();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user()->role_id == 1) {
                return redirect()->route('admin.home')->with('success', 'Berhasil login');
            }
            if (Auth::user()->role_id == 2) {
                return redirect()->route('anggota.home')->with('success', 'Berhasil login');
            }
        }
        Log::info('Login gagal atau role_id tidak sesuai');
        return redirect('/login')->withErrors(['username' => 'Username atau password salah']);        

    }

    public function register(Request $request) {
        return view('auth.register');
    }

    // Menangani logout admin
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    

}
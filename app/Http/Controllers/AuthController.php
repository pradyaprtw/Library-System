<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->route('admin.home')->with('success', 'Berhasil login');
        }
        // return back()->withErrors([
        //     'username' => 'Username atau password salah',
        // ])->onlyInput('username');

        return redirect('');
    }

    public function register(Request $request) {
        return view('auth.register');
    }

    // Menangani logout admin
    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Berhasil logout');
    }
    

}
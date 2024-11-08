<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
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
    
        // Jika ada sesi login aktif, logout sesi yang ada
        if (Auth::check()) {
            Auth::logout();
        }
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Auth::logoutOtherDevices($request->password); // Logout sesi lain di perangkat ini
        
            if (Auth::user()->role_id == 1) {
                return redirect()->route('admin.home')->with('success', 'Berhasil login sebagai admin');
            } elseif (Auth::user()->role_id == 2) {
                return redirect()->route('anggota.home')->with('success', 'Berhasil login sebagai anggota');
            }
        }        
    
        return redirect('/login')->withErrors(['username' => 'Username atau password salah']);
    }
    
    
    
    public function register() {
        
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
        ]);
    
           $user = UserModel::create([
               'nama' => $request->nama,
               'alamat' => $request->alamat,
               'no_telepon' => $request->no_telepon,
               'email' => $request->email,
               'username' => $request->username,
               'password' => bcrypt($request->password),
               'tanggal_daftar' => now(),
               'role_id' => 2
           ]);

           // Cek apakah user berhasil disimpan
    if ($user) {
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
    } else {
        return redirect()->back()->withErrors(['error' => 'Pendaftaran gagal.']);
    }

        //    dd($user);
            
            return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }
    
   

    // Menangani logout admin
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login'); // Redirect ke halaman login
    }    

}
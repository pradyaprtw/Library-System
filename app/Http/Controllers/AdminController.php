<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Menampilkan halaman home untuk admin
    public function index()
    {
        // Fetch all books from the database
        $buku = Buku::all(); // Adjust this according to your model
        $kategori = Kategori::all(); // Adjust this according to your model
        return view('admin.home', compact('buku','kategori')); // Pass the $buku variable to the view
    }

    // Fungsi untuk logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Logout admin
        $request->session()->invalidate(); // Menghapus session
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect('/admin/login')->with('success', 'Anda telah logout'); // Redirect ke halaman login
    }

    public function destroy($id){
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('admin.home')->with('success', 'Buku deleted successfully');

    }

    // Tambahkan metode lainnya sesuai kebutuhan
}

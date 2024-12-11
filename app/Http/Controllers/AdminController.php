<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\PeminjamanModel;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Menampilkan halaman home untuk admin
   // AdminController
   public function index(Request $request)
   {   
       $buku = Buku::all();
       $kategori = Kategori::all();
       $users = User::where('role_id', 2)->get();
       $peminjaman = PeminjamanModel::all();
       
       $peminjamanTerbaru = PeminjamanModel::with(['users', 'buku'])
           ->where('status', 'Dipinjam')
           ->latest()
           ->take(10)
           ->get();
        
        $stokBuku = Buku::select('judul_buku', 'stok')->get();

       $peminjamanAktif = PeminjamanModel::where('status', 'Dipinjam')->get();
       $totalDenda = PeminjamanModel::sum('denda');
       $bukuTersedia = Buku::sum('stok');
   
       return view('admin.home', compact(
           'buku', 'kategori', 'users', 'peminjaman', 
            'peminjamanTerbaru', 
           'peminjamanAktif', 'totalDenda', 'bukuTersedia', 'stokBuku'
       ));
   }

    public function destroy($id){
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('admin.home')->with('success', 'Buku deleted successfully');

    }

}

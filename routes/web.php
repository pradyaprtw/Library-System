<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan web routes untuk aplikasi Anda.
| Routes ini akan dimuat oleh RouteServiceProvider dan semuanya akan
| diassign ke grup middleware "web".
|
*/

route::get('/', function (){
    return view('welcome');
})->middleware('auth');

// Rute untuk buku (menggunakan resource controller)
// Route::resource('buku', BukuController::class);
Route::get('/login', [AuthController::class, 'login'])->middleware('check.active.session');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerProses', [AuthController::class, 'registerProses'])->name('register.proses');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate'); 

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); 
    Route::get('/admin/home', [AdminController::class, 'index'])->middleware('onlyadmin')->name('admin.home');
    Route::delete('/buku/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    
    Route::prefix('buku')->group(function () {   
        Route::get('/', [BukuController::class, 'index'])->middleware('onlyadmin')->name('buku.index');  
        Route::get('/create', [BukuController::class, 'create'])->name('buku.create');
        Route::get('/show/{id}', [BukuController::class, 'show'])->name('buku.show');
        Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/{id}', [BukuController::class, 'update'])->name('buku.update');
    });
    
    Route::prefix('anggota')->group(function () {
        Route::get('/', [AnggotaController::class, 'index'])->middleware('onlyadmin')->name('anggota.index');
        Route::get('/create', [AnggotaController::class, 'create'])->name('anggota.create');
        Route::get('/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
        Route::put('/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    });
    
    Route::get('/home', [AnggotaController::class, 'home'])->middleware('onlyguest')->name('anggota.home');
    Route::get('/profile/edit/{id}', [AnggotaController::class, 'profile'])->middleware('onlyguest')->name('anggota.profile');

    Route::prefix('peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->middleware('onlyadmin')->name('peminjaman.index');
        Route::get('/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    });
    
Route::post('/buku/pinjam/{id}', [BukuController::class, 'pinjam'])->name('buku.pinjam');
Route::post('/buku/kembalikan/{id}', [BukuController::class, 'kembalikan'])->name('buku.kembalikan');
Route::get('/anggota/riwayat', [BukuController::class, 'riwayatPeminjaman'])->name('anggota.riwayat');

   
});


// Rute untuk halaman khusus admin setelah login
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
// });

// Rute tambahan untuk buku


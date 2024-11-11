<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AdminBukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminAnggotaController;
use App\Http\Controllers\AdminPeminjamanController;

// Route untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

// Rute untuk autentikasi
Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerProses', [AuthController::class, 'registerProses'])->name('register.proses');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate'); 
// Route::match(['get', 'post'], '/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'checkRole:1'])->group(function () {    
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::resource('/admin/buku', AdminBukuController::class);
    Route::resource('/admin/anggota', AdminAnggotaController::class);
    Route::resource('peminjaman', AdminPeminjamanController::class);
    Route::post('/admin/peminjaman/{id}', [AdminPeminjamanController::class, 'status'])->name('peminjaman.status');
});

Route::middleware(['auth', 'checkRole:2'])->group(function () {
    Route::get('/anggota/home', [AnggotaController::class, 'index'])->name('anggota.home');
    Route::get('/anggota/profile/{id}', [AnggotaController::class, 'edit'])->name('anggota.profile');
    Route::get('/anggota/peminjaman', [PeminjamanController::class, 'riwayatPeminjaman'])->name('anggota.riwayat');
    Route::post('/anggota/pinjam/{id}', [PeminjamanController::class, 'pinjam'])->name('buku.pinjam');
    Route::post('/anggota/kembalikan/{id}', [PeminjamanController::class, 'kembalikan'])->name('buku.kembalikan');
    Route::get('/anggota/denda/{id}', [PeminjamanController::class, 'denda'])->name('anggota.denda');
});
// Rute dengan middleware auth
// Route::middleware('auth')->group(function () {
//     Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//     // Rute admin
//     Route::get('/admin/home', [AdminController::class, 'index'])->middleware('onlyadmin')->name('admin.home');
//     Route::delete('/buku/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    

//     // Rute buku
//     // Route::prefix('buku')->middleware('onlyadmin')->group(function () {   
//     //     Route::get('/', [BukuController::class, 'index'])->name('buku.index');  
//     //     Route::get('/create', [BukuController::class, 'create'])->name('buku.create');
//     //     Route::get('/show/{id}', [BukuController::class, 'show'])->name('buku.show');
//     //     Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
//     //     Route::put('/{id}', [BukuController::class, 'update'])->name('buku.update');
//     // });

//     // Rute anggota
//     Route::prefix('anggota')->group(function () {
//         Route::get('/', [AnggotaController::class, 'index'])->middleware('onlyadmin')->name('anggota.index');
//         Route::get('/create', [AnggotaController::class, 'create'])->name('anggota.create');
//         Route::get('/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
//         Route::put('/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
        
//         // Rute home dan edit profile anggota
//         Route::get('/home', [AnggotaController::class, 'home'])->name('anggota.home');
//         Route::get('/profile/edit/{id}', [AnggotaController::class, 'profile'])->name('anggota.profile');
//     });

//     // Rute peminjaman
//     Route::prefix('peminjaman')->middleware('onlyadmin')->group(function () {
//         Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
//         Route::get('/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
//     });

//     // Rute tambahan untuk buku
//     Route::post('/buku/pinjam/{id}', [BukuController::class, 'pinjam'])->name('buku.pinjam');
//     Route::post('/buku/kembalikan/{id}', [BukuController::class, 'kembalikan'])->name('buku.kembalikan');
//     Route::get('/anggota/riwayat', [BukuController::class, 'riwayatPeminjaman'])->name('anggota.riwayat');
// });

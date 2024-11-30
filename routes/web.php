<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AdminBukuController;
use App\Http\Controllers\AdminDendaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminAnggotaController;
use App\Http\Controllers\AdminPeminjamanController;
use App\Http\Controllers\ForgotPasswordController;

// Route untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerProses', [AuthController::class, 'registerProses'])->name('register.proses');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate'); 
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::match(['get', 'post'], '/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware(['auth', 'checkRole:1'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::resource('/buku', AdminBukuController::class);
    Route::resource('/anggota', AdminAnggotaController::class);
    Route::resource('/peminjaman', AdminPeminjamanController::class);
    Route::post('/peminjaman/{id}', [AdminPeminjamanController::class, 'status'])->name('peminjaman.status');
    Route::get('/riwayat-denda', [AdminDendaController::class, 'index'])->name('admin.denda');
});

Route::prefix('anggota')->middleware(['auth', 'checkRole:2'])->group(function () {
    Route::get('/home', [AnggotaController::class, 'index'])->name('anggota.home');
    Route::get('/profile/{id}', [AnggotaController::class, 'edit'])->name('anggota.profile');
    Route::post('/profile/{id}', [AnggotaController::class, 'update'])->name('anggota.profile.update');
    Route::get('/peminjaman', [PeminjamanController::class, 'riwayatPeminjaman'])->name('anggota.riwayat');
    Route::post('/pinjam/{id}', [PeminjamanController::class, 'pinjam'])->name('buku.pinjam');
    Route::post('/kembalikan/{id}', [PeminjamanController::class, 'kembalikan'])->name('buku.kembalikan');
    Route::get('/riwayat-denda', [PeminjamanController::class, 'riwayatDenda'])->name('anggota.denda');
    // Route::get('/denda/{id}/bayar', [PeminjamanController::class, 'bayarDenda'])->name('bayar.denda');
    Route::post('/denda/{id}', [PeminjamanController::class, 'konfirmasiPembayaranDenda'])->name('konfirmasi.denda');
});

// Route untuk forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'handleForgotPassword'])->name('forgot-password.submit');
Route::get('/reset-password/{username}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset-password.form');
Route::post('/reset-password/{username}', [ForgotPasswordController::class, 'handleResetPassword'])->name('reset-password.submit');


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

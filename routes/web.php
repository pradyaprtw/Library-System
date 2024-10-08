<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk buku (menggunakan resource controller)
Route::resource('buku', BukuController::class);

// Rute untuk login admin
Route::get('/', [AuthController::class, 'index'])->name('admin.login'); // Menampilkan halaman login admin
Route::post('/', [AuthController::class, 'login'])->name('admin.login.submit'); // Aksi login admin

// Rute untuk halaman setelah login admin
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home'); // Halaman khusus admin setelah login
});

// Rute untuk menampilkan list buku (tambahan jika diperlukan)
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

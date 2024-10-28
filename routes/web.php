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
| Di sini Anda dapat mendaftarkan web routes untuk aplikasi Anda.
| Routes ini akan dimuat oleh RouteServiceProvider dan semuanya akan
| diassign ke grup middleware "web".
|
*/

// Rute untuk buku (menggunakan resource controller)
Route::resource('buku', BukuController::class);


// Rute untuk login admin
Route::get('/', [AuthController::class, 'index'])->name('admin.login'); // Halaman login admin
Route::post('/', [AuthController::class, 'login'])->name('admin.login.submit'); // Proses login admin
Route::post('/', [AuthController::class, 'logout'])->name('admin.logout'); // Logout admin

// Rute untuk halaman khusus admin setelah login
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
});

// Rute untuk menampilkan daftar buku (tambahan jika diperlukan)
Route::get('/', [BukuController::class, 'index'])->name('buku.index');
Route::get('/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/{id}', [BukuController::class, 'update'])->name('buku.update');


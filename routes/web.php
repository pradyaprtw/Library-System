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

route::get('/', function (){
    return view('welcome');
})->middleware('auth');

// Rute untuk buku (menggunakan resource controller)
Route::resource('buku', BukuController::class);

// Rute untuk login admin
Route::get('login', [AuthController::class, 'login'])->name('login');// Halaman login admin
Route::post('/', [AuthController::class, 'authenticate']); // Proses login admin
Route::get('/register', [AuthController::class, 'register']); // Proses register admin
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout'); // Logout admin

// Rute untuk halaman khusus admin setelah login
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
// });

// Rute tambahan untuk buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');  
Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

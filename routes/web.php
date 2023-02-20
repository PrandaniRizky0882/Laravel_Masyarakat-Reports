<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/petugas/tampil', function () {
//     return view('petugas/tampil');
// });


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_action'])->name('register.action');



// untuk menambah data
Route::get('/masyarakat', [PengaduanController::class, 'index'])->name('masyarakat.dashboard');
Route::get('/masyarakat/create', [PengaduanController::class, 'create'])->name('masyarakat.create');
Route::post('/masyarakat/create', [PengaduanController::class, 'store'])->name('masyarakat.store');
Route::get('/masyarakat/{id}',[PengaduanController::class, 'show'])->name('masyarakat.show');

// update
Route::get('/masyarakat/{id}/edit', [PengaduanController::class, 'edit'])->name('masyarakat.edit');
Route::put('/masyarakat/{id}/edit', [pengaduanController::class, 'update'])->name('masyarakat.update');
Route::delete('/masyarakat/{id}', [PengaduanController::class, 'delete'])->name('masyarakat.delete');


// daftar nik
// Route::get('/daftarNik', [MasyarakatController::class, 'index'])->name('masyarakat.index');

// petugas
Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');
Route::get('/petugas/tampil', [PetugasController::class, 'tampil'])->name('petugas.tampil');
Route::get('/petugas/{id}',[PetugasController::class, 'show'])->name('petugas.show');
Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
Route::put('/petugas/{id}/edit', [petugasController::class, 'update'])->name('petugas.update');
Route::delete('/petugas/{id}', [PetugasController::class, 'delete'])->name('petugas.delete');

// tanggapan 
Route::get('/petugas/tanggapan', [PetugasController::class, 'tanggapan'])->name('petugas.tanggapan');

// cetak fpdf
Route::get('pdf', [PengaduanController::class, 'cetak'])->name('cetak');
// Route::get('pdf-gambar', [PengaduanController::class, 'cetak_gambar'])->name('cetak_gambar');






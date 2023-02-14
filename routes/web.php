<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;



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


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');

Route::get('register', [MasyarakatController::class, 'register'])->name('register');
Route::post('register', [MasyarakatController::class, 'register_action'])->name('register.action');



// untuk menambah data
Route::get('/masyarakat', [PengaduanController::class, 'index'])->name('masyarakat.dashboard');
Route::get('/masyarakat/create', [PengaduanController::class, 'create'])->name('masyarakat.create');
Route::post('/masyarakat/create', [PengaduanController::class, 'store'])->name('masyarakat.store');
Route::get('/masyarakat/{id}',[PengaduanController::class, 'show'])->name('masyarakat.show');

// update
Route::get('/masyarakat/{id}/edit', [PengaduanController::class, 'edit'])->name('masyarakat.edit');
Route::put('/masyarakat/{id}/edit', [pengaduanController::class, 'update'])->name('masyarakat.update');
Route::delete('/masyarakat/{id}', [PengaduanController::class, 'delete'])->name('masyarakat.delete');
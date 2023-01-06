<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;

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
    return view('auth.login');
});

Auth::routes();
Route::get('/logout', function() {
    \Auth::logout();
    return redirect('/');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::get('/mahasiswa/show/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::post('/mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');

Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
Route::post('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
Route::post('/prodi/destroy/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');
Route::get('/prodi/edit/{id}', [ProdiController::class, 'edit'])->name('prodi.edit');
Route::post('/prodi/update/{id}', [ProdiController::class, 'update'])->name('prodi.update');

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
Route::post('/kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
Route::post('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');


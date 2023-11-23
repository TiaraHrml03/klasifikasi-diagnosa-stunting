<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBalitaController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\HasilController;
use App\Models\Hasil;
use App\Models\Klasifikasi;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

//data balita
Route::get('balita',[DataBalitaController::class, 'index'])->name('balita');
Route::get('balita/create', [DataBalitaController::class, 'create'])->name('balita.create');
Route::post('balita/simpan', [DataBalitaController::class, 'store'])->name('balita.simpan');
Route::get('balita/edit', [DataBalitaController::class, 'edit'])->name('balita.edit');
Route::put('balita/update', [DataBalitaController::class, 'update'])->name('balita.update');
Route::delete('balita/delete', [DataBalitaController::class, 'destroy'])->name('balita.delete');
//Route::resources('data_balita', DataBalitaController::class);

//dashboard
Route::get('/', function () {
    return redirect()->to('/dashboard');
});
Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

//klasifikasi naive bayes
Route::get('klasifikasi',[KlasifikasiController::class, 'index'])->name('klasifikasi');
Route::post('klasifikasi', [KlasifikasiController::class, 'klasifikasi'])->name('klasifikasi');
Route::post('klasifikasiaksi', [KlasifikasiController::class, 'klasifikasiaksi'])->name('klasifikasiaksi');

// hasil klasifikasi
Route::get('hasil',[HasilController::class, 'index'])->name('hasil');
Route::delete('hasil/delete', [HasilController::class, 'destroy'])->name('hasil.delete');

//login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-prosses', [LoginController::class, 'authanticate'])->name('login-prosses');


//register
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register');

//layout
Route::get('layout', [LayoutController::class, 'index'])->name('layout');

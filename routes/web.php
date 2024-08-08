<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

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

Route::resource('hasil', App\Http\Controllers\HasilController::class);

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::resource('user', App\Http\Controllers\UsersController::class);
    Route::resource('mapel', App\Http\Controllers\MapelController::class);
    Route::resource('atasan', App\Http\Controllers\AtasanController::class);
    Route::resource('guru', App\Http\Controllers\GuruController::class);
    Route::resource('siswa', App\Http\Controllers\SiswaController::class);
    Route::resource('dataGuru', App\Http\Controllers\DataGuruController::class);
    Route::resource('pkgAtasan', App\Http\Controllers\PkgAtasanController::class);
    Route::resource('pkgGuru', App\Http\Controllers\pkgGuruController::class);
    Route::resource('pkgSiswa', App\Http\Controllers\pkgSiswaController::class);

    

    });

    Auth::routes();
    //untuk Route Backend Lainnya
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



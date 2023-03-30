<?php

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

Route::get('/', function () {

    $data = [
        'title' => 'Login - Aplikasi Pengelolaan RM Alam Mutiara',
    ];

    return view('auth.login', $data);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('kelola_pengguna')->group(function () {
    Route::get('/', [App\Http\Controllers\KelolaPenggunaController::class, 'index'])->name('kelola_pengguna');
    Route::get('users', [App\Http\Controllers\KelolaPenggunaController::class, 'get_all_users'])->name('kelola_pengguna.users');
    Route::get('delete/{id}', [App\Http\Controllers\KelolaPenggunaController::class, 'destroy'])->name('kelola_pengguna.delete');

});
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
    Route::post('store', [App\Http\Controllers\KelolaPenggunaController::class, 'store'])->name('kelola_pengguna.store');
    Route::post('update', [App\Http\Controllers\KelolaPenggunaController::class, 'update'])->name('kelola_pengguna.update');
    Route::get('update_status/{id}', [App\Http\Controllers\KelolaPenggunaController::class, 'update_status'])->name('kelola_pengguna.update_status');
});

Route::prefix('profile')->group(function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::post('hapus_akun', [App\Http\Controllers\ProfileController::class, 'hapus_akun'])->name('profile.hapus_akun');
    Route::get('update_password', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('profile.update_password');
    Route::post('edit_pw', [App\Http\Controllers\ProfileController::class, 'edit_pw'])->name('profile.edit_pw');
});

Route::prefix('inventori')->group(function () {
    Route::get('/', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventori');
    Route::get('get_all_inventories', [App\Http\Controllers\InventoryController::class, 'get_all_inventories'])->name('inventori.get_all_inventories');
    Route::get('update_status/{id}', [App\Http\Controllers\InventoryController::class, 'update_status'])->name('inventori.update_status');
    Route::get('delete/{id}', [App\Http\Controllers\InventoryController::class, 'delete'])->name('inventori.delete');
    Route::post('store', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventori.store');
    Route::post('update', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventori.update');

    Route::get('detail/{id}', [App\Http\Controllers\InventoryController::class, 'detail'])->name('inventori.detail');

    Route::get('delete_inventory_use/{id}', [App\Http\Controllers\InventoryController::class, 'delete_inventory_use'])->name('inventori.delete_inventory_use');


    Route::post('kelola_stok', [App\Http\Controllers\InventoryController::class, 'kelola_stok'])->name('inventori.kelola_stok');
    Route::get('get_detail_penggunaan/{id}', [App\Http\Controllers\InventoryController::class, 'get_detail_penggunaan'])->name('inventori.get_detail_penggunaan');
});

Route::prefix('toko')->group(function () {
    Route::get('/', [App\Http\Controllers\TokoController::class, 'index'])->name('toko');
    Route::get('get_all_store', [App\Http\Controllers\TokoController::class, 'get_all_store'])->name('toko.get_all_store');

    Route::post('store', [App\Http\Controllers\TokoController::class, 'store'])->name('toko.store');
    Route::get('update_status/{id}', [App\Http\Controllers\TokoController::class, 'update_status'])->name('toko.update_status');
    Route::get('delete/{id}', [App\Http\Controllers\TokoController::class, 'delete'])->name('toko.delete');

    Route::post('update', [App\Http\Controllers\TokoController::class, 'update'])->name('toko.update');
});

Route::prefix('menu')->group(function () {
    Route::get('/', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
    Route::get('get_all_menus', [App\Http\Controllers\MenuController::class, 'get_all_menus'])->name('menu.get_all_menus');

    Route::get('update_status/{id}', [App\Http\Controllers\MenuController::class, 'update_status'])->name('menu.update_status');

    Route::get('delete/{id}', [App\Http\Controllers\MenuController::class, 'delete'])->name('menu.delete');

    Route::post('store', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
    Route::post('update', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
    Route::get('get_all_menu', [App\Http\Controllers\MenuController::class, 'get_all_menu'])->name('menu.get_all_menu');
});

Route::get('kalkulator_menu', [App\Http\Controllers\MenuController::class, 'kalkulator_menu'])->name('kalkulator_menu');

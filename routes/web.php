<?php

use App\Http\Controllers\BarangController;
use App\Models\Barang;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/read', [BarangController::class, 'read'])->name('read');
Route::post('/barang/create', [BarangController::class, 'store'])->name('barang_store');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('edit/barang');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('update/barang');
Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('delete/barang');
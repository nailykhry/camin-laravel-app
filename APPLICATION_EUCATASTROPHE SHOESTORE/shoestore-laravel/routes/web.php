<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriSepatuController;

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
    return view('home', [
        "title" => "Home"
    ]);
});



Route::get('/about', function () {
    return view('about', [
        "title" => "Tentang Kami"
    ]);
});

Route::resource('sepatu', SepatuController::class);

Route::get('/sepatu/{sepatu:id}', [UkuranController::class, 'show']);
Route::get('/sepatu/{sepatu:id}/create', [UkuranController::class, 'create']);
Route::resource('ukuran', UkuranController::class);

Route::resource('kategori', KategoriController::class);
Route::get('/kategori/{kategori:id}', [KategoriSepatuController::class, 'show'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard', DashboardController::class)->middleware('auth');

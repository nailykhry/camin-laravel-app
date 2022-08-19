<?php

use App\Http\Controllers\sepatuApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/sepatu', [sepatuApi::class, 'index']);
Route::get('/sepatu/{id_sepatu}', [sepatuApi::class, 'show']);
Route::post('/sepatu', [sepatuApi::class, 'store']);
Route::delete('/sepatu/{id_sepatu}', [sepatuApi::class, 'destroy']);
Route::post('/sepatu/{id_sepatu}', [sepatuApi::class, 'update']);

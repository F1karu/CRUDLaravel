<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RuangBacaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

// ROUTE CREATE
Route::post('/createsiswa',[SiswaController::class,'createsiswa']);
Route::post('/createkelas',[KelasController::class,'createkelas']);
Route::post('/createbuku',[BukuController::class,'createbuku']);
Route::post('/createpeminjaman',[PeminjamanController::class,'createpeminjaman']);
Route::post('/createpengembalian',[PengembalianController::class,'createpengembalian']);
Route::post('/createruangbaca',[RuangBacaController::class,'createruangbaca']);


// ROUTE GET BY ID
Route::get('/getsiswa/{id_siswa}',[SiswaController::class,'show']);
Route::get('/getkelas/{id_kelas}',[KelasController::class,'show']);
Route::get('/getbuku/{id_buku}',[BukuController::class,'show']);
Route::get('/getruangbaca/{id}',[RuangBacaController::class,'show']);


// ROUTE GET ALL
Route::get('/getsiswa',[SiswaController::class,'index']);
Route::get('/getkelas',[KelasController::class,'index']);
Route::get('/getbuku',[BukuController::class,'index']);
Route::get('/getruangbaca',[RuangBacaController::class,'index']);


// ROUTE UPDATE
Route::put('/updatesiswa/{id_siswa}', [SiswaController::class, 'updatesiswa']);
Route::put('/updatekelas/{id_kelas}', [KelasController::class, 'updatekelas']);
Route::put('/updatebuku/{id_buku}', [BukuController::class, 'updatebuku']);
Route::put('/updateruangbaca/{id}', [RuangBacaController::class, 'updateruangbaca']);


// ROUTE DELETE
Route::delete('/deletesiswa/{id_siswa}', [SiswaController::class, 'deletesiswa']);
Route::delete('/deletekelas/{id_kelas}', [KelasController::class, 'deletekelas']);
Route::delete('/deletebuku/{id_buku}', [BukuController::class, 'deletebuku']);
Route::delete('/deleteruangbaca/{id}', [RuangBacaController::class, 'deleteruangbaca']);


// ROUTE JWT
Route::post('/register', RegisterController::class,);
Route::post('/login', LoginController::class,);
Route::post('/logout', LogoutController::class,);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

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

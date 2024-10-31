<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
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

Route::post('/createsiswa',[SiswaController::class,'createsiswa']);
Route::post('/createkelas',[KelasController::class,'createkelas']);

Route::get('/getsiswa',[SiswaController::class,'getsiswa']);
Route::get('/getkelas',[KelasController::class,'getkelas']);

Route::put('/updatesiswa/{id_siswa}', [SiswaController::class, 'updatesiswa']);
Route::put('/updatekelas/{id_kelas}', [KelasController::class, 'updatekelas']);


Route::delete('/deletesiswa/{id_siswa}', [SiswaController::class, 'deletesiswa']);
Route::delete('/deletekelas/{id_kelas}', [KelasController::class, 'deletekelas']);


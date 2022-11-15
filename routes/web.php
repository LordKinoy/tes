<?php

use App\Http\Controllers\Supplier;
use App\Http\Controllers\Hitung;
use App\Http\Controllers\Login;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\OtentikasiController;
use App\Http\Controllers\RegisterController;
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

// ROUTE SUPPLIER
Route::get('/supplier', [Supplier::class,'index']);
Route::get('/supplier/tambah', [Supplier::class,'form']);
Route::post('/supplier/tambah/process', [Supplier::class,'process']);

// ROUTE TABUNG
Route::get('/tabung', [Hitung::class,'index']);
Route::post('/process', [Hitung::class, 'hitung_v_tabung']);

// Route::get('/register1', function() {
//     return view(view : 'auth.register');
// });

Route::post('/register1', [\App\Http\Controllers\RegisterController::class, 'register'])->name(name:'register');
Route::post('/login1', [\App\Http\Controllers\LoginController::class, 'login'])->name(name:'login');

//Lokasi Route
Route::get('/gudang', [LokasiController::class, 'index']);
Route::get('/gudang/tambah', [LokasiController::class, 'tambah']);
Route::post('/gudang/store', [LokasiController::class, 'store']);
Route::get('/gudang/edit/{id_lokasi}', [LokasiController::class, 'edit']);
Route::post('/gudang/edit/update',[LokasiController::class,'update']);
Route::get('/gudang/delete/{id_lokasi}',[LokasiController::class,'destroy']);

Route::controller(OtentikasiController::class)->group(function(){
    Route::get('login','formlogin')->name('login');
    Route::post('auth','authenticate');
    Route::get('logout','logout');
    Route::get('/auth', [OtentikasiController::class,'login']);
});
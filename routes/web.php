<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\NilaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//INDEX
Route::get('/', function () {
    return view('welcome');
});

//MAHASISWA
Route::get('/admin-mhs', function () {
    return view('data.admin-mhs');
});
Route::get('/inputmhs', function () {
    return view('data.inputmhs');
});
Route::put('/admin-mhs/{id}', [APIController::class, 'updatemhs']);
Route::get('/admin-mhs', [APIController::class, 'showDataMhs']);
Route::delete('/admin-mhs/hapus/{id}', [APIController::class, "destroymhs"]);
Route::post('/admin-mhs/tambah', [APIController::class,"store"]);

// //MAGANG
Route::get('/admin-magang', function () {
    return view('data.admin-magang');
});
Route::post('/admin-magang/tambah', [MagangController::class,"store"]);
Route::get('/admin-magang', [MagangController::class, 'show']);
Route::delete('admin-magang/hapus/{id}', [MagangController::class, "destroy"]);
Route::put('/admin-magang/{kode_tempat}', [MagangController::class, 'updatemagang']);

// MATKUL
Route::get('/admin-matkul', function () {
    return view('data.admin-matkul');
});
Route::post('/admin-matkul/tambah', [MatkulController::class,"store"]);
Route::get('/admin-matkul', [MatkulController::class, 'show']);
Route::delete('/admin-matkul/hapus/{kode_matkul}', [MatkulController::class, "destroy"]);
Route::put('/admin-matkul/{kode_matkul}', [MatkulController::class, 'update']);

Route::get('/admin-mhs/admin-nilai/{id}', [NilaiController::class, 'show']);
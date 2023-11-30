<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/Controllers',[APIController::class,"index"]);

Route::get('/admin-mhs', function () {
    return view('data.admin-mhs');
});

Route::get('/inputmhs', function () {
    return view('data.inputmhs');
});

// Route::get('/editmhs', function () {
//     return view('data.editmhs');
// });

Route::get('/admin-mhs', [APIController::class, 'showDataMhs']);
Route::delete('/hapus/{id}', [APIController::class, "destroy"]);
Route::get('/data/{id}', [APIController::class, 'editmhs']);
Route::put('/admin-mhs', [APIController::class, 'updatemhs']);
// Route::get('/edit-mhs/{id}', [APIController::class, "editmhs"]);
// Route::put('/edit-mhs/{id}', [APIController::class, 'updatemhs']);

Route::post('/tambah', [APIController::class,"store"]);
Route::get('/admin-mhs', [APIController::class, "getMahasiswa"]);
// Route::get('/editmhs', [APIController::class, "getMahasiswa"])->name('datamhs');
// Route::get('/editmhs/{nim}', [APIController::class, "getMahasiswa"])->name('datamhs');



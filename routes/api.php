<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\MagangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("all_data_mhs", [APIController::class, "index"]);
Route::post("create_data_mhs", [APIController::class, "store"]);
Route::post("show_data_mhs", [APIController::class, "show"]);
Route::post("edit_data_mhs", [APIController::class, "edit"]);
Route::post("delete_data_mhs", [APIController::class, "destroy"]);

Route::post("all_data_matkul", [MatkulController::class, "index"]);
Route::post("create_data_matkul", [MatkulController::class, "store"]);
Route::post("show_data_matkul", [MatkulController::class, "show"]);
Route::post("delete_data_matkul", [MatkulController::class, "destroy"]);

Route::post("all_data_magang", [MagangController::class, "index"]);
Route::post("create_data_magang", [MagangController::class, "store"]);
Route::post("show_data_magang", [MagangController::class, "show"]);
Route::post("edit_data_magang", [MagangController::class, "edit"]);
Route::post("delete_data_magang", [MagangController::class, "destroy"]);
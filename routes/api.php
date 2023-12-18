<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/pemesanans', [App\Http\Controllers\Api\PemesananController::class, 'index']);
    // Route::post('/pemesanans', [App\Http\Controllers\Api\PemesananController::class, 'store']);
    // Route::get('/pemesanans', [App\Http\Controllers\Api\PemesananController::class, 'show']);
    // Route::put('/pemesanans/{id}', [App\Http\Controllers\Api\PemesananController::class, 'update']);
    // Route::delete('/pemesanans/{id}', [App\Http\Controllers\Api\PemesananController::class, 'destroy']);
});

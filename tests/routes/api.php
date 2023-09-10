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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('login', [\App\Http\Controllers\UserController::class, 'logIn']);
Route::post('logout', [\App\Http\Controllers\UserController::class, 'logout'])->middleware('auth:sanctum');
//Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('advertising/create', [\App\Http\Controllers\AdvertisingController::class, 'create'])->middleware('auth:sanctum');
Route::get('advertising/index', [\App\Http\Controllers\AdvertisingController::class, 'index'])->middleware('auth:sanctum');
Route::put('advertising/update/{advertising}', [\App\Http\Controllers\AdvertisingController::class, 'update'])->middleware('auth:sanctum');
Route::delete('advertising/delete/{advertising}', [\App\Http\Controllers\AdvertisingController::class, 'delete'])->middleware('auth:sanctum');








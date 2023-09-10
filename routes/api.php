<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//user controller///
Route::post('register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('login', [\App\Http\Controllers\UserController::class, 'logIn']);
Route::post('logout', [\App\Http\Controllers\UserController::class, 'logout'])->middleware('auth:sanctum');
Route::post('deleteAccount', [\App\Http\Controllers\UserController::class, 'deleteAccount'])->middleware('auth:sanctum');
//user controller///

//advertising controller//
Route::post('advertising/create', [\App\Http\Controllers\AdvertisingController::class, 'create'])->middleware('auth:sanctum');
Route::get('advertising/index', [\App\Http\Controllers\AdvertisingController::class, 'index'])->middleware('auth:sanctum');
Route::post('advertising/update/{advertising}', [\App\Http\Controllers\AdvertisingController::class, 'update'])->middleware('auth:sanctum');
Route::delete('advertising/delete/{advertising}', [\App\Http\Controllers\AdvertisingController::class, 'delete'])->middleware('auth:sanctum');
//advertising controller//

//comment controller
Route::post('comment/create/{advertising}', [\App\Http\Controllers\CommentController::class, 'create'])->middleware('auth:sanctum');
Route::post('comment/update/{comment}', [\App\Http\Controllers\CommentController::class, 'update'])->middleware('auth:sanctum');
Route::delete('comment/delete/{comment}', [\App\Http\Controllers\CommentController::class, 'delete'])->middleware('auth:sanctum');
//comment controller










<?php

use App\Models\User;
use App\Models\Advertising;
use Illuminate\Support\Facades\Route;

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

//
////Route::get('/user', function () {
////    $user = User::find(3);
////    return $user->Advertisings()->get();
////});
////Route::get('/g', function () {
////    $count = User::all()->count();
////    $users = User::all();
////    return view('g', compact('users', 'count'));
////});
//
//Route::get('g', function () {
//    $count = User::all()->count();
//    $users = User::all();
//    return view('g', compact('users', 'count'));
//});
//
//Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

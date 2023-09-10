<?php

use App\Http\Controllers\AdminController;
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

//admin
Route::prefix('admin')->group(function () {
    //LOG IN  ADMIN
    Route::get('/loginAdminForm', [AdminController::class, 'showLoginForm'])->name("showLoginForm");
    Route::post('/loginAdmin', [AdminController::class, 'login'])->name('login');

    //REGISTER ADMIN
    Route::get('/registerAdmin', [AdminController::class, 'showRegisterForm'])->name("showRegisterForm");
    Route::post('/registerAdmin', [AdminController::class, 'register'])->name('register');
});
//admin

//category/////////////////
//baraye route ha auth admin bezar;
Route::get('createCategoryForm', [\App\Http\Controllers\CategoryController::class, 'createCategoryForm'])->name('createCategoryForm')->middleware('auth:admin');
Route::post('/category/create', [\App\Http\Controllers\CategoryController::class, 'createCategory'])->name('createCategory');

//{{category inja hamon id sargoroh ast}}
Route::post('/category/update/{category}', [\App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('updateCategory');

// {{category}}========inja hamon $cat va $sub ast.
Route::get('/category/update/{category}', [\App\Http\Controllers\CategoryController::class, 'updateCategoryForm'])->name('updateCategoryForm');
Route::get('/category/show', [\App\Http\Controllers\CategoryController::class, 'show'])->name('showCategories');
Route::delete('/category/delete/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');
//Route::get('category/{category}/children', [\App\Http\Controllers\CategoryController::class, 'children'])->middleware('auth:admin');
//Route::get('category/{category}/parent', [\App\Http\Controllers\CategoryController::class, 'parent'])->middleware('auth:admin');
//category/////////////////

//Atribute
Route::get('/attribute/createAttributeForm', [\App\Http\Controllers\AttributesController::class, 'index'])->name('createAttributeForm')->middleware('auth:admin');
Route::post('/attribute/createAttribute', [\App\Http\Controllers\AttributesController::class, 'store'])->name('createAttribute')->middleware('auth:admin');
//Atribute


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

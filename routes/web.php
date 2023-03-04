<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentCategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/books', [AdminController::class, "bookShow"]);

Route::get('/books/add', [AdminController::class, "bookAdd"]);
Route::post('/books/add', [AdminController::class, "bookCreate"]);

Route::get('/category/add', [AdminController::class, "categoryAdd"]);
Route::post('/category/add', [AdminController::class, "categoryCreate"]);

Route::get('/settings', [AdminController::class, "settings"]);

Route::post('/branch/add', [AdminController::class, "branchAdd"]);

Route::post('/categories/add/students', [StudentCategoryController::class, "create"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

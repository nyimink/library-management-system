<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentCategoryController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [HomeController::class, "index"])->middleware('guest');

Route::get('/books', [AdminController::class, "bookShow"]);
Route::get('/books/search', [AdminController::class, "bookSearch"]);
Route::get('/refresh/books', [AdminController::class, "bookShow"]);

Route::get('/books/add', [AdminController::class, "bookAdd"]);
Route::post('/books/add', [AdminController::class, "bookCreate"]);

Route::get('/category/add', [AdminController::class, "categoryAdd"]);
Route::post('/category/add', [AdminController::class, "categoryCreate"]);
Route::get('/category/edit/{id}', [AdminController::class, "categoryEdit"]);
Route::post('/category/edit/{id}', [AdminController::class, "categoryUpdate"]);
Route::get('/category/delete/{id}', [AdminController::class, "categoryDelete"]);

Route::get('/settings', [AdminController::class, "settings"]);

Route::post('/branch/add', [AdminController::class, "branchAdd"]);
Route::get('/branch/edit/{id}', [AdminController::class, "branchEdit"]);
Route::post('/branch/edit/{id}', [AdminController::class, "branchUpdate"]);
Route::get('/branch/delete/{id}', [AdminController::class, "branchDelete"]);

Route::get('/students/register', [StudentController::class, "register"]);
Route::post('/students/create', [StudentController::class, "create"]);

Route::get('/students/approved', [StudentController::class, "approved"]);
Route::get('/students/waiting', [StudentController::class, "waiting"]);
Route::get('/students/search', [StudentController::class, "search"]);
Route::get('/students/search/waiting', [StudentController::class, "searchWaiting"]);
Route::get('/refresh', [StudentController::class, "approved"]);
Route::get('/refresh/waiting', [StudentController::class, "waiting"]);

Route::get('student/detail/{id}' ,[StudentController::class, "detail"]);

Route::get('students/approve/{id}' ,[StudentController::class, "approve"]);
Route::get('students/reject/{id}' ,[StudentController::class, "reject"]);
Route::get('students/ban/{id}' ,[StudentController::class, "ban"]);

Route::post('/categories/add/students', [StudentCategoryController::class, "create"]);
Route::get('/categories/edit/students/{id}', [StudentCategoryController::class, "edit"]);
Route::post('/categories/edit/students/{id}', [StudentCategoryController::class, "update"]);
Route::get('/categories/delete/students/{id}', [StudentCategoryController::class, "delete"]);

Auth::routes();

Route::get('/students/books/search', [HomeController::class, "stu_bookSearch"]);
// Route::get('/students/author', [HomeController::class, "author"]);
Route::get('/students/refresh/books', [HomeController::class, "home"]);

Route::get('/subtract/{id}', [HomeController::class, "subtract"])->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/redirects', [App\Http\Controllers\HomeController::class, 'redirects']);

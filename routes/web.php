<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        "title" => "Dashboard"
    ]);
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// End Of Dashboard Route

// Login Route
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
// End Of Login Route

// Register Route
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// End Of Register Route

// Logout Route
Route::post('/logout', [LoginController::class, 'logout']);
// End Of Logout Route

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        "title" => "Categories",
        "categories" => Category::all()
    ]);
});

Route::get('/authors', function () {
    return view('authors', [
        "title" => "Authors",
        "authors" => User::all(),
    ]);
});

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

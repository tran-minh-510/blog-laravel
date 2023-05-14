<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\DetailPostController;
use App\Http\Controllers\DetailCategoryController;
use App\Http\Controllers\Admin\CategoryController;

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
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class,'index'])->name('category');
        Route::get('/create', [CategoryController::class,'create'])->name('category.create');
        Route::post('/create', [CategoryController::class,'store'])->name('category.create.post');
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.show.edit');
        Route::put('/edit/{id}', [CategoryController::class,'update'])->name('category.edit');
        Route::delete('/delete/{id}', [CategoryController::class,'destroy'])->name('category.delete');
    });
    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class,'index'])->name('post');
        Route::get('/create', [PostController::class,'create'])->name('post.create');
        Route::post('/create', [PostController::class,'store'])->name('post.create.post');
        Route::get('/edit/{id}', [PostController::class,'edit'])->name('post.show.edit');
        Route::put('/edit/{id}', [PostController::class,'update'])->name('post.edit');
        Route::delete('/delete/{id}', [PostController::class,'destroy'])->name('post.delete');
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('{category}', [DetailCategoryController::class, 'index'])->name('detail.category');
Route::get('{category}/{id}', [DetailPostController::class, 'index'])->name('detail.post');

<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\GalleryController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.main');
    })->name('dashboard');
});

Route::get('gallery', [GalleryController::class, 'index'])->name('gallery-index');
Route::get('gallery/category/{category}', [categoriesController::class, 'index'])->name('gallery-category');
Route::get('search', [GalleryController::class, 'search'])->name('search');
Route::get('show/{book}', [BooksController::class, 'show'])->name('book-show');
Route::get('admin', [AdminsController::class, 'index'])->name('admin-index');
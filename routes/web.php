<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageGalleryController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [ImageGalleryController::class, 'index'])->name('home');
Route::post('/upload', [ImageGalleryController::class, 'upload'])->name('upload');

Route::get('/home/edit/{id}', [ImageGalleryController::class, 'edit'])->name('edit');
Route::post('/home/update/{id}', [ImageGalleryController::class, 'update'])->name('update');

Route::delete('/home/delete/{id}', [ImageGalleryController::class, 'delete'])->name('delete');

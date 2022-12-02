<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Bookcontroller;
use App\Http\Controllers\BookController;

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
Route::get('index',[Bookcontroller::class, 'index'])->name('index');
Route::post('store-form', [BookController::class, 'store']);
Route::get('delete/{id}', [BookController::class, 'destroy']);
Route::get('edit/{id}', [BookController::class, 'edit']);
Route::post('edit-author/{id}', [BookController::class, 'update']);
Route::get('export', [BookController::class, 'export']);
Route::post('down', [BookController::class, 'down']);






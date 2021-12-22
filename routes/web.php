<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRequisitionController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);

    Route::get('/book_requisition', [App\Http\Controllers\BookRequisitionController::class, 'index'])->name('book_requisition');
    Route::get('/book_requisition/requisition/{id}', [App\Http\Controllers\BookRequisitionController::class, 'requisition'])->name('requisition');
    Route::post('/requisition_store', [App\Http\Controllers\BookRequisitionController::class, 'requisition_store'])->name('requisition_store');
    Route::get('/approve_requisition/{id}', [App\Http\Controllers\BookRequisitionController::class, 'approve_requisition'])->name('approve_requisition');
    Route::get('/get_returned/{id}', [App\Http\Controllers\BookRequisitionController::class, 'get_returned'])->name('get_returned');
});
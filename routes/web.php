<?php

use App\Http\Controllers\PostController;
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
})->name('main.page');

Route::get('post', 'PostController@index')->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/create', [PostController::class, 'store'])->name('post.store');
Route::get('post/{post}', 'PostController@view')->name('post.view');
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('post/{post}/edit', [PostController::class, 'update'])->name('post.update');
Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
//Route::get()

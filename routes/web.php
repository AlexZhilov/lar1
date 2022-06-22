<?php

use \App\Http\Controllers\Admin\Article\ArticleController;
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
    return view('main');
})->name('main.page');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function(){
    // Post
    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function(){
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/create', 'StoreController')->name('admin.post.store');

        Route::get('/{post}', 'ViewController')->name('admin.post.view');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}/edit', 'UpdateController')->name('admin.post.update');

        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });

    // Article
    Route::resource('article', 'Article\ArticleController');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Route::get('about/{id}/{str}', 'AboutController@index')
//    ->name('about.index')
//    ->where(['id' => '\d', 'str' => '\w\-']);

//Route::match(['post','get'], 'IndexController');

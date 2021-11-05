<?php

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
Auth::routes();

Route::get('/', 'PageController@home')->name('home');
Route::get('/blog', 'PageController@blog')->name('blog');
Route::get('/nosotros', 'PageController@aboutus')->name('aboutus');
Route::get('/contacto', 'PageController@contact')->name('contact');
Route::post('/guardar-contacto', 'PageController@store_contact')->name('leads.store');
Route::post('/suscriber', 'SuscriberController@store')->name('suscribers.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/php', function () {
        return phpinfo();
    });
    Route::post('posts/{post}/change_status','PostController@change_status')->name('posts.change_status');
    Route::resource('posts','PostController');
    Route::get('images/search', 'ImageController@search')->name('images.search');
    Route::resource('images','ImageController');
});

Route::get('/{slug}','PostController@read')->name('posts.read');

<?php

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
Route::get('/dashboard', function () {
    return view('dash.profil');
})->name('dashboard');

Auth::routes();
Route::get('/dashboard', 'PostController@indexuser')->name('dashboard');
Route::get('/stadistica/{id?}', 'PostController@grafica')->name('grafica');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/post', 'PostController');
Route::resource('/comentario', 'ComentarioController');
Route::resource('/like', 'LikeController');
Route::resource('/encuesta', 'EncuestaController');
Route::resource('/opcion', 'OpcionController');

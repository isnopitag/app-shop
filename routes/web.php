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
Route::get('/', 'TestController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')
->group(function () {

Route::get('/products','ProductController@index'); //List products
Route::get('/products/create','ProductController@create'); //crear products (ver formulario)
Route::post('/products','ProductController@store'); //crear products (registrar)
Route::get('/products/{id}/edit','ProductController@edit'); //crear products (ver formulario)
Route::post('/products/{id}/edit','ProductController@update'); //crear products (registrar)
Route::delete('/products/{id}','ProductController@destroy'); //crear products (ver formulario)

Route::get('/products/{id}/images','ImageController@index'); //crear products (ver formulario)
Route::post('/products/{id}/images','ImageController@store'); //crear products (registrar)
Route::delete('/products/{id}/images','ImageController@destroy'); //crear products (ver formulario)
Route::get('/products/{id}/images/select/{image}','ImageController@select');
});



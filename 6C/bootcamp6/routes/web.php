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

Route::resource('/','MainController');
Route::get('hapus/produk/{id}','MainController@destroy');
Route::get('edit/{id}','MainController@edit');
Route::post('product/store','MainController@store');


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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 

Route::get('/automovil','AutomovilController@index')->name('automovil.index');
Route::post('/automovil','AutomovilController@store')->name('automovil.store');
Route::get('/automovil/create','AutomovilController@create')->name('automovil.create');
Route::get('/automovil/{id}/edit','AutomovilController@edit')->name('automovil.edit');
Route::post('/automovil/{id}','AutomovilController@update')->name('automovil.update');
Route::delete('/automovil/{id}','AutomovilController@destroy');
Route::get('/automovil/data','AutomovilController@data');
Route::get('/automovil/{id}','AutomovilController@show')->name('automovil.show');

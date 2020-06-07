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

/*
Route::get('/', function () {
    return view('app');
});*/

//Route::view('/{path?}', 'app');

Route::any('/', 'ContentController@index')->name('contents');
Route::post('store', 'ContentController@store')->name('store');
Route::post('update/{id}', 'ContentController@update')->name('update');
Route::post('destroy/{id}', 'ContentController@destroy')->name('destroy');

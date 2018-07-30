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
Route::get('/', 'PagesController@home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', 'AdminController@home');
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users/create', 'UserController@store');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::post('users/{id}/edit', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');

    Route::get('salons', 'SalonController@index')->name('salons.index');
    Route::get('salons/create', 'SalonController@create');
    Route::post('salons/create', 'SalonController@store');
    Route::get('salons/{id}/edit', 'SalonController@edit');
    Route::post('salons/{id}/edit', 'SalonController@update');
    Route::delete('salons/{id}', 'SalonController@destroy');
});

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
Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function() {
    Route::get('login', 'LoginController@showLoginForm');
    Route::post('login', 'LoginController@login');

    Route::get('logout', 'LoginController@logout');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'AdminController@home');
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users/create', 'UserController@store');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::post('users/{id}/edit', 'UserController@update')->name('users.edit');
    Route::delete('users/{id}', 'UserController@destroy');

    Route::get('salons', 'SalonController@index')->name('salons.index');
    Route::get('salons/create', 'SalonController@create');
    Route::post('salons/create', 'SalonController@store');
    Route::get('salons/{id}/edit', 'SalonController@edit');
    Route::post('salons/{id}/edit', 'SalonController@update');
    Route::delete('salons/{id}', 'SalonController@destroy');

    Route::get('services', 'ServiceController@index')->name('services.index');
    Route::get('services/create', 'ServiceController@create');
    Route::post('services/create', 'ServiceController@store');
    Route::get('services/{id}/edit', 'ServiceController@edit');
    Route::post('services/{id}/edit', 'ServiceController@update');
    Route::delete('services/{id}', 'ServiceController@destroy');

    Route::get('renderbookings', 'RenderBookingController@index')->name('renderbookings.index');
    Route::get('renderbookings/create', 'RenderBookingController@create');
    Route::post('renderbookings/create', 'RenderBookingController@store');
    Route::get('renderbookings/{id}/edit', 'RenderBookingController@edit');
    Route::post('renderbookings/{id}/edit', 'RenderBookingController@update');
    Route::delete('renderbookings/{id}', 'RenderBookingController@destroy');

    Route::get('stylists', 'TimesheetController@index');
    Route::get('stylists/create', 'TimesheetController@create');
    Route::post('stylists/create', 'TimesheetController@store');
    Route::get('stylists/{id}/edit', 'TimesheetController@edit');
    Route::post('stylists/{id}/edit', 'TimesheetController@update');

    Route::get('manage_stylists', 'ManageTimesheetController@index');
    Route::get('manage_stylists/{id}/edit', 'ManageTimesheetController@edit');
    Route::post('manage_stylists/{id}/edit', 'ManageTimesheetController@update');

    Route::get('bookings', 'BookingController@index')->name('bookings.index');
    Route::get('bookings/{id}/edit', 'BookingController@edit');
    Route::post('bookings/{id}/edit', 'BookingController@update');
    Route::delete('bookings/{id}', 'BookingController@destroy');

});
Route::get('home', 'Site\SiteController@create');
Route::post('home', 'Site\SiteController@store');
Route::get('booking', 'Site\SiteController@creates');
Route::post('booking', 'Site\SiteController@stores');
Route::get('bookings', 'Site\SiteController@getThem');
Route::post('bookings', 'Site\SiteController@postThem');
Route::get('bookingss', 'Site\SiteController@getThems');
Route::post('bookingss', 'Site\SiteController@postThems');


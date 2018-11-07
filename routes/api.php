<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello-world', function(Request $request){

    return response()->json('Hello World! Welcome to codingpearls.com', 200);
});

Route::get('/users', 'Admin\UserController@index');

Route::get('/users/create', 'Admin\UserController@create');

Route::post('/users/create', 'Admin\UserController@store');

Route::get('/users/{id}/edit', 'Admin\UserController@edit');

Route::patch('/users/{id}/edit', 'Admin\UserController@update');

Route::delete('/users/{id}', 'Admin\UserController@destroy');

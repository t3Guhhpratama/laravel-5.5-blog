<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Auth
Route::post('login', 'UserController@login');
//Users
Route::get('users', 'UserController@index');
Route::post('users', 'UserController@create');
Route::post('users/upload-photo', 'UserController@uploadPhoto');
Route::post('users/delete-photo', 'UserController@deletePhoto');

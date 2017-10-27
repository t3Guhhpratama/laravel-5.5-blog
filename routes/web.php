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
    return view('child');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('register', 'UserController@create')->name('register.post');
Route::get('register', function(){
  return view('regsiter');
});

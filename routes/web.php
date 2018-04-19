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

Route::get('foo', function () { //<pd>foo => hello World
    return 'Hello World';
});

Route::get('/frontpages', function () {
    return view('frontpages.index');
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name.' with an id of '.$id; //http://senior.lar/users/249/LieuweJelle => This is user LieuweJelle with an id of 249
});
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController');
//Route::get('/users/{id}/edit', 'UserController@edit');
//Route::get('/users/{id}/store', 'UserController@store');

Route::get('/register2', function () {
    return view('auth.register2');
});

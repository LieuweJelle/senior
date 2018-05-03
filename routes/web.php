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
Route::get('/', function () { // (->name('home'); -izm- return redirect()->home();)
    $tasks = ['Watch video', 'Practice', 'Build'];
    return view('welcome', compact('tasks'));
});
Route::view('practice', 'practice');
Route::view('about', 'about');
Route::view('senior', 'senior');
Route::view('social', 'social');

Auth::routes();

Route::get('/home', 'HomeController@index'); //->name('home');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

//http://senior.lar/posts?month=April&year=2018 works.
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

//Route::get('/posts/tags/{tag}', 'PostsController@index'); //indexByTags
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::resource('/users', 'UserController');
//Route::post('/users', 'UserController@index');
/*Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::get('/users/{id}/edit', 'UserController@edit');
Route::post('/users/{id}/store', 'UserController@store');
Route::get('/users/{user}', 'UserController@show');
Route::post('/users/{user}/update', 'UserController@update');*/

Route::get('/users/roles/{role}', 'RolesController@index');

//Route::resource('/roles', 'RoleController');

/* Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/register2', function () {
    return view('auth.register2');
});*/

/*Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy'); //Ook in browser: senior.lar/logout logd je uit */

Route::resource('/agendas', 'AgendaController');
//Route::get('agendas/index', array('uses' => 'AgendaController@index', 'as' => 'agendas.index'));
//Route::get('/users/agendas/{agenda}', 'AgendaController@index');
//Route::get('/users/{user}/agendas', 'AgendaController@show');
//Route::get('/agendas/{agenda}', 'AgendaController@show');

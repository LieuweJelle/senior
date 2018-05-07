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
    $tasks = ['about', 'practice', 'senior', 'social', 'gebruikers'];
    return view('welcome', compact('tasks'));
});
Route::view('about', 'about');
Route::view('practice', 'practice');
Route::view('senior', 'senior');
Route::view('social', 'social');
Route::get('/gebruikers', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index'); //->name('home');

Route::resource('/users', 'UserController');
Route::get('users/{id}/delete', 'UserController@delete');

/*
Route::prefix('users')->group(function () {
  Route::post('/', 'UserController@index');
  Route::get('/', 'UserController@index');
  Route::get('create', 'UserController@create');
  Route::get('{id}/edit', 'UserController@edit');
  Route::post('{id}/store', 'UserController@store');
  Route::get('{user}', 'UserController@show');
  Route::post('{user}/update', 'UserController@update');
}); 
under construction! */

Route::resource('/agendas', 'AgendaController');
Route::get('agendas/create', 'AgendaController@create');
Route::post('agendas/{id}/store', 'AgendaController@store');
Route::get('agendas/{id}/edit', 'AgendaController@edit');
Route::get('agendas/{id}/delete', 'AgendaController@delete');

//Route::get('agendas/index', array('uses' => 'AgendaController@index', 'as' => 'agendas.index'));
//Route::get('/users/agendas/{agenda}', 'AgendaController@index');
//Route::get('/users/{user}/agendas', 'AgendaController@show');
//Route::get('/agendas/{agenda}', 'AgendaController@show');

Route::get('/users/roles/{role}', 'RolesController@index');

//http://senior.lar/posts?month=April&year=2018 works.
Route::prefix('posts')->group(function () {
  Route::get('/', 'PostsController@index');
  Route::get('/create', 'PostsController@create');
  Route::post('/', 'PostsController@store');
  Route::get('/{post}', 'PostsController@show');

  Route::get('/tags/{tag}', 'TagsController@index');

  Route::post('/{post}/comments', 'CommentsController@store');
});

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');
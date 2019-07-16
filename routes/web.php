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
    $tasks = ['front', 'senior', 'social', 'medewerkers', 'blog'];
    return view('welcome', compact('tasks'));
});
Route::get('/front', function () { 
    $tasks = ['senior', 'social', 'medewerkers', 'blog'];
    return view('front', compact('tasks'));
});

Route::view('senior', 'senior');
Route::view('social', 'social');

Route::get('/medewerkers', 'UserController@index');
Route::get('/blog', 'PostsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index'); //->name('home');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('users/indexall', '\App\Http\Controllers\UserController@indexall');
Route::resource('/users', 'UserController');
Route::get('users/{id}/delete', 'UserController@delete');

Route::get('/users/roles/{role}', 'RolesController@index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
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
Route::get('agendas/{id}', 'AgendaController@show');
Route::post('agendas/{id}/store', 'AgendaController@store');
Route::get('agendas/{id}/edit', 'AgendaController@edit');
Route::get('agendas/{id}/delete', 'AgendaController@delete');

//Route::get('agendas/index', array('uses' => 'AgendaController@index', 'as' => 'agendas.index'));
//Route::get('/users/agendas/{agenda}', 'AgendaController@index');
//Route::get('/users/{user}/agendas', 'AgendaController@show');
//Route::get('/agendas/{agenda}', 'AgendaController@show');

//http://senior.lar/posts?month=April&year=2018 works.
Route::get('/posts/disableComment/{id}', 'PostsController@disableComment');
Route::post('/posts/search', 'PostsController@search');
Route::resource('/posts', 'PostsController');
/*Route::prefix('posts')->group(function () {
  Route::get('/', 'PostsController@index');
  Route::get('/create', 'PostsController@create');
  Route::get('/edit/{id}', 'PostsController@edit');
  Route::post('/', 'PostsController@store');
  Route::get('/{post}', 'PostsController@show');
  Route::post('/update/{id}', 'PostsController@update');*/

  Route::get('/posts/tags/{tag}', 'TagsController@index');

  Route::post('/posts/{post}/comments', 'CommentsController@store');
  Route::get('/posts/comments/{comment}', 'CommentsController@destroy');
  
//});
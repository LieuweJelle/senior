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
Route::get('/', function () { //rechtstreeks zonder Controller
    //$tasks = ['Watch video', 'Practice', 'Build'];
    //return view('welcome', compact('tasks'));
    $tasks = DB::table('tasks')->get();
    return $tasks;
});
Route::get('practice', function () {
    return view('practice');
});

Route::get('about', function () {
    return view('about');
});

//Auth::routes();

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::resource('/users', 'UserController');
//Route::post('/users', 'UserController@index');
//Route::get('/users/{id}/edit', 'UserController@edit');
//Route::get('/users/{id}/store', 'UserController@store');

Route::resource('/roles', 'RoleController');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/register2', function () {
    return view('auth.register2');
});

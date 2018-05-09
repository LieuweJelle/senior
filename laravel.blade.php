<h1>Routing</h1>
<?php
//If you ever return a database-query from a route, Laravel automatically casts that to JSON.

//Implicit Binding
//Laravel automatically resolves Eloquent models defined in routes or controller actions whose type-hinted variable names match a route segment name. For example:

Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});

//Customizing The Key Name
//If you would like model binding to use a database column other than id when retrieving a given model class, you may override the getRouteKeyName method on the Eloquent model:

public function getRouteKeyName()
{
    return 'slug';
}
?>

<form action="/foo/bar" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
//You may use the @method Blade directive to generate the _method input:

<form action="/foo/bar" method="POST">
    @method('PUT')
    @csrf
</form>
<h1>Query Builder</h1>
<p>DB::table('users')->get()</p>
<p>DB::table('users')->latest()->get()</p>

<p>DB::table('users')->where('created_at', '>=', ...)</p>
<h1>Middleware</h1>
<p>app/Http/Middleware</p>
php artisan make:middleware CheckAge
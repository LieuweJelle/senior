@extends('posts.postmaster')
{{-- @extends('layouts.master') --}}

@section('content')
  <div class="col-sm-8">
    <h1>Sign in</h1>
    
    <form method="POST" action="/login">
    @csrf
    <!--<div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
    </div>-->

     <div class="form-group">
      <label for="email">Email Address:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
    
    <div class="form-group">
      <label for="password_conformation">Password:</label>
      <input type="password" class="form-control" id="password_conformation" name="password_conformation" placeholder="Password" required>
    </div>

    <!--<div class="form-group">
      <label for="password">Password Conformation</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>-->

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
    
    @include('layouts.error')
    
</div>
@endsection
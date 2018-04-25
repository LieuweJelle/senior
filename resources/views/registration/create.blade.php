@extends('layouts.master')

@section('content')
  <div class="col-sm-8">
    <h1>Register</h1>
    
    <form method="POST" action="/register">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
    </div>

     <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
    
    <div class="form-group">
      <label for="password_confirmation">Password</label>
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
    </div>

    <div class="form-group">
      <label for="password">Password Confirmation</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
    
    @include('layouts.error')
    
</div>
@endsection
@extends('posts.postmaster')

@section('content')
  <h1>Create the post</h1>
  <hr />
  <form method="POST" action="/posts">
    @csrf
    <div class="form-group">
      <label for="title">Titel</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Titel">
    </div>
    
    <!--<div class="form-group">
      <label for="user_id">User id</label>
      <input type="text" class="form-control" id="user_id">
    </div>-->
    
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" name="body" placeholder="Body"></textarea>
    </div>
    
    <!--<div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" id="exampleInputFile">
    </div>-->
    
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add Post</button>
    </div>
    @include('layouts.error')
    
  </form>
@endsection
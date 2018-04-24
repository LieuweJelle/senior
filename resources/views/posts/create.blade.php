@extends('layouts.master')

@section('content')

  <h1>A place to create the post</h1>
  
  <form action="/posts">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Titel</label>
      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Titel">
    </div>
    
    <div class="form-group">
      <label for="exampleInputPassword1">Body</label>
      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Body">
    </div>
    
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" id="exampleInputFile">
      <p class="help-block">Example block-level help text here.</p>
    </div>
    
    <div class="checkbox">
      <label>
        <input type="checkbox"> Check me out
      </label>
    </div>
    
    <div class="form-group">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
    @include('layouts.errors')
  </form>
  
  
@endsection
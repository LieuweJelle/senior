@extends('senior.app')

@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="card border-danger mb-3" style="max-width: 20rem; text-align: right; position: absolute; right: 50px; top:200px;">
      <div class="card-header">Keep it as simple as possible</div>
      <div class="card-body text-danger">
        <h1 class="card-title">Hulp</h1>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <button type="button" class="btn btn-outline-danger btn-lg btn-block">Danger</button>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card border-info mb-3" style="max-width: 20rem; position: absolute; left: 50px; top:200px;">
      <div class="card-header">Keep it as simple as possible</div>
      <div class="card-body text-info">
        <h1 class="card-title">Sociaal</h1>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <button type="button" class="btn btn-outline-info btn-lg btn-block" onclick="javascript:location.href='social'">Info</button>
      </div>
    </div>
  </div>
</div>
@endsection

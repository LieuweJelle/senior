@extends('layouts.frontapp')

@section('content')
<div class="container">
  <ul>
    @foreach($tasks as $task)
      <li><a href="{{ url($task) }}">{{ $task }}</a></li>
    @endforeach
  </ul>
</div>
<!-- <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<Link rel="stylesheet" type="text/css" href="../../css/front.css">
</head>
<body> -->

<div class="slideshow-container">
<h2>De web-site voor de hele wijk.</h2>
<p>Voor ouderen, voor iedereen die wil helpen.</p>

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img/slider-2.jpg" style="width:100%">
  <div class="text">Caption One</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img/slider-3.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img/slider-1.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<!-- <script src="../../js/front.js"></script> -->
@endsection
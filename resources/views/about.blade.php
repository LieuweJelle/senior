<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Senior') }}</title>

        <!-- Scripts
        <script src="{{ asset('js/app.js') }}" defer></script> -->
        <!-- Fonts
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('foundation/css/foundation.min.css') }}">
        <script src="{{ asset('foundation/js/vendor/jquery.js') }}"></script>
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <script src="{{ asset('js/foundation-datepicker.js') }}"></script>
        <script src="{{ asset('js/locales/foundation-datepicker.nl.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('css/foundation-datepicker.min.css') }}">
        <!-- foundation datepicker end -->
        <link rel="stylesheet" href="{{ asset('css/example.css') }}">

        <!-- Styles
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/senior.css') }}" rel="stylesheet"> -->

    </head>
    <body style="margin-top:30px;">
<script>
$('.fdatepicker').fdatepicker({
  language: 'nl'
});
</script> 

		<div class="container">
        <ul>
            <li><h1>About Us</h1></li>
        </ul>

			<div class="row">

				<div class="small-9 columns">
<hr />
					<input type="text" class="span2" value="04-05-2018 14:10" id="dpt">
<script>
$(function(){
  $('#dpt').fdatepicker({
		format: 'dd-mm-yyyy hh:ii',
		disableDblClickSelection: true,
		language: 'nl',
		pickTime: true
	});
});
</script>					<hr>
					<input type="text" class="span2" value="04-05-2018 14:10" id="dpt2">
<script>
$(function(){
  $('#dpt2').fdatepicker({
		format: 'dd-mm-yyyy hh:ii',
		disableDblClickSelection: true,
		language: 'nl',
		pickTime: true
	});
});
</script>					<hr>
          </div></div></div>
 		<script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.js"></script>
    
    </body>
</html>

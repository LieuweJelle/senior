@extends('agendas.app')

@section('content')
  @include('agendas.all')

<script>
$('.fdatepicker').fdatepicker({
  language: 'nl'
});
</script> 
<div class="container">
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
    </script>
		<hr />
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
    </script>
    <hr>
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.js"></script>
@endsection
@extends('agendas.app')

@section('content')
<div class="container">
    <h1>Toevoegen</h1>
    @include('agendas.all')
    <div class="card">
        <div class="card-header">{{ __('Waarmee wilt u helpen') }}</div>
        
        <div class="card-body">
            <form method="POST" action="{{ route('agendas.store') }}">
            @csrf
            <input type="hidden" value="{{ $user->id }}" id="hidden" name="hidden">
            @foreach($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="radio" value="{{ $role->id }}" id="defaultCheck{{ $role->id }}" name="radio_list" required>
                <label class="form-check-label" for="defaultCheck{{ $role->id }}">
                  {{ __($role->name) }}
                </label>
            </div>
            @endforeach
        </div>
    </div>
    <script>
    $('.fdatepicker').fdatepicker({
      language: 'nl'
    });
    </script> 
    <hr />
    <div class="card">
        <div class="card-header">{{ __('Wanneer wilt u helpen') }}</div>

        <div class="card-body">
            <div class="form-check">
                Van:&nbsp;<input type="text" class="span2" value="04-05-2018 14:10" id="dpt1" name="dpt1">
                <script>
                $(function(){
                  $('#dpt1').fdatepicker({
                    format: 'dd-mm-yyyy hh:ii',
                    disableDblClickSelection: true,
                    language: 'nl',
                    pickTime: true
                  });
                });
                </script>
                
                &nbsp;&nbsp;&nbsp;&nbsp;Tot:&nbsp;<input type="text" class="span2" value="04-05-2018 14:10" id="dpt2" name="dpt2">
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
            </div>
        </div>
   
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Opslaan') }}
                </button>
                <a href="/users/{{$user->id}}/edit" class="btn btn-outline-primary">
                    {{ __('Terug') }}
                </a>
            </div>
        </div><br /><br />
        
    </div>
    </form>
</div>
@endsection
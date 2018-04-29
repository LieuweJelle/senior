@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Waarmee wilt u helpen') }}</div>

                <div class="card-body">
                <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {{ __('Boodschappen') }}
  </label>
</div>
                <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {{ __('Klusjes') }}
  </label>
</div>
                <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {{ __('Huishoudelijke hulp') }}
  </label>
</div>
                 <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {{ __('Op visite gaan') }}
  </label>
</div>
                  <form method="POST" action="/register2">
                        @csrf
                
                        <div class="form-group row">
                            <label for="boodschappen" class="col-md-4 col-form-label text-md-right">{{ __('Boodschappen') }}</label>

                            <div class="col-md-6">
                                <input id="boodschappen" type="checkbox" class="form-control{{ $errors->has('boodschappen') ? ' is-invalid' : '' }}" name="boodschappen" value="{{ old('boodschappen') }}" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="klusjes" class="col-md-4 col-form-label text-md-right">{{ __('Klusjes') }}</label>

                            <div class="col-md-6">
                                <input id="klusjes" type="checkbox" class="form-control{{ $errors->has('klusjes') ? ' is-invalid' : '' }}" name="klusjes" value="{{ old('klusjes') }}" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="hh" class="col-md-4 col-form-label text-md-right">{{ __('Huishoudelijke hulp') }}</label>

                            <div class="col-md-6">
                                <input id="hh" type="checkbox" class="form-control{{ $errors->has('hh') ? ' is-invalid' : '' }}" name="hh" value="{{ old('hh') }}" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="opvg" class="col-md-4 col-form-label text-md-right">{{ __('Op visite gaan') }}</label>

                            <div class="col-md-6">
                                <input id="opvg" type="checkbox" class="form-control{{ $errors->has('opvg') ? ' is-invalid' : '' }}" name="opvg" value="{{ old('opvg') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="viou" class="col-md-8 col-form-label text-md-left">{{ __('Vertel iets over u zelf (werk, hobby\'s, interesses )') }}</label>
                            <textarea rows="4" cols="80" class="form-control{{ $errors->has('viou') ? ' is-invalid' : '' }}" name="viou" value="{{ old('viou') }}" required autofocus></textarea>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registreren') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gebruikersnaam') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telefoon') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required>

                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Bevestig wachtwoord') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <br />
                        
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Straatnaam') }}</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}" required autofocus>

                                @if ($errors->has('street'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="streetnumber" class="col-md-4 col-form-label text-md-right">{{ __('Straatnummer') }}</label>

                            <div class="col-md-6">
                                <input id="streetnumber" type="text" class="form-control{{ $errors->has('streetnumber') ? ' is-invalid' : '' }}" name="streetnumber" value="{{ old('streetnumber') }}" required autofocus>

                                @if ($errors->has('streetnumber'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('streetnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ old('zipcode') }}" required autofocus>

                                @if ($errors->has('zipcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">{{ __('Woonplaats') }}</label>

                            <div class="col-md-6">
                                <input id="place" type="text" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" value="{{ old('place') }}" required autofocus>

                                @if ($errors->has('place'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                </div>
                <div class="card-header">{{ __('Waarmee wilt u helpen') }}</div>

                <div class="card-body">
                
                        <div class="form-group row">
                            <label for="boodschappen" class="col-md-4 col-form-label text-md-right">{{ __('Boodschappen') }}</label>

                            <div class="col-md-6">
                                <input id="boodschappen" type="checkbox" class="form-control{{ $errors->has('boodschappen') ? ' is-invalid' : '' }}" name="boodschappen" value="{{ old('boodschappen') }}" required autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="klusjes" class="col-md-4 col-form-label text-md-right">{{ __('Klusjes') }}</label>

                            <div class="col-md-6">
                                <input id="klusjes" type="checkbox" class="form-control{{ $errors->has('klusjes') ? ' is-invalid' : '' }}" name="klusjes" value="{{ old('klusjes') }}" required autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="hh" class="col-md-4 col-form-label text-md-right">{{ __('Huishoudelijke hulp') }}</label>

                            <div class="col-md-6">
                                <input id="hh" type="checkbox" class="form-control{{ $errors->has('hh') ? ' is-invalid' : '' }}" name="hh" value="{{ old('hh') }}" required autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="opvg" class="col-md-4 col-form-label text-md-right">{{ __('Op visite gaan') }}</label>

                            <div class="col-md-6">
                                <input id="opvg" type="checkbox" class="form-control{{ $errors->has('opvg') ? ' is-invalid' : '' }}" name="opvg" value="{{ old('opvg') }}" required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="viou" class="col-md-8 col-form-label text-md-left">{{ __('Vertel iets over u zelf (hobby\'s, interesses )') }}</label>
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
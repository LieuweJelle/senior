@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verwijderen') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.destroy', [ 'id' => $user->id ]) }}">
                        @csrf
                        @method('DESTROY')

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $user->firstname }}" readonly>

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
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $user->lastname }}" disabled>

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
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" disabled>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" disabled>

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
                                <input id="telephone" type="text" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ $user->telephone }}" disabled>

                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--<div class="form-group row">
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
                        </div>-->
                        
                        <br />
                        
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Straatnaam') }}</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ $user->street }}" disabled>

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
                                <input id="streetnumber" type="text" class="form-control{{ $errors->has('streetnumber') ? ' is-invalid' : '' }}" name="streetnumber" value="{{ $user->streetnumber }}" disabled>

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
                                <input id="zipcode" type="text" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ $user->zipcode }}" disabled>

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
                                <input id="place" type="text" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" value="{{ $user->place }}" disabled>

                                @if ($errors->has('place'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br />

                        <div class="card">
                          <div class="card-header">{{ __('Waarmee wilt u helpen') }}</div>
                          
                          <div class="card-body">
                              @foreach($roles as $role)
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="{{ $role->id }}" id="defaultCheck{{ $role->id }}" name="check_list[]" {{($user->roles->contains($role->id)) ? "checked" : ""}} disabled>
                                  <label class="form-check-label" for="defaultCheck{{ $role->id }}">
                                    {{ __($role->name) }}
                                  </label>
                              </div>
                              @endforeach
                          </div>
                       </div><br />
                       <div class="card"> 
                          <div class="card-header">{{ __('Vertel iets over u zelf (werk, hobby\'s, interesses )') }}</div>
                    
                        <div class="form-group"><br />
                            <textarea rows="4" cols="10" class="ta" name="intro" id="intro" readonly>{{ $user->intro }}</textarea>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verwijderen') }}
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

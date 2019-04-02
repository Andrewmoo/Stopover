@extends('layouts.app')

@section('content')
<div class="container">
    <div id="loginRow" class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header tertiaryColor text-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail or Username') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                            <div class="col-md-8 offset-md-4" href="#">
                                <a class="btn btn-link" id="noAcc">
                                    I don't have an account.
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="registerRow" class="row justify-content-center mt-4 mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header tertiaryColor text-white">Guest Registration</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{Form::hidden('role_id', '1')}}

                        <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username*:</label>
    
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
    
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail address*:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password*:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm password*:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <div id="guestInfo">
                            <div class="form-group row">
                                {{Form::label('firstName', 'First name*:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="firstName" name="firstName" value="{{old('firstName')}}" type="text" class="form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('firstName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('lastName', 'Last name*:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="lastName" name="lastName" value="{{old('lastName')}}" type="text" class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('lastName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                    @endif
                                    {{-- {{Form::text('lastName', old('lastName'), ['class' => 'form-control', 'placeholder' => 'Your last name'])}} --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('guest_address', 'Address*:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="guest_address" name="guest_address" value="{{old('guest_address')}}" type="text" class="form-control {{ $errors->has('guest_address') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('guest_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guest_address') }}</strong>
                                        </span>
                                    @endif
                                    {{-- {{Form::text('guest_address', old('address'), ['class' => 'form-control', 'placeholder' => 'Street name, city, province'])}} --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('guest_phone', 'Phone*:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="guest_phone" name="guest_phone" value="{{old('guest_phone')}}" type="text" class="form-control {{ $errors->has('guest_phone') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('guest_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guest_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-primary tertiaryColor">
                                    {{ __('REGISTER') }}
                                </button>
                                <a href="#" id="yesAcc">I already have an account.</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // hide register initially
    $('#registerRow').hide();
    $( document ).ready(function () {

        $( '#noAcc' ).click(function () {
            $('#registerRow').show();
            $('#loginRow').hide();
        });

        $( '#yesAcc' ).click(function () {
            $('#registerRow').hide();
            $('#loginRow').show();
        });

        $( 'input' ).click(function () {
            $(this).removeClass('is-invalid');
        });
    })
</script>
@endsection

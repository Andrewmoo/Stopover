@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header tertiaryColor text-white">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="card-title">
                            <h3 class="text-info">Account Information</h3>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">Account type:</label>
                            <div class="col-md-6">
                                {{-- <select class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" id="role_id" required autofocus>
                                    <option value="1" selected>Guest</option>
                                    <option value="3">Hotel</option>
                                </select> --}}
                                <a id="role_guest" class="text-white btn btn-primary">Guest</a>
                                <a id="role_hotel" class="text-white btn btn-secondary">Hotel</a>
                                @if(empty(old('role_id')))
                                    {{Form::hidden('role_id', '1')}}
                                @else
                                    {{Form::hidden('role_id', old('role_id'))}}
                                @endif

                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username:</label>
    
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail address:</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm password:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        
                        <div id="guestInfo" class="card-title text-dark">
                            <h3 class="text-info">Guest Information</h3>
                            <div class="form-group row">
                                {{Form::label('firstName', 'First name:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="firstName" name="firstName" value="{{old('firstName')}}" type="text" class="form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}" required>
                                    @if ($errors->has('firstName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('lastName', 'Last name:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="lastName" name="lastName" value="{{old('lastName')}}" type="text" class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}" required>
                                    @if ($errors->has('lastName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                    @endif
                                    {{-- {{Form::text('lastName', old('lastName'), ['class' => 'form-control', 'placeholder' => 'Your last name'])}} --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('guest_address', 'Address:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="guest_address" name="guest_address" value="{{old('guest_address')}}" type="text" class="form-control {{ $errors->has('guest_address') ? ' is-invalid' : '' }}" required>
                                    @if ($errors->has('guest_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guest_address') }}</strong>
                                        </span>
                                    @endif
                                    {{-- {{Form::text('guest_address', old('address'), ['class' => 'form-control', 'placeholder' => 'Street name, city, province'])}} --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('guest_phone', 'Phone number:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="guest_phone" name="guest_phone" value="{{old('guest_phone')}}" type="text" class="form-control {{ $errors->has('guest_phone') ? ' is-invalid' : '' }}" required>
                                    @if ($errors->has('guest_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guest_phone') }}</strong>
                                        </span>
                                    @endif
                                    {{-- {{Form::text('guest_phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'e.g. +353 867868954'])}} --}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('institution', 'Institution:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    <input id="institution" name="institution" value="{{old('institution')}}" type="text" class="form-control {{ $errors->has('institution') ? ' is-invalid' : '' }}" required>
                                    @if ($errors->has('institution'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('institution') }}</strong>
                                        </span>
                                    @endif
                                    {{-- {{Form::text('institution', old('institution'), ['class' => 'form-control', 'placeholder' => 'Name of university/college/institute'])}} --}}
                                </div>
                            </div>
                        </div>

                        <div id="hotelInfo" class="card-title">
                            <h3 class="text-info">Hotel Information</h3>
                            <div class="form-group row">
                                {{Form::label('name', 'Name:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                {{Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name of hotel'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('hotel_address', 'Address:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    {{Form::text('hotel_address', old('address'), ['class' => 'form-control', 'placeholder' => 'Street name, city, province'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('country', 'Country:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    {{Form::text('country', old('country'), ['class' => 'form-control', 'placeholder' => 'Country'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('hotel_phone', 'Phone:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    {{Form::text('hotel_phone', old('hotel_phone'), ['class' => 'form-control', 'placeholder' => 'e.g. +353 867868954'])}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
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
<script>
    // hide hotel specific portion of the form initially
    $('#hotelInfo').hide();
    $( document ).ready(function () {

        // click event for Guest button
        $( '#role_guest' ).click(function () {
            if($('#role_guest').hasClass('btn-secondary')) {

                // swap classes on buttons
                $(this).removeClass('btn-secondary').addClass('btn-primary');
                $('#role_hotel').removeClass('btn-primary').addClass('btn-secondary');

                // change hidden role_id field value
                $("input[name=role_id]").val('1');

                // change visibility of relevant form portions
                $('#guestInfo').show();
                $('#hotelInfo').hide();
            }
        });

        // click event for Hotel button
        $( '#role_hotel' ).click(function () {
            if($('#role_hotel').hasClass('btn-secondary')) {

                // swap classes on buttons
                $(this).removeClass('btn-secondary').addClass('btn-primary');
                $('#role_guest').removeClass('btn-primary').addClass('btn-secondary');

                // change hidden role_id field value
                $("input[name=role_id]").val('3');

                // change visibility of relevant form portions
                $('#guestInfo').hide();
                $('#hotelInfo').show();
            }
        });

        $( 'input' ).click(function () {
            $(this).removeClass('is-invalid');
        });
    })
</script>
@endsection

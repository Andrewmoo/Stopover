@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="card-title">
                            <h3>Account Information</h3>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Account type') }}</label>
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
    
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        
                        <div id="guestInfo" class="card-title">
                            <h3>Guest Information</h3>
                        </div>

                        <div id="hotelInfo" class="card-title">
                            <h3>Hotel Information</h3>
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
<script>
    $( document ).ready(function () {
        // hide hotel specific portion of the form initially
        $('#hotelInfo').hide();

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
    })
</script>
@endsection

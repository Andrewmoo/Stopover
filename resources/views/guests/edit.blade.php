@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card text-white secondaryColor mb-3">
                <div class="card-header">Edit details</div>
                <div class="card-body">
                    {!! Form::open(['action' => ['GuestsController@update', $guest->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'PUT')}}
                    <div class="form-group row">
                        {{Form::label('firstName', 'First Name:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                        <input type="text" name="firstName" value="{{$guest->firstName}}" class="form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}">
                        @if ($errors->has('firstName'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('lastName', 'Last Name:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                        <input type="text" name="lastName" value="{{$guest->lastName}}" class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}">
                        @if ($errors->has('lastName'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastName') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('address', 'Address:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                            {{Form::text('address', $guest->address, ['class' => 'form-control', 'placeholder' => 'Street name, town/city'])}}
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('email', 'Contact email:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                            {{Form::text('email', $guest->email, ['class' => 'form-control', 'placeholder' => 'e.g. Dublin'])}}
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('phone', 'Phone:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                            {{Form::text('phone', $guest->phone, ['class' => 'form-control', 'placeholder' => 'e.g. +353 867868954'])}}
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        {{Form::submit('UPDATE', ['class' => 'btn btn-lg btn-primary tertiaryColor'])}}
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card secondaryColor text-white">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <div class="list-group primaryColor">
            
                        @include('inc.guestdashmenu')
            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
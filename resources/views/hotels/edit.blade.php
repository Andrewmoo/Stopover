@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card text-white secondaryColor mb-3">
                <div class="card-header">Edit details</div>
                <div class="card-body">
                    {!! Form::open(['action' => ['HotelsController@update', $hotel->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'PUT')}}
                    <div class="form-group row">
                        {{Form::label('name', 'Name:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                        <input type="text" name="name" value="{{$hotel->name}}" class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}" placeholder="Name of hotel">
                        @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('address', 'Address:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                            {{Form::text('address', $hotel->address, ['class' => 'form-control', 'placeholder' => 'Street name, town/city'])}}
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('county', 'County:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                            {{Form::text('county', $hotel->county, ['class' => 'form-control', 'placeholder' => 'e.g. Dublin'])}}
                            @if ($errors->has('county'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('county') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('email', 'Contact email:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                            {{Form::text('email', $hotel->email, ['class' => 'form-control', 'placeholder' => 'e.g. Dublin'])}}
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('eircode', 'Eircode:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                            {{Form::text('eircode', $hotel->eircode, ['class' => 'form-control', 'placeholder' => 'e.g. A96KH79'])}}
                            @if ($errors->has('eircode'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('eircode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('phone', 'Phone:', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                        <div class="col-md-6">
                            {{Form::text('phone', $hotel->phone, ['class' => 'form-control', 'placeholder' => 'e.g. +353 867868954'])}}
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
            
                        @if(Auth::user()->hasRole('hotel'))
                        @include('inc.hoteldashmenu')
                        @endif
            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
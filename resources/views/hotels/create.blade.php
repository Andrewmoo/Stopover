@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Add hotel information</h1>
  {!! Form::open(['action' => 'HotelsController@store', 'method' => 'POST']) !!}
    <div class="form-group text-white">
      {{Form::label('name', 'Name:')}}
      {{Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name of hotel'])}}
    </div>
    <div class="form-group text-white">
      {{Form::label('address', 'Address:')}}
      {{Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Street name, city, province'])}}
    </div>
    <div class="form-group text-white">
        {{Form::label('country', 'Country:')}}
        {{Form::text('country', old('country'), ['class' => 'form-control', 'placeholder' => 'Country'])}}
    </div>
    <div class="form-group text-white">
        {{Form::label('phone', 'Phone number:')}}
        {{Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'e.g. +353 867868954'])}}
    </div>
    <div class="form-group text-white">
        {{Form::label('email', 'Email address:')}}
        {{Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'example@example.com'])}}
    </div>
    {{Form::hidden('user_id', $user_id)}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection

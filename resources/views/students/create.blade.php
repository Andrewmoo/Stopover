@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Complete your information</h1>
  {!! Form::open(['action' => 'StudentsController@store', 'method' => 'POST']) !!}
    <div class="form-group cPost">
      {{Form::label('firstName', 'First name:')}}
      {{Form::text('firstName', old('firstName'), ['class' => 'form-control', 'placeholder' => 'Your first name'])}}
    </div>
    <div class="form-group cPost">
      {{Form::label('lastName', 'Last name:')}}
      {{Form::text('lastName', old('lastName'), ['class' => 'form-control', 'placeholder' => 'Your last name'])}}
    </div>
    <div class="form-group cPost">
      {{Form::label('email', 'Email address:')}}
      {{Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'example@example.com'])}}
    </div>
    <div class="form-group cPost">
      {{Form::label('address', 'Address:')}}
      {{Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Street name, city, province'])}}
    </div>
    <div class="form-group cPost">
      {{Form::label('phone', 'Phone number:')}}
      {{Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'e.g. +353 867868954'])}}
    </div>
    <div class="form-group cPost">
      {{Form::label('institution', 'Institution:')}}
      {{Form::text('institution', old('institution'), ['class' => 'form-control', 'placeholder' => 'Name of university/college/institute'])}}
    </div>
    {{Form::hidden('user_id', $user_id)}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection

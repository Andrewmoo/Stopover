@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Book </h1>
  {!! Form::open(['action' => ['BookingsController@update', $booking->id], 'method' => 'POST']) !!}
    <div class="form-group text-white">
      {{Form::label('from', 'Date of check-in:')}}
      {{Form::date('from', $booking->from, ['class' => 'form-control'])}}
    </div>
    <div class="form-group text-white">
      {{Form::label('to', 'Date of check-out:')}}
      {{Form::date('to', $booking->to, ['class' => 'form-control'])}}
    </div>
    {{Form::hidden('guest_id', $booking->guest_id)}}
    {{Form::hidden('room_id', $booking->room_id)}}
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection

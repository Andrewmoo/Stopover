@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Book </h1>
  {!! Form::open(['action' => 'BookingsController@store', 'method' => 'POST']) !!}
    <div class="form-group cPost">
      {{Form::label('from', 'Date of check-in:')}}
      {{Form::date('from', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group cPost">
      {{Form::label('to', 'Date of check-out:')}}
      {{Form::date('to', '', ['class' => 'form-control'])}}
    </div>
    {{Form::hidden('student_id', $student_id)}}
    {{Form::hidden('room_id', $room_id)}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection

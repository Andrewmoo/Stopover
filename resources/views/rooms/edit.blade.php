@extends('layouts.app')
@section('content')
  <h1>Edit Room</h1>
  {!! Form::open(['action' => ['RoomsController@update', $room->room_id], 'method' => 'POST']) !!}
    <div class = "form-group cPost">
      {{Form::label('description', 'Description')}}
      {{Form::textarea('description', $room->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class = "form-group cPost">
      {{Form::label('facilities', 'Facilities')}}
      {{Form::textarea('facilities', $room->facilities, ['class' => 'form-control', 'placeholder' => 'Facilities'])}}
    </div>
    <div class = "form-group cPost">
      {{Form::label('noBeds', 'Number Of Beds')}}
      {{Form::selectRange('noBeds', 1, 6)}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection

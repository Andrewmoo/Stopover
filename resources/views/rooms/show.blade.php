@extends('layouts.app')
@section('content')
  <a href="/rooms" class="btn btn-light" role="button">Go Back</a>
  <h1>Room number {{$room->room_id}}</h1>
  <div class="cPost">
    Description: {!!$room->description!!}
  </div>
  <div class="cPost">
    Facilities: {!!$room->facilities!!}
  </div>
  <div class="cPost">
    Number of beds: {!!$room->beds!!}
  </div>
  <hr>
  <small class="cPost">Listed on {{$room->created_at}}</small>
  <hr>
      <a href="/rooms/{{$room->room_id}}/edit" class="btn btn-default">Edit</a>

      {!!Form::open(['action' => ['RoomsController@destroy', $room->room_id], 'method' => 'POST', 'class'=> 'float-right'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {!!Form::close()!!}
@endsection

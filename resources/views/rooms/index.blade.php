@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Rooms</h1>
  @if(count($rooms) > 0)
    @foreach($rooms as $room)
      <div class="card cardMargin">
        <div class="card-body">
          <h2><a href="/rooms/{{$room->id}}">Room {{$room->id}}</a></h2>
          <small>Listed on {{$room->created_at}}</small>
        </div>
      </div>
    @endForeach
    {{$rooms->links()}}
  @else
    <p>No rooms found</p>
  @endif
</div>
@endsection

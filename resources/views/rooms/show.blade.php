@extends('layouts.app')
@section('content')
    <div class="card mt-3 mb-3">
        <h5 class="card-header">Listing {{$room->id}}</h5>
        <div class="card-body">
            @if($room->booked == 1)
                <del>
            @endif

            <div class="row">
              <div class="col-8 col-sm-8">
                <!-- Single beds -->
                @if($room->singleBeds > 0)
                    <p>
                        {{$room->singleBeds}} single bed(s)
                    </p>
                @endif

                <!-- Double beds -->
                @if($room->doubleBeds > 0)
                    <p>
                        {{$room->doubleBeds}} double bed(s)
                    </p>
                @endif

                <!-- Bathroom/en-suite -->
                <p>
                    @if($room->bathroom == 0)
                        No bathroom in room.
                    @else
                        En-suite.
                    @endif
                </p>

                <!-- Wi-Fi -->
                <p>
                    @if($room->wifi == 0)
                        No free Wi-Fi.
                    @else
                        Free Wi-Fi.
                    @endif
                </p>

                <!-- Wi-Fi -->
                <p>
                    @if($room->parking == 0)
                        No free parking.
                    @else
                        Free parking.
                    @endif
                </p>

                <!-- Wi-Fi -->
                <p>
                    @if($room->breakfast == 0)
                        Breakfast not included.
                    @else
                        Breakfast included.
                    @endif
                </p>

                <!-- Price -->
                <p>
                    Price: €{{$room->price}}
                </p>
                @if((!Auth::guest() && auth()->user()->type == 'admin') || (!Auth::guest() && auth()->user()->type == 'hotel'))
                    {!!Form::open(['action' => ['RoomsController@destroy', $room->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    <a href="/rooms/{{$room->id}}/edit" class="btn btn-primary">Edit</a>
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                @else
                    <!-- booking link -->
                    @if($room->booked == 0)
                        <a class="btn btn-primary" href="/bookings/create/{{$room->id}}">Book</a>
                    @endif
                @endif
              </div>
              <div class="col-4 col-sm-4">
                  <img src="/storage/images/room_images/{{$room->room_image}}">
              </div>
            </div>

            @if($room->booked == 1)
                </del> <p class="text-danger">Apologies. This room is already booked.</p>
            @endif
        </div>
    </div>
@endsection

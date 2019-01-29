@extends('layouts.app')
@section('content')
    <div class="card mt-3 mb-3">
        <h5 class="card-header">Listing {{$room->id}}</h5>
        <div class="card-body">
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
            @if(auth()->user()->type == 'admin' || auth()->user()->type == 'hotel')
                {!!Form::open(['action' => ['RoomsController@destroy', $room->room_id], 'method' => 'POST', 'class'=> 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                <a href="/rooms/{{$room->id}}/edit" class="btn btn-primary">Edit</a>
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @else
                <!-- booking form here -->
            @endif
        </div>
    </div>
@endsection

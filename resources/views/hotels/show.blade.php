@extends('layouts.app')
@section('content')
    <div class="card">
        <h1 class="card-header">{{$hotel->name}}</h1>
        <div class="card-body">
            <div class="row">
                <div class="col-2 border-right">
                    Address:
                </div>
                <div class="col-6">
                    {{$hotel->address}}
                </div>
            </div>
            <div class="row">
                <div class="col-2 border-right border-top">
                    Country:
                </div>
                <div class="col-6 border-top">
                    {{$hotel->country}}
                </div>
            </div>
            <div class="row">
                <div class="col-2 border-right border-top">
                    Phone number:
                </div>
                <div class="col-6 border-top">
                    {{$hotel->phone}}
                </div>
            </div>
            <div class="row">
                <div class="col-2 border-right border-top">
                    Contact email:
                </div>
                <div class="col-6 border-top">
                    {{$hotel->email}}
                </div>
            </div>
            <div class="row">
                <div class="col-2 border-right border-top">
                    Rooms available:
                </div>
                <div class="col-6 border-top">
                    {{count($rooms)}}
                </div>
            </div>

            @if(!Auth::guest())
                <div class="row col-12">
                {!!Form::open(['action' => ['HotelsController@destroy', $hotel->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    <a class="btn btn-primary" href="{{$hotel->id}}/edit">Edit</a>
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
                </div>
            @endif
        </div>
    </div>

    <!-- Room listings -->
    @foreach ($rooms as $room)
        @if($room->booked == 0)
        <div class="card mt-3 mb-3">
            <h5 class="card-header"><a href="/rooms/{{$room->id}}">Listing {{$room->id}}</a></h5>
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
            </div>
        </div>
        @endif
    @endforeach
@endsection

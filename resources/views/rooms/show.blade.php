@extends('layouts.app')
@section('content')
<div class="row">
<div class='col-md-8'>
    <div class="card mt-3 mb-3">
        <h5 class="card-header">{{$hotel->name}}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-8 col-sm-8">
                    <!-- Single beds -->
                    @if($room->singleBeds > 0) <p>{{$room->singleBeds}} single bed(s)</p> @endif

                    <!-- Double beds -->
                    @if($room->doubleBeds > 0) <p>{{$room->doubleBeds}} double bed(s)</p> @endif

                    <!-- Bathroom/en-suite -->
                    <p>@if($room->bathroom == 0) No bathroom in room. @else En-suite. @endif</p>

                    <!-- Wi-Fi -->
                    <p>@if($room->wifi == 0) No free Wi-Fi. @else Free Wi-Fi. @endif</p>

                    <!-- Wi-Fi -->
                    <p>@if($room->parking == 0) No free parking. @else Free parking. @endif</p>

                    <!-- Wi-Fi -->
                    <p>@if($room->breakfast == 0) Breakfast not included. @else Breakfast included. @endif</p>

                    <!-- Price -->
                    <p>Price: €{{$room->price}}</p>

                    @if((!Auth::guest() && Auth::user()->hasRole('admin')) ||
                        (!Auth::guest() && Auth::user()->hasRole('hotel')))
                        {!!Form::open(['action' => ['RoomsController@destroy', $room->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <a href="/rooms/{{$room->id}}/edit" class="btn btn-primary">Edit</a>
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    @else
                        {{-- <a class="btn btn-primary" href="/bookings/create/{{$room->id}}">Book</a> --}}
                    @endif
                </div>
                <div class="col-4 col-sm-4">
                    <img class="img-fluid" src="/storage/images/room_images/{{$room->room_image}}">
                </div>
            </div>
        </div>
    </div>
</div><div class="clear-fix"></div>
<div class="col-md-4">
    <div class="card mt-3 mb-3">
        <div class="card-body">
            <h1>Book </h1>
            {!! Form::open(['action' => 'BookingsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('from', 'Date of check-in:')}}
                    {{Form::date('from', $from, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('to', 'Date of check-out:')}}
                    {{Form::date('to', $to, ['class' => 'form-control'])}}
                </div>
                {{Form::hidden('guest_id', $guest_id)}}
                {{Form::hidden('room_id', $room->id)}}
                {{Form::submit('Book Room', ['class'=>'btn btn-primary tertiaryColor'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@endsection

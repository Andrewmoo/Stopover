@extends('layouts.app')
@section('content')
<div class="row">
<div 
    @if(Auth::guest() || Auth::user()->hasRole('guest')) 
        class="col-md-8" 
    @else 
        class="col-md-12" 
    @endif
>
    <div class="card secondaryColor text-white mt-3 mb-3">
        <h5 class="card-header"><a href="/hotels/{{$hotel->id}}">{{$hotel->name}}, Co. {{$hotel->county}}</a></h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid"
                    @if(!empty($hotelimages->where('hotel_id', $room->hotel_id)->first()->thumbnail))
                        src="/{{$hotelimages->first()->thumbnail}}"
                    @endif
                    >
                </div>
                <div class="col-md-4">
                    <!-- Single beds -->
                    @if($room->singleBeds > 0 && $room->singleBeds == 1) <p>{{$room->singleBeds}} single bed.</p>
                    @else @if($room->singleBeds > 0) <p>{{$room->singleBeds}} single beds.</p> @endif
                    @endif

                    <!-- Double beds -->
                    @if($room->doubleBeds > 0) <p>{{$room->doubleBeds}} double bed.</p>
                    @else @if($room->doubleBeds > 0) <p>{{$room->doubleBeds}} double beds.</p> @endif
                    @endif

                    <!-- Bathroom/en-suite -->
                    <p>@if($room->bathroom =! 0) En-suite. @endif</p>

                    <!-- Wi-Fi -->
                    <p>@if($room->wifi != 0) Wi-Fi. @endif</p>

                    <!-- Parking -->
                    <p>@if($room->parking == 1) Free parking. @endif</p>

                    <!-- Breakfast -->
                    <p>@if($room->breakfast != 0) Breakfast included. @endif</p>

                    @if((!Auth::guest() && Auth::user()->hasRole('admin')) ||
                        (!Auth::guest() && Auth::user()->hasRole('hotel') && Auth::user()->id == $hotel->user_id))
                        {!!Form::open(['action' => ['RoomsController@destroy', $room->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <a href="/rooms/{{$room->id}}/edit" class="btn btn-outline-light btn-lg">EDIT</a>
                        {{Form::submit('DELETE', ['class' => 'btn btn-danger btn-lg'])}}
                        {!!Form::close()!!}
                    @else
                        {{-- <a class="btn btn-primary" href="/bookings/create/{{$room->id}}">Book</a> --}}
                    @endif
                </div>
                <div class="col-md-4">
                    <!-- Price -->
                    <h1 class="text-tertiary">€{{$room->price}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="card secondaryColor text-white mt-3 mb-3">
        <h5 class="card-header">Photos</h5>
        <div class="card-body">
            <div class="row">
                @forelse($hotelimages as $hotelimage)
                <div class="col-md-4 mb-3">
                    <a href="/{{$hotelimage->image}}" target="_blank"><img src="/{{$hotelimage->thumbnail}}" class="img-fluid"></a>
                </div>
                @empty
                <div class="col-md-12">No available images for this hotel.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@if(Auth::guest() || Auth::user()->hasRole('guest'))
<div class="col-md-4">
    <div class="card secondaryColor text-white mt-3 mb-3">
        <h5 class="card-header">Make a booking</h5>
        <div class="card-body">
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
                <div class="form-row justify-content-center">
                {{Form::submit('BOOK ROOM', ['class'=>'btn btn-lg btn-primary tertiaryColor'])}}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endif
</div>
@endsection

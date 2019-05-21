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
                <div class="col-12">
                    <!-- Single beds -->
                    @if($room->singleBeds > 0)
                        <p>
                            <i class="fas fa-bed align-middle" style="font-size: 1.125rem">
                            </i>
                            <span class="align-middle">
                                @if($room->singleBeds > 1) {{$room->singleBeds}} single beds
                                @else {{$room->singleBeds}} single bed @endif
                            </span>
                        </p>
                    @endif

                    <!-- Double beds -->
                    @if($room->doubleBeds > 0)
                        <p>
                        <i class="fas fa-bed align-middle" style="font-size: 1.125rem"></i>
                        <span class="align-middle">
                            @if($room->doubleBeds > 1) {{$room->doubleBeds}} double beds
                            @else {{$room->doubleBeds}} double bed @endif
                        </span>
                        </p>
                    @endif

                    <!-- Bathroom/en-suite -->
                    <p>@if($room->bathroom == 1)
                        <p>
                        <i class="fas fa-shower align-middle" style="font-size: 1.125rem"></i>
                        <span class="align-middle">En-suite.</span>
                        </p>@endif
                    </p>

                    <!-- Wi-Fi -->
                    <p>@if($room->wifi == 1)
                        <p>
                        <i class="fas fa-wifi align-middle" style="font-size: 1.125rem"></i>
                        <span class="align-middle">Wi-Fi.</span>
                        </p>@endif
                    </p>

                    <!-- Parking -->
                    <p>@if($room->parking == 1)
                        <p>
                        <i class="fas fa-car align-middle" style="font-size: 1.125rem"></i>
                        <span class="align-middle">Free parking.</span>
                        </p>@endif
                    </p>

                    <!-- Breakfast -->
                    <p>@if($room->breakfast == 1)
                        <p>
                        <i class="fas fa-utensils align-middle" style="font-size: 1.125rem"></i>
                        <span class="align-middle">Breakfast.</span>
                        </p>@endif
                    </p>

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
                {{-- <div class="col-md-4">
                    <!-- Price -->
                    <h1 class="text-tertiary">€{{$room->price}}</h1>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="card secondaryColor text-white mt-3 mb-3">
        <h5 class="card-header">Photos</h5>
        <div class="card-body">
            <div class="row">
                @forelse($hotelimages as $hotelimage)
                <div class="col-md-4 mb-3">
                    <a href="/{{$hotelimage->image}}" id="photoid_{{$hotelimage->id}}" data-toggle="modal" data-target="#enlarge-photo"><img src="/{{$hotelimage->thumbnail}}" class="img-fluid"></a>
                </div>

                <script>

                    $(document).ready(function() {

                        $(document).on("click", "#photoid_{{$hotelimage->id}}", function() {

                            $('#enlImg').attr('src', '/{{$hotelimage->image}}');

                        });

                    });
                </script>
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
            <!-- Price -->
            <h1 class="text-tertiary">€{{$room->price}}</h1>

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

<div class="modal fade" id="enlarge-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered text-white">
        <div class="modal-content" style="background-color: rgba(0,0,0, 0.7)">
            <div class="modal-body">
                <div class="row justify-content-md-center">
                    <img data-dismiss="modal" class="img-fluid" id="enlImg" style="height: auto">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

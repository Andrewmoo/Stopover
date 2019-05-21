@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <div class="row">
    <div class="col-md-8">
      @if(count($rooms) > 0)
      @foreach ($rooms as $room)
      <div class="mb-3 card PCO text-white">
        <div class="card-header">
          <h1 class="mb-0 SOColour">#{{$room->id}}</h1>
        </div>
        <div class="card-body px-3">
          <div class="row mx-2 my-0 py-0">
            <div class="col-md-6">
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
            </div>
            <div class="col-md-4">
              <!-- Price -->
              <p class="text-warning h1">€{{$room->price}}</p>
            </div>
            <div class="col-md-2">
                <a class="btn btn-outline-light btn-lg" href="/rooms/{{$room->id}}/edit">EDIT</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
        {{$rooms->links()}}
      @else
        <p>No rooms found</p>
      @endif
    </div>
    <div class="col-md-4">
      <div class="card secondaryColor text-white">
        <div class="card-header">Menu</div>
        <div class="card-body">
          <div class="list-group primaryColor">

            @if(Auth::user()->hasRole('hotel'))
              @include('inc.hoteldashmenu')
            @endif

            @if(Auth::user()->hasRole('guest'))
              @include('inc.guestdashmenu')
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

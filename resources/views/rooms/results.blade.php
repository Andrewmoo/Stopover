@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-dark secondaryColor">
            <div class="card-body">
            @if (count($rooms)  == 0)
                <p>There are no results</p>
            @else
                {!! Form::open([
                  'action' => 'RoomsController@search',
                  'method' => 'GET'
                ]) !!}
                  <div class="form-row align-items-center mb-3">
                    <div class="col-auto text-white">
                      {{Form::label('from', 'Showing results for time period from:', ['class' => 'form-label'])}}
                    </div>
                    <div class="col-auto">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                        </div>
                        {{Form::date('from', (isset($from) ? $from : ''), ['class' => 'form-control form-control-sm'])}}
                      </div>
                    </div>
                    <div class="col-auto text-white">
                      {{Form::label('to', ' to ', ['class' => 'form-label'])}}
                    </div>
                    <div class="col-auto">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                        </div>
                        {{Form::date('to', (isset($to) ? $to : ''), ['class' => 'form-control form-control-sm'])}}
                      </div>
                    </div>
                    <div class="col-auto">
                      {{Form::submit('Search', ['class'=>'btn btn-primary btn-sm mb-2'])}}
                    </div>
                  </div>
                {!! Form::close() !!}
                @foreach ($rooms as $room)
                  <div class="mb-3 card card-light flex-row flex-wrap secondaryColor h-100" style="background-color: rgba(255, 255, 255, 0.3) !important">
                    <div class="card-header border-0">
                      <img src="/storage/images/room_images/{{$room->room_image}}">
                    </div>
                    <div class="card-body text-white px-3">
                        <!-- Single beds -->
                        @if($room->singleBeds > 0)
                              <p>
                                  <i class="fas fa-bed align-middle" style="font-size: 1.5rem; font-color: #">
                                  </i>
                                  <span class="align-middle">
                                      @if($room->singleBeds > 1)
                                          &nbsp;{{$room->singleBeds}} single beds
                                      @else
                                          &nbsp;{{$room->singleBeds}} single bed
                                      @endif
                                  </span>
                              </p>
                          @endif

                          <!-- Double beds -->
                          @if($room->doubleBeds > 0)
                          <p>
                                  <i class="fas fa-bed align-middle" style="font-size: 1.5rem; font-color: #">
                                  </i>
                                  <span class="align-middle">
                                      @if($room->doubleBeds > 1)
                                          &nbsp;{{$room->doubleBeds}} double beds
                                      @else
                                          &nbsp;{{$room->doubleBeds}} double bed
                                      @endif
                                  </span>
                              </p>
                          @endif

                          <!-- Bathroom/en-suite -->
                          <p>
                              @if($room->bathroom == 1)
                                  <p>
                                      <i class="fas fa-shower align-middle text-info" style="font-size: 1.5rem"></i>
                                      <span class="align-middle">En-suite.</span>
                                  </p>
                              @endif
                          </p>

                          <!-- Wi-Fi -->
                          <p>
                              @if($room->wifi == 1)
                                  <p>
                                      <i class="fas fa-wifi align-middle text-primary" style="font-size: 1.5rem; font-color: #"></i>
                                      <span class="align-middle">Wi-Fi.</span>
                                  </p>
                              @endif
                          </p>

                          <!-- Parking -->
                          <p>
                              @if($room->parking == 1)
                                  <p>
                                      <i class="fas fa-car align-middle text-warning" style="font-size: 1.5rem; font-color: #"></i>
                                      <span class="align-middle">Free parking.</span>
                                  </p>
                              @endif
                          </p>

                          <!-- Breakfast -->
                          <p>
                              @if($room->breakfast == 1)
                                  <p>
                                      <i class="fas fa-utensils align-middle" style="font-size: 1.5rem; font-color: #"></i>
                                      <span class="align-middle">Breakfast.</span>
                                  </p>
                              @endif
                          </p>
                    </div>
                    <div class="card-header text-white px-3 py-3 d-flex h-100">
                        <a class="btn btn-success btn-lg align-self-center" href="/rooms/{{$room->id}}/{{$from}}/{{$to}}">Select Room</a>
                    </div>
                  </div>
                @endforeach

            @endif
            </div>
        </div>
    </div>
</div>
@endsection

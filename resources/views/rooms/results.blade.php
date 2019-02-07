@extends('layouts.heroImage')

@section('content')
<div class="row">
<div class="col-6">
        <div class="jumbotron secondaryColor J-margin text-center">
          <h1>Stopover</h1>

          {!! Form::open([
            'action' => 'RoomsController@search',
            'method' => 'GET'
          ]) !!}
            {{-- <div class="row">
              <div class="form-group col-12">
                {{Form::text('destination', '', ['class' => 'form-control', 'placeholder' => 'Your destination'])}}
              </div>
            </div> --}}
            <div class="row form-group cPost">
              <div class="col-sm-1">
                {{Form::label('from', 'From:')}}
              </div>
              <div class="col-sm-6">
                {{Form::date('from', (isset($from) ? $from : ''), ['class' => 'form-control'])}}
              </div>
            </div>
            <div class="row form-group cPost">
                <div class="col-sm-1">
                  {{Form::label('to', 'To:')}}
                </div>
                <div class="col-sm-6">
                  {{Form::date('to',  (isset($to) ? $to : ''), ['class' => 'form-control'])}}
                </div>
            </div>
            {{-- <div class="row">
              <div class="col-sm-3">
                <div class = "form-group cPost">
                  {{Form::label('adults', 'Adults:')}}
                  {{Form::selectRange('adults', 1, 4)}}
                </div>
              </div>
              <div class="col-sm-3">
                <div class = "form-group cPost">
                  {{Form::label('children', 'Children:')}}
                  {{Form::selectRange('kids', 0, 4)}}
                </div>
              </div>
            </div> --}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
          {!! Form::close() !!}

    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-dark secondaryColor">
            <div class="card-body">
            @if (count($rooms)  == 0)
                <p>There are no results</p>
            @else
                <h5 class="card-title text-white">Showing results for time period {{date('d/m/Y', strtotime($from))}} to {{date('d/m/Y', strtotime($to))}}</h1>
                @foreach ($rooms as $room)
                    <div class="card mt-3 mb-3 card-light bg-light secondaryColor" style="background-color: rgba(255, 255, 255, 0.3) !important">
                        <img class="card-img-left" src="" style="height: 15rem; width: 15rem;">
                        <div class="card-body">
                            <div class="text-white">
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
                        </div>
                    </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
@endsection

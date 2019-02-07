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
    <div class="jumbotron secondaryColor">
      @if (count($rooms)  == 0)
      <p>There are no results</p>
      @else
        <h1 class="card-header">Listings</h1>
        <div class="card-body">

          <p class="cPost">Here are the rooms available for your selected dates</p>
            @foreach ($rooms as $room)
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
            @endforeach
          @endif
        </div>
    </div>
</div>
</div>


@endsection

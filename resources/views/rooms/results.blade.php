@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-dark secondaryColor">
      <div class="card-body">
        {!! Form::open([
          'action' => 'RoomsController@search',
          'method' => 'GET'
        ]) !!}
          <div class="form-row align-items-center mb-3">
            <div class="col-12 text-white mb-2">
                Showing results for time period
            </div>
            <div class="col-auto text-white">
              {{Form::label('from', ' from', ['class' => 'form-label'])}}
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
            <div class="col-auto text-white">
              {{Form::label('county', ' in ', ['class' => 'form-label'])}}
            </div>
            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                </div>
                <select class="form-control form-control-sm" name="county" id="county">
                  @foreach($counties as $c)
                    <option value="{{$c}}" @if($county == $c) selected @endif>{{$c}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-auto text-white">
                {{Form::label('people', ' for ', ['class' => 'form-label'])}}
              </div>
            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <select class="form-control form-control-sm" name="people" id="people">
                  <option value="1" @if(empty($people) || $people == '1') selected @endif>1 adult</option>
                  <option value="2" @if($people == '2') selected @endif>2 adults</option>
                  <option value="3" @if($people == '3') selected @endif>3 adults</option>
                  <option value="4" @if($people == '4') selected @endif>4 adults</option>
                  <option value="5" @if($people == '5') selected @endif>5 adults</option>
                </select>
              </div>
            </div>
            <div class="col-auto">
              {{Form::submit('SEARCH', ['class'=>'btn btn-sm btn-outline-light btn-submit navbar-submit mb-2'])}}
            </div>
          </div>
          <div class="form-row">
              <div id="date-error" class="offset-4 col-md-6 pt-0 pb-2 text-danger"></div>
            </div>
        {!! Form::close() !!}
        @if (count($rooms)  == 0)
            <p class="text-white">There are no results</p>
        @else
          @foreach ($rooms as $room)
            <div class="mb-3 card PCO text-white flex-row flex-wrap h-100">
              <div class="card-header my-2 border-0 bg-transparent">
                <a href="/hotels/{{$room->hotel_id}}" style="margin: 0 0 0 0; padding: 0 0 0 0;">
                  <img
                  @if(!empty($hotelimages->where('hotel_id', $room->hotel_id)->first()->thumbnail))
                    src="/{{$hotelimages->where('hotel_id', $room->hotel_id)->first()->thumbnail}}"
                  @endif
                  >
                </a>
              </div>
              <div class="card-body px-3">
                <div class="row mx-2 my-0 py-0">
                  <!-- Hotel name -->
                  <p>
                    <a href="/hotels/{{$room->hotel_id}}" class="text-white h5">{{$room->hotel_name}}, Co. {{$room->county}}</a>
                  </p>
                </div>
                <div class="row mx-2 my-0 py-0">
                  <div class="col-md-8">
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
                </div>
              </div>
              <div class="card-header text-white px-3 py-3 d-flex h-100">
                  <a class="btn btn-outline-light btn-lg align-self-center" href="/rooms/{{$room->id}}/{{$from}}/{{$to}}">SELECT ROOM</a>
              </div>
            </div>
          @endforeach

      @endif
      </div>
    </div>
  </div>
</div>
<script>
$( document ).ready(function () {
  var from;
  var to;
  var county = $('#county').val();
  $('#from, #to, #county').on('input', function () {
    from = new Date($('#from').val()).getTime();
    to = new Date($('#to').val()).getTime();
    county = $('#county').val();
    if (to <= from) {
      $('#to').addClass('is-invalid');
      $('#date-error').html('');
      $('#date-error').html('Check-out date must be after check-in date.');
      $('form').submit(function (e) {
        e.preventDefault();
      });
    }
    else {
      $('#to').removeClass('is-invalid');
      $('#date-error').html('');
      $('form').off( "submit" );
    }

    if(!from || !to) {
      if(!from) {
        $('#from').addClass('is-invalid');
      }
      else {
        $('#from').removeClass('is-invalid');
      }

      if(!to) {
        $('#to').addClass('is-invalid');
      }
      else {
        $('#to').removeClass('is-invalid');
      }

      $('#date-error').html('');
      $('#date-error').html('Dates cannot be empty');
      $('form').submit(function (e) {
          e.preventDefault();
      });
    }
    else {
      $('form').off( "submit" );
    }

    if(!county) {

      $('#county').addClass('is-invalid');
      $('form').submit(function (e) {
          e.preventDefault();
        });
    }
    else {
      $('form').off( "submit" );
    }
  });
});
</script>
@endsection

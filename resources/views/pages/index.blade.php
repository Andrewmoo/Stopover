@extends('layouts.indexLayout')

@section('content')
  <div class="row">
    <div class="col-md-12 hpMargin align-items-center">
      <h1 class="DSN">Welcome to </h1>
      <h1 class="StopoverHeading">Stopover</h1>
    </div>

    <div class="inner-form">
      <div class="col-12">
        <div class="form-row pl-1 mb-4 justify-content-center">
          <span class="text-white">Search for available rooms:</span>
        </div>
      {!! Form::open([
        'action' => 'RoomsController@search',
        'method' => 'GET',
        'id' => 'searchform'
      ]) !!}
        <div class="form-row form-group text-white justify-content-center">
          <div class="col-md-2">
            {{Form::label('from', 'Check-in:',  ['class' => 'homeLabels'])}}
            {{Form::date('from', '', ['class' => 'form-control text-white', 'style' => "background-color: rgba(0,0,0,0) !important"])}}
          </div>
          <div class="col-md-2">
            {{Form::label('to', 'Check-out:',  ['class' => 'homeLabels'])}}
            {{Form::date('to', '', ['class' => 'form-control text-white', 'style' => "background-color: rgba(0,0,0,0) !important"])}}
          </div>
          <div class="col-md-2">
            {{Form::label('county', 'County:',  ['class' => 'homeLabels'])}}
            {{Form::text('county', '', ['class' => 'form-control text-white', 'placeholder' => 'e.g. Antrim', 'style' => "background-color: rgba(0,0,0,0) !important"])}}
          </div>
          <div class="col-md-2">
            {{Form::label('people', 'For:',  ['class' => 'homeLabels'])}}
            <select class="form-control" name="people" id="people" style="background-color: rgba(0,0,0,0) !important">
              <option value="1" selected>1 adult</option>
              <option value="2">2 adults</option>
              <option value="3">3 adults</option>
              <option value="4">4 adults</option>
              <option value="5">5 adults</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div id="date-error" class="offset-4 col-md-6 pt-0 pb-2 text-danger"></div>
        </div>
        <div class="form-row">
          <div class="col-md-12 text-center">
            {{Form::submit('SEARCH  ', ['class'=>'btn btn-lg btn-outline-light'])}}
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>
<script>
$( document ).ready(function () {
  $('#searchform').submit(function (e) {
    e.preventDefault();
  });
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
      $('#searchform').submit(function (e) {
        e.preventDefault();
      });
    }
    else {
      $('#to').removeClass('is-invalid');
      $('#date-error').html('');
      $('#searchform').off( "submit" );
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
      $('#searchform').submit(function (e) {
          e.preventDefault();
      });
    }
    else {
      $('#searchform').off( "submit" );
    }

    if(!county) {

      $('#county').addClass('is-invalid');
      $('#searchform').submit(function (e) {
          e.preventDefault();
        });
    }
    else {
      $('#county').removeClass('is-invalid');
      $('#searchform').off( "submit" );
    }
  });
});
</script>
@endsection

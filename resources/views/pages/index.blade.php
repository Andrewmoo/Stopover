@extends('layouts.indexLayout')

@section('content')
  <div class="row">
    <div class="row col-12 hpMargin">
      <h1 class="StopoverHeading">Stopover,</h1>
      <h1 class="DSN">&nbsp;discover somewhere new</h1>
    </div>

    <div class="inner-form">
      <div class="col-12">
      {!! Form::open([
        'action' => 'RoomsController@search',
        'method' => 'GET'
      ]) !!}
        <div class="form-row form-group text-white">
          <div class="col-sm-4">
            {{Form::label('from', 'Check-in:',  ['class' => 'homeLabels'])}}
            {{Form::date('from', '', ['class' => 'form-control'])}}
          </div>
            <div class="col-sm-4">
              {{Form::label('to', 'Check-out:',  ['class' => 'homeLabels'])}}
              {{Form::date('to', '', ['class' => 'form-control'])}}
            </div>
        </div>
        <div class="form-row">
          <div id="date-error" class="offset-4 col-md-6 pt-0 pb-2 text-danger"></div>
        </div>
        <div class="form-row">
          <div class="col-md-12 text-center">
            {{Form::submit('Search', ['class'=>'btn btn-lg btn-outline-light'])}}
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>
<script>
$( document ).ready(function () {
  var from;
  var to;
  $('#from, #to').on('input', function () {
    from = new Date($('#from').val()).getTime();
    to = new Date($('#to').val()).getTime();
    if (to <= from) {
      $('#to').addClass('is-invalid');
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
  });
});
</script>
@endsection

@extends('layouts.indexLayout')

@section('content')
  <div class="row">
          <div class="row col-12 hpMargin">
            <h1 class="StopoverHeading"><span class="SOColour">S</span>topover, </h1>
            <h1 class="DSN"> discover somewhere new</h1>
          </div>

          <div class="inner-form">
            <div class="col-12">
            {!! Form::open([
              'action' => 'RoomsController@search',
              'method' => 'GET'
            ]) !!}
              <div class="form-row form-group text-white">
                <div class="col-sm-6">
                  {{Form::label('from', 'Arrival:',  ['class' => 'homeLabels'])}}
                  {{Form::date('from', '', ['class' => 'form-control'])}}
                </div>
                  <div class="col-sm-6">
                    {{Form::label('to', 'Departure:',  ['class' => 'homeLabels'])}}
                    {{Form::date('to', '', ['class' => 'form-control'])}}
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  {{Form::submit('Search', ['class'=>'btn btn-lg btn-outline-light'])}}
                </div>
              </div>
              {!! Form::close() !!}
            </div>
          </div>
</div>



@endsection

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
              <div class="form-row form-group cPost">

                <div class="col-sm-2">
                  {{Form::label('from', 'From:',  ['class' => 'homeLabels'])}}
                </div>
                <div class="col-sm-3">
                  {{Form::date('from', '', ['class' => 'form-control'])}}
                </div>
                  <div class="col-sm-2 ">
                    {{Form::label('to', 'To:',  ['class' => 'homeLabels'])}}
                  </div>
                  <div class="col-sm-3">
                    {{Form::date('to', '', ['class' => 'form-control'])}}
                  </div>
                  {{Form::submit('Search', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
              </div>
            </div>

            </div>
</div>



@endsection

@extends('layouts.heroImage')

@section('content')
<div class="row">
<div class="col-6">
        <div class="jumbotron secondaryColor J-margin text-center">
          <h1>Stopover</h1>

          {!! Form::open([
            'action' => [
              'RoomsController@search',
              date('Y-m-d', strtotime(Request::input('from'))),
              date('Y-m-d', strtotime(Request::input('to')))
            ], 
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
                {{Form::date('from', '', ['class' => 'form-control'])}}
              </div>
            </div>
            <div class="row form-group cPost">
                <div class="col-sm-1">
                  {{Form::label('to', 'To:')}}
                </div>
                <div class="col-sm-6">
                  {{Form::date('to', '', ['class' => 'form-control'])}}
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
<div class="row J-margin text-center white">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body paris">
        <h3 class="card-title">Paris</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body madrid">
        <h3 class="card-title">Madrid</h3>

      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body zagreb">
        <h3 class="card-title">Zagreb</h3>
      </div>
    </div>
  </div>
</div>


@endsection

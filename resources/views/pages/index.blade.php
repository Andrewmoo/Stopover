@extends('layouts.heroImage')

@section('content')
<div class="row">
<div class="col-6">
        <div class="jumbotron secondaryColor J-margin text-center">
          <h1>Stopover</h1>

          {!! Form::open([ 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-12">
            <div class = "form-group">
              {{Form::text('destination', '', ['class' => 'form-control', 'placeholder' => 'Your destination'])}}
            </div>
          </div>
          </div>
            <div class="row">
              <div class="col-sm-6">
                <div class = "form-group">
                  {{Form::date('checkIn', '', ['class' => 'form-control', 'placeholder' => 'Check In'])}}
                </div>
              </div>

              <div class="col-sm-6">
                <div class = "form-group">
                  {{Form::date('checkOut', '', ['class' => 'form-control', 'placeholder' => 'Check Out'])}}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class = "form-group cPost">
                  {{Form::label('rooms', 'Rooms')}}
                  {{Form::selectRange('rooms', 1, 3)}}
                </div>
              </div>
              <div class="col-sm-4">
                <div class = "form-group cPost">
                  {{Form::label('adults', 'Adults')}}
                  {{Form::selectRange('adults', 1, 4)}}
                </div>
              </div>
              <div class="col-sm-4">
                <div class = "form-group cPost">
                  {{Form::label('kids', 'Kids')}}
                  {{Form::selectRange('kids', 0, 4)}}
                </div>
              </div>
            </div>
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

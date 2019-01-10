@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Create Listing</h1>
  {!! Form::open(['action' => 'RoomsController@store', 'method' => 'POST']) !!}
    <div class = "form-group cPost">
      {{Form::label('description', 'Description')}}
      {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class = "form-group cPost">
      {{Form::label('facilities', 'Facilities')}}
      {{Form::textarea('facilities', '', ['class' => 'form-control', 'placeholder' => 'Facilities'])}}
    </div>
    <div class = "form-group cPost">
      {{Form::label('noBeds', 'Number Of Beds')}}
      {{Form::selectRange('noBeds', 1, 6)}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection

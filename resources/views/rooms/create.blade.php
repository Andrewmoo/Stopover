@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Create listing</h1>
  {!! Form::open(['action' => 'RoomsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group cPost">
      {{Form::label('singleBeds', 'Number of single beds:')}}
      {{Form::selectRange('singleBeds', 0, 6)}}
    </div>
    <div class="form-group cPost">
      {{Form::label('doubleBeds', 'Number of double beds:')}}
      {{Form::selectRange('doubleBeds', 0, 6)}}
    </div>
    <div class="form-group cPost">
      {{Form::label('bathroom', 'En-suite bathroom:')}}
      {{Form::radio('bathroom', '1')}} Yes
      {{Form::radio('bathroom', '0', true)}} No
    </div>
    <div class="form-group cPost">
      {{Form::label('wifi', 'Free Wi-Fi:')}}
      {{Form::radio('wifi', '1')}} Yes
      {{Form::radio('wifi', '0', true)}} No
    </div>
    <div class="form-group cPost">
      {{Form::label('parking', 'Free parking:')}}
      {{Form::radio('parking', '1')}} Yes
      {{Form::radio('parking', '0', true)}} No
    </div>
    <div class="form-group cPost">
      {{Form::label('breakfast', 'Breakfast included:')}}
      {{Form::radio('breakfast', '1')}} Yes
      {{Form::radio('breakfast', '0', true)}} No
    </div><div class="form-group cPost">
      {{Form::label('price', 'Price:')}}
      {{Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => 'e.g. 56.99'])}}
    </div>
    <div class="form-group">
      {{Form::file('room_image')}}
    </div>
    {{Form::hidden('hotel_id', $hotel_id)}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection

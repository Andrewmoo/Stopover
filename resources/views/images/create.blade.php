@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Upload images for your hotel</h1>

  {!! Form::open(['action' => 'ImagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::file('hotel_image')}}
    </div>
    {{Form::hidden('hotel_id', $hotel_id)}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection

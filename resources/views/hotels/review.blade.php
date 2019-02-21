@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <div class="card">
  <h1 class="card-header">Write a review</h1>
  <div class="card-body">
  {!! Form::open(['action' => 'HotelReviewsController@store', 'method' => 'POST']) !!}
  <div class = "form-group">
    {{Form::label('headline', 'Headline')}}
    {{Form::text('headline', '', ['class' => 'form-control', 'placeholder' => 'Headline'])}}
  </div>
  <div class = "form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', '', ['id'=>'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body Text'])}}
  </div>
  <div class = "form-group">
    {{Form::label('rating', 'Rating')}}
    {{Form::textarea('rating', '', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
  </div>
  {{Form::hidden('guest_id', $guest_id)}}
  {{Form::hidden('hotel_id', $hotel_id)}}
  {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card secondaryColor text-white">
        <h5 class="card-header">Create listing</h5>
        <div class="card-body">
        {!! Form::open(['action' => 'RoomsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group text-white">
            {{Form::label('singleBeds', 'Number of single beds:')}}
            {{Form::selectRange('singleBeds', 0, 6)}}
          </div>
          <div class="form-group text-white">
            {{Form::label('doubleBeds', 'Number of double beds:')}}
            {{Form::selectRange('doubleBeds', 0, 6)}}
          </div>
          <div class="form-group text-white">
            {{Form::label('bathroom', 'En-suite bathroom:')}}
            {{Form::radio('bathroom', '1')}} Yes
            {{Form::radio('bathroom', '0', true)}} No
          </div>
          <div class="form-group text-white">
            {{Form::label('wifi', 'Free Wi-Fi:')}}
            {{Form::radio('wifi', '1')}} Yes
            {{Form::radio('wifi', '0', true)}} No
          </div>
          <div class="form-group text-white">
            {{Form::label('parking', 'Free parking:')}}
            {{Form::radio('parking', '1')}} Yes
            {{Form::radio('parking', '0', true)}} No
          </div>
          <div class="form-group text-white">
            {{Form::label('breakfast', 'Breakfast included:')}}
            {{Form::radio('breakfast', '1')}} Yes
            {{Form::radio('breakfast', '0', true)}} No
          </div><div class="form-group text-white">
            {{Form::label('price', 'Price:')}}
            {{Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => 'e.g. 56.99'])}}
          </div>
          {{Form::hidden('hotel_id', $hotel->id)}}
          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card secondaryColor text-white">
        <div class="card-header">Menu</div>
        <div class="card-body">
          <div class="list-group primaryColor">

              @if(Auth::user()->hasRole('hotel'))
              @include('inc.hoteldashmenu')
              @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

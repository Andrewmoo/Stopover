@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Hotels</h1>
  @if(count($hotels) > 0)
    @foreach($hotels as $hotel)
      <div class="card cardMargin">
        <div class="card-body">
          <h2><a href="/hotels/{{$hotel->id}}">{{$hotel->name}}</a></h2>
        </div>
      </div>
    @endForeach
    {{$hotels->links()}}
  @else
    <p>No hotels found</p>
  @endif
</div>
@endsection

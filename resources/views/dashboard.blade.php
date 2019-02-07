@extends('layouts.app')

@section('content')
<div class="container J-margin">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/rooms/create" class="btn btn-default noPadding">Create Listing</a>
                    <h3>Your Bookings</h3>
                    @if(count($rooms) > 0)
                    <table class="table table-striped">
                      <tr>
                        <th>Room</th>
                        <th></th>
                        <th></th>
                      </tr>
                      @foreach($rooms as $room)
                        <tr>
                          <td>{{$room->room_id}}</td>
                          <td><a href="/rooms/{{$room->room_id}}/edit" class="btn btn-default">Edit</a></td>
                          <td>
                                {!!Form::open(['action' => ['RoomsController@destroy', $room->room_id], 'method' => 'POST', 'class'=> 'float-right'])!!}
                                    
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                                {!!Form::close()!!}
                            </td>
                        </tr>
                      @endforeach
                    </table>
                  @else
                    <p>You have no rooms</p>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

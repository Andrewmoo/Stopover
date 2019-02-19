@extends('layouts.app')

@section('content')
<div class="container J-margin">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">{{auth()->user()->type}} Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(auth()->user()->hasRole('hotel'))
                      <a href="/rooms/create" class="btn btn-default noPadding">Create Listing</a>
                    @endif

                        <h3>Your Bookings</h3>
                      @if(count($bookings) > 0)
                        <table class="table table-striped">
                          <tr>
                            <th>Room</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th></th>
                          </tr>
                          @foreach($bookings as $booking)
                            <tr>
                              <td><a href="/rooms/{{$booking->room_id}}">{{$booking->name}}, room {{$booking->room_id}}</a></td>
                              <td>{{date('d/m/Y', strtotime($booking->from))}}</td>
                              <td>{{date('d/m/Y', strtotime($booking->to))}}</td>
                              <td>  
                                    {!!Form::open(['action' => 'BookingsController@edit', 'method' => 'POST'])!!}
                                        {{Form::hidden('id', $booking->id)}}
                                        {{Form::hidden('guest_id', $booking->guest_id)}}
                                        {{Form::submit('Edit', ['class' => 'btn btn-success'])}}

                                    {!!Form::close()!!}

                                    {!!Form::open(['action' => ['BookingsController@destroy', $booking->id], 'method' => 'POST'])!!}
                                        
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

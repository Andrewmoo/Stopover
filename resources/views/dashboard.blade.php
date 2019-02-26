@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card secondaryColor text-white mb-3">
        <div class="card-header">Your details</div>
        <div class="card-body mx-3">
          @if(Auth::user()->hasRole('guest'))
          <div class="row">
            <div class="col-3 border-right py-2 text-tertiary font-weight-bold text-right">
                First Name:
            </div>
            <div class="col-9 py-2">
                {{$guest->firstName}}
            </div>
          </div>
          <div class="row">
              <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                  Last Name:
              </div>
              <div class="col-9 border-top py-2">
                  {{$guest->lastName}}
              </div>
          </div>
          <div class="row">
              <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                  Address:
              </div>
              <div class="col-9 border-top py-2">
                  {{$guest->address}}
              </div>
          </div>
          <div class="row">
              <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                  Phone number:
              </div>
              <div class="col-9 border-top py-2">
                  {{$guest->phone}}
              </div>
          </div>
          <div class="row">
              <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                  Contact email:
              </div>
              <div class="col-9 border-top py-2">
                  {{$guest->email}} (this is not your account email)
              </div>
          </div>
          <div class="row mt-3 justify-content-center">
            <a href="/guests/{{$guest->id}}/edit" class="btn btn-lg btn-outline-light text-white">MODIFY DETAILS</a>
          </div>
          @endif

          @if(Auth::user()->hasRole('hotel'))
          <div class="row">
              <div class="col-3 border-right py-2 text-tertiary font-weight-bold text-right">
                  Name:
              </div>
              <div class="col-9 py-2">
                  {{$hotel->name}}
              </div>
          </div>
          <div class="row">
              <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                  Address:
              </div>
              <div class="col-9 border-top py-2">
                  {{$hotel->address}}
              </div>
          </div>
          <div class="row">
              <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                  County:
              </div>
              <div class="col-9 border-top py-2">
                  {{$hotel->county}}
              </div>
          </div>
          <div class="row">
              <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                  Phone number:
              </div>
              <div class="col-9 border-top py-2">
                  {{$hotel->phone}}
              </div>
          </div>
          <div class="row">
              <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                  Contact email:
              </div>
              <div class="col-9 border-top py-2">
                  {{$hotel->email}} (this is not your account email)
              </div>
          </div>
          <div class="row mt-3 justify-content-center">
            <a href="/hotels/{{$hotel->id}}/edit" class="btn btn-lg btn-outline-light text-white">MODIFY DETAILS</a>
          </div>
          @endif
        </div>
      </div>
      <div class="card secondaryColor text-white mb-3">
          <div class="card-header">Your Bookings</div>
  
          <div class="card-body">
            @if(count($bookings) > 0)
              <table class="table table-striped">
                <tr>
                  <th>Room</th>
                  @if(Auth::user()->hasRole('hotel'))
                  <th>Guest</th>
                  @endif
                  <th>Check-in</th>
                  <th>Check-out</th>
                  <th></th>
                </tr>
                @foreach($bookings as $booking)
                  <tr>
                    <td><a href="/rooms/{{$booking->room_id}}">{{$booking->name}}, room {{$booking->room_id}}</a></td>
                    @if(Auth::user()->hasRole('hotel'))
                    <td>{{$booking->guest_id}}</td>
                    @endif
                    <td>{{date('d/m/Y', strtotime($booking->from))}}</td>
                    <td>{{date('d/m/Y', strtotime($booking->to))}}</td>
                    <td>
                        {!!Form::open(['action' => ['BookingsController@destroy', $booking->id], 'method' => 'POST'])!!}
                            
                            {{Form::hidden('_method', 'DELETE')}}
                            @if(Auth::user()->hasRole('guest'))
                            <a href="/bookings/edit/{{$booking->id}}/{{$booking->guest_id}}" class="btn btn-success text-white">Edit</a>
                            @endif
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
  
                        {!!Form::close()!!}
                    </td>
                  </tr>
                @endforeach
              </table>
            @else
            <p>You have no bookings</p>
            @endif
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

            @if(Auth::user()->hasRole('guest'))
              @include('inc.guestdashmenu')
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

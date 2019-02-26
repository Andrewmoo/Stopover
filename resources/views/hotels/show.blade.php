@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card secondaryColor text-white">
            <h2 class="card-header">{{$hotel->name}}</h2>
            <div class="card-body mx-3">
                <div class="row">
                    <div class="col-3 border-right py-2 text-tertiary font-weight-bold text-right">
                        Address:
                    </div>
                    <div class="col-9 py-2">
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
                        {{$hotel->email}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                        Rooms available:
                    </div>
                    <div class="col-9 border-top py-2">
                        {{count($rooms)}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 border-right border-top py-2 text-tertiary font-weight-bold text-right">
                        Average rating:
                    </div>
                    <div class="col-9 border-top py-2">
                        @if(!empty($reviews->avg('rating')))
                            {{$reviews->avg('rating')}} / 5
                        @else
                            This hotel has not been rated yet.
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- Room listings -->
        @foreach ($rooms as $room)
            @if($room->booked == 0)
            <div class="card secondaryColor text-white mt-3 mb-3">
                <h5 class="card-header"><a href="/rooms/{{$room->id}}">Listing {{$room->id}}</a></h5>
                <div class="card-body">
                    <!-- Single beds -->
                    @if($room->singleBeds > 0)
                        <p>
                            {{$room->singleBeds}} single bed(s)
                        </p>
                    @endif

                    <!-- Double beds -->
                    @if($room->doubleBeds > 0)
                        <p>
                            {{$room->doubleBeds}} double bed(s)
                        </p>
                    @endif

                    <!-- Bathroom/en-suite -->
                    <p>
                        @if($room->bathroom == 0)
                            No bathroom in room.
                        @else
                            En-suite.
                        @endif
                    </p>

                    <!-- Wi-Fi -->
                    <p>
                        @if($room->wifi == 0)
                            No free Wi-Fi.
                        @else
                            Free Wi-Fi.
                        @endif
                    </p>

                    <!-- Parking -->
                    <p>
                        @if($room->parking == 0)
                            No free parking.
                        @else
                            Free parking.
                        @endif
                    </p>

                    <!-- Breakfast -->
                    <p>
                        @if($room->breakfast == 0)
                            Breakfast not included.
                        @else
                            Breakfast included.
                        @endif
                    </p>
                </div>
            </div>
            @endif
        @endforeach
        <p>{{$rooms->links()}}</p>
    </div>
    <div class="col-md-4 mb-4">
        {{-- Reviews --}}
        <div class="card secondaryColor">
            <h5 class="card-header text-white">Reviews</h5>
            <div class="card-body mx-3">

            @forelse($reviews as $review)

                <div class="row card mb-3 primaryColor text-white">
                    <div class="col-12 tertiaryColor">
                        <h6 class="py-2 mb-0 text-white font-italic">
                            {{$guests->where('id', $review->guest_id)->first()->firstName}}
                            {{$guests->where('id', $review->guest_id)->first()->lastName}}:
                        </h6>
                    </div>
                    <div class="col-12 mt-2">
                        <h6 class="font-weight-bold mb-0">{{ucfirst($review->headline)}}</h6>
                    </div>
                    <div class="col-12 mt-2 px-4">
                        "{{$review->body}}"
                    </div>
                    <div class="col-12 pb-2 mb-0 text-right">
                        Rated: {{$review->rating}} / 5
                    </div>
                </div>

                @empty

                    <p class="text-white">This hotel does not have any reviews yet.</p>

                @endforelse

                @if(!Auth::guest() && Auth::user()->hasRole('guest'))
                <div class="col-12 px-0 text-white">
                    @if(empty($reviews->where('guest_id', $guest->id)->first()))
                    <h5 class="text-tertiary">Add review:</h5>
                    {!!Form::open(['action' => ['HotelReviewsController@store'], 'method' => 'POST'])!!}
                    @else
                    <h5 class="text-tertiary">Edit review:</h5>
                    {!!Form::open(['action' => ['HotelReviewsController@update'], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'PUT')}}
                    @endif
                        {{Form::hidden('hotel_id', $hotel->id)}}
                        {{Form::hidden('guest_id', $guest->id)}}
                        <div class="form-group">
                            {{Form::label('headline', 'Headline (optional):')}}
                            {{Form::text('headline', (isset($reviews->where('guest_id', $guest->id)->first()->headline) ? $reviews->where('guest_id', $guest->id)->first()->headline : ''), ['class' => 'form-control form-control-sm'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('body', 'Description:', ['class' => 'form-label'])}}
                            <textarea name="body" id="body" class="form-control" placeholder="Outline your experience...">@if(!empty($reviews->where('guest_id', $guest->id)->first()->body)){{$reviews->where('guest_id', $guest->id)->first()->body}}@endif</textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                {{Form::label('rating', 'Rate:')}}
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="rate1" name="rating" value="1"
                                    @if(!empty($reviews->where('guest_id', $guest->id)->first()->rating) && $reviews->where('guest_id', $guest->id)->first()->rating == '1') checked @endif>
                                    <label class="custom-control-label pl-0" for="rate1">1</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="rate2" name="rating" value="2"
                                    @if(!empty($reviews->where('guest_id', $guest->id)->first()->rating) && $reviews->where('guest_id', $guest->id)->first()->rating == '2') checked @endif>
                                    <label class="custom-control-label" for="rate2">2</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="rate3" name="rating" value="3"
                                    @if(!empty($reviews->where('guest_id', $guest->id)->first()->rating) && $reviews->where('guest_id', $guest->id)->first()->rating == '3') checked @endif>
                                    <label class="custom-control-label" for="rate3">3</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="rate4" name="rating" value="4"
                                    @if(!empty($reviews->where('guest_id', $guest->id)->first()->rating) && $reviews->where('guest_id', $guest->id)->first()->rating == '4') checked @endif>
                                    <label class="custom-control-label" for="rate4">4</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="rate5" name="rating" value="5"
                                    @if(!empty($reviews->where('guest_id', $guest->id)->first()->rating) && $reviews->where('guest_id', $guest->id)->first()->rating == '5') checked @endif>
                                    <label class="custom-control-label" for="rate5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            {{Form::submit(
                                (null !== ($reviews->where('guest_id', $guest->id)->first()) ? 'UPDATE' : 'POST')
                                , ['class' => 'btn btn-lg btn-primary tertiaryColor'])}}
                    {!!Form::close()!!}
                    @if(!empty($reviews->where('guest_id', $guest->id)->first()))
                    {!!Form::open(['action' => ['HotelReviewsController@destroy', $reviews->where('guest_id', $guest->id)->first()->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('DELETE', ['class' => 'btn btn-lg btn-danger text-white ml-2'])}}
                    {!!Form::close()!!}
                    @endif
                    </div>
                </div>
                @else
                    @if(!Auth::guest() && Auth::user()->hasRole('guest'))
                    <p class="text-white">You have already reviewed this hotel</p>
                    @endif
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

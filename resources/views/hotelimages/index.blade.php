@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <h4>Upload Multiple Images</h4>
            <form action="" id="formField" method="post" enctype="multipart/form-data" class="row no-gutters">
                <div class="form-group col-md-4">
                    <div class="custom-file">
                        <input type="file" name="image[]" class="custom-file-input" multiple="true">
                        <label class="custom-file-label" for="customFile">Choose one or more images</label>
                    </div>
                </div>
                <div class="col-md-auto">
                {{Form::hidden('hotel_id', $hotel->id)}}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <hr>
            <h3>Listing Images</h3>
            <div class="row">
                @forelse($photos as $photo)
                    <div class="col-md-3">
                        <img src="/{{ $photo->thumbnail }}" class="img-fluid" id="photoid_{{$photo->id}}" data-toggle = 'modal' data-target = '#enlarge-photo'>

                        {!!Form::open(['action' => ['HotelImagesController@destroy', $photo->id], 'method' => 'POST', 'id' => 'deleteformid_'.$photo->id])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::hidden('photo_id', $photo->id)}}
                            {{Form::button('Delete', ['class' => 'btn btn-danger', 'data-toggle'=> 'modal', 'data-target' => '#confirm-submit', 'id' => 'deletebuttonid_'.$photo->id])}}
                        {!!Form::close()!!}

                        <script>

                        $(document).ready(function() {

                            $(document).on("click", "#deletebuttonid_{{ $photo->id }}", function() {

                                $('#imgConfirm').attr('src', '/{{ $photo->thumbnail }}');
                                $('#submit').attr('data-id', '{{ $photo->id }}');

                            });

                            $(document).on("click", "[data-id='{{$photo->id}}']", function() {

                                var id = $(this).data('id');
                                $('#deleteformid_' + id).submit();

                            });

                            $(document).on("click", "#photoid_{{$photo->id}}", function() {

                                $('#enlImg').attr('src', '/{{$photo->image}}');

                            });

                            $('#photoid_{{$photo->id}}, #enlImg').hover(function() {
                                $(this).css('cursor','pointer');
                            });

                        });
                        </script>
                    </div>
                @empty
                    Your image gallery is empty.
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content" style="background-color: rgba(0,0,0, 0)">
            <div class="modal-header" style="background-color: rgba(0,0,0, 0.7)">
                Confirm Deletion
            </div>
            <div class="modal-body" style="background-color: rgba(0,173,181, 0.7)">
                <div class="row justify-content-md-center">
                    <h4 class="mb-4">Are you sure you want to delete this image?</h4>

                    <img src="" id="imgConfirm"/>
                </div>
            </div>

            <div class="modal-footer border-0" style="background-color: rgba(0,173,181, 0.7)">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                <a href="#" id="submit" class="btn btn-danger danger">Confirm</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="enlarge-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered text-white">
        <div class="modal-content" style="background-color: rgba(0,0,0, 0.7)">
            <div class="modal-body">
                <div class="row justify-content-md-center">

                    <img data-dismiss="modal" src="/{{ $photos[0]->image }}" class="img-fluid" id="enlImg" style="height: auto">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>

</script>
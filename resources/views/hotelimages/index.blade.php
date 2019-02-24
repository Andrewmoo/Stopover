@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                        <a href="/{{ $photo->image }}"><img src="/{{ $photo->thumbnail }}" class="img-fluid"></a>

                        {!!Form::open(['action' => ['HotelImagesController@destroy', $photo->id], 'method' => 'POST', 'id' => 'deleteformid_'.$photo->id])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::hidden('photo_id', $photo->id)}}
                            {{Form::button('Delete', ['class' => 'btn btn-danger', 'data-toggle'=> 'modal', 'data-target' => '#confirm-submit', 'id' => $photo->id])}}
                        {!!Form::close()!!}

                        <script>

                        $(document).ready(function() {

                            $(document).on("click", "#{{ $photo->id }}", function() {

                                console.log($(this).prop('id'));
                                $('#imgConfirm').attr('src', '/{{ $photo->thumbnail }}');
                                $('#submit').attr('data-id', '{{ $photo->id }}');

                            });

                            $(document).on("click", "[data-id='{{$photo->id}}']", function() {
                                var id = $("[data-id='{{$photo->id}}'").data('id');
                                console.log(id);
                                $('#deleteformid_' + id).submit();
                            });

                        });
                        </script>
                    </div>
                @empty
                    No image found
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Confirm Submit
                </div>
                <div class="modal-body">
                    <div class="row justify-content-md-center">
                    <h4>Are you sure you want to delete this image?</h2>

                    <img src="" id="imgConfirm"/>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="#" id="submit" class="btn btn-success success">Submit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>

</script>
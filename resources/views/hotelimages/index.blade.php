@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Upload Multiple Images</h4>
                </div>
    
                <div class="panel-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="image[]" class="form-control-file" multiple="true">
                        </div>
                        {{Form::hidden('hotel_id', $hotel->id)}}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
    
                    <hr>
                    <h3>Listing Images</h3>
                    <div class="row">
                    @forelse($photos as $photo)
                        <div class="col-md-4">
                            <a href="/{{ $photo->image }}"><img src="/{{ $photo->thumbnail }}" class="img-responsive"></a>
                        </div>
                    @empty
                        No image found
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
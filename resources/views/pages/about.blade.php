@extends('layouts.app')
@section('content')
        <h1>About</h1>
        <p>This is the about page</p>
        <div style="width: 500px; height: 500px;">
                {!! Mapper::render(); !!}
        </div>
@endsection

@extends('base')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <single-author :author_id="{{$author}}"></single-author>
            </div>
        </div>
    </div>
@endsection
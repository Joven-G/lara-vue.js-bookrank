@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<books-filter filter="{{$filter}}" val="{{$val}}"></books-filter>
            </div>
        </div>
    </div>
@endsection
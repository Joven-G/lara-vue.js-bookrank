@extends("base")

@section("content")
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <single-book book_id="{{$book}}"></single-book>
            </div>
        </div>
    </div>
@endsection
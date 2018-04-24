@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<book-form></book-form>
            	<div class="pt-5 pb-2">
	            	<h3 class="page-title">Recent Books</h3>
	            	<hr>
            	</div>
                <books></books>
            </div>
        </div>
    </div>
@endsection
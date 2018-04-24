<?php

namespace App\Http\Controllers\Api;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    //
    public function index() {
    	$books = Book::latest()
    		->paginate(20);

    	return BookResource::collection($books);
    }

    public function show(Book $book) {
    	return new BookResource($book);
    }

    public function store(Request $request) {
    	$book = $this->validate($request, [
    		'title' => 'required|min:3|max:60',
            'genre' => 'required'
    	]);

    	$book = Book::create($book);

    	return new BookResource($book);
    }

    public function update(Book $book) {
        return new BookResource($book);
    }
}

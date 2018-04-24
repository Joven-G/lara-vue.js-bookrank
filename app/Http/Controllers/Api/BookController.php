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
    		->paginate(10);

    	return BookResource::collection($books);
    }

    public function show(Book $book) {
    	return new BookResource($book);
    }

    public function store(Request $request) {
    	$book = $this->validate($request, [
    		'title' => 'required|min:3|max:60',
            'genre' => 'required',
            'year' => 'required',
            'author_id' => 'required',
            'description' => 'required',
    	]);

    	$book = Book::create($book);

    	return new BookResource($book);
    }

    public function update(Book $book) {
        return new BookResource($book);
    }

    public function voteup(Book $book) {
        $book->vote(1);
        return $this->index();
    }

    public function votedown(Book $book) {
        $book->vote(-1);
        return $this->index();
    }
}

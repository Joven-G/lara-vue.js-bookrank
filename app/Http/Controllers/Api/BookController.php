<?php

namespace App\Http\Controllers\Api;

use Auth;
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

    public function destroy(Request $request, Book $book) {
        $book->delete();
        return ["status" => "deleted"];
    }

    public function voteup(Book $book) {
        $book->vote(1);
        return $this->index();
    }

    public function votedown(Book $book) {
        $book->vote(-1);
        return $this->index();
    }

    public function byauthor(Request $request, $author) {
        $books =  Book::where('author_id', $author)->orderBy('year', 'desc')->paginate(20);
        return BookResource::collection($books);
    }

    public function filter(Request $request, $filter, $val) {
        $books = Book::where($filter, $val)->orderBy('title', 'asc')->paginate(20);
        return BookResource::collection($books);
    }
}

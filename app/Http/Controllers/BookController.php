<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    //
    public function index() {
    	return view('books.index');
    }

    public function show(Request $request, $book) {
    	return view('books.show', [
    		"book" => $book
    	]);
    }

    public function filter(Request $request, $filter, $val) {
    	return view('books.filter', [
    		"filter" => $filter,
    		"val" => $val,
    	]);
    }
}

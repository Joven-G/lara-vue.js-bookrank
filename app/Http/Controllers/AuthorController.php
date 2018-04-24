<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function show(Request $request, $author) {
    	return view('authors.show', [
			"author" => $author
		]);
    }
}

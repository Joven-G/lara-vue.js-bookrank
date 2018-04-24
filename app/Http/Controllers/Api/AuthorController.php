<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    //
    public function index() {
    	$authors = Author::latest()
    		->paginate(20);

    	return AuthorResource::collection($authors);
    }

    public function show(Author $author) {
    	return new AuthorResource($author);
    }

    public function store(Request $request) {
    	$author = $this->validate($request, [
    		'first_name' => 'required|min:3',
    		'last_name' => 'required|min:3'
    	]);

    	$author = Author::create($request);

    	return new AuthorResource($author);
    }
}

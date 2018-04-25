<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('books', 'Api\BookController')
	->only(['index', 'store', 'show', 'destroy']);

Route::get('authors/{author}/books', 'Api\BookController@byauthor');

Route::put('books/{book}/report', 'Api\BookController@update');

Route::put('books/{book}/vote-up', 'Api\BookController@voteup');

Route::put('books/{book}/vote-down', 'Api\BookController@votedown');

Route::resource('authors', 'Api\AuthorController')
	->only(['index', 'show', 'store']);
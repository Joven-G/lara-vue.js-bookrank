<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public $fillable = ["title", "genre", "year", "author_id"];

    public function author() {
    	return $this->hasOne('App\Author');
    }
}

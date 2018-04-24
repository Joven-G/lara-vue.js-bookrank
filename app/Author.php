<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public $fillable = ["first_name", "last_name", "birth"];

    public function books() {
    	return $this->hasMany('App\Book', 'author_id', 'id');
    }
}

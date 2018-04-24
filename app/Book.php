<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public $fillable = ["title", "genre", "year", "author_id", "description", "votes"];

    public function author() {
    	return $this->belongsTo('App\Author');
    }

    public function vote($v) {
    	$this->update(['votes' => ($this->votes + $v) ]);
    }
}

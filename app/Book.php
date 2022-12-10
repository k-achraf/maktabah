<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function category(){
        return $this->belongsTo('App\Category' , 'category_id');
    }

    public function author(){
        return $this->belongsTo('App\Author', 'author_id');
    }

    public function propertty(){
        return $this->belongsTo('App\Property', 'property');
    }

    public function requests(){
        return $this->hasMany('App\BookRequest', 'book_id');
    }
}

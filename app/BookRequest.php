<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    protected $table = 'books_requests';

    public function book(){
        return $this->belongsTo('App\Book', 'book_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}

<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function show($id){
        $book = Book::find($id);
        return view('book')->with('book', $book);
    }

    public function save($id){
        DB::table('saved_books')->insert([
            'book_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/home')->with('msg', 'Book Saved Successfully');
    }

    public function saved(){
        $books = [];
        $saved = DB::table('saved_books')->where('user_id', auth()->user()->id)->get();
        foreach ($saved as $s){
            $book = Book::query()->find($s->book_id);
            $books [] = $book;
        }

        return view('savedbooks')->with('books', $books);
    }
}

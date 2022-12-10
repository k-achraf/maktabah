<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function viewCategory($id){
        $cat = Category::find($id);
        $books = Book::where('category_id', $cat->id)->get();

        return view('viewcategory')->with('books', $books)->with('cat', $cat);
    }

    public function welcome(){
        $books = Book::where('id', '>', 0)->orderBy('id', 'DESC')->limit(4)->get();
        $authors = Author::where('id', '>', 0)->orderBy('id', 'DESC')->limit(4)->get();
        return view('welcome')->with('books', $books)->with('authors', $authors);
    }
}

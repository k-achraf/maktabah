<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookRequest;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function make($id){
        $book = Book::find($id);

        if($book->copies > 0){
            $bookRequest = new BookRequest();
            $bookRequest->book_id = $id;
            $bookRequest->user_id = auth()->user()->id;
            $bookRequest->save();

            $book->copies = $book->copies - 1;
            $book->save();
            return redirect('/home')->with('msg', 'Book Requested Successfully');
        }

        return redirect('/home')->with('error', 'No Copies Available For This Book');
    }

    public function index(){
        $requests = BookRequest::query()->where('status', 'Pending')->get();

        return view('admin.requests')->with('requests', $requests);
    }

    public function accept($id){
        $r = BookRequest::find($id);

        $r->status = 'Accepted';
        $r->save();

        return redirect()->back()->with('msg', 'Book Accepted Successfully');
    }

    public function reject($id){
        $r = BookRequest::query()->find($id);
        $book = Book::query()->find($id);

        $r->status = 'Rejected';
        $r->save();

        $book->copies = $book->copies + 1;
        $book->save();

        return redirect()->back()->with('msg', 'Book Rejected Successfully');
    }

    public function accepted(){
        $books = BookRequest::query()->where('status', 'Accepted')->get();

        return view('admin.accepted')->with('requests', $books);
    }

    public function rejected(){
        $books = BookRequest::query()->where('status', 'Rejected')->get();

        return view('admin.rejected')->with('requests', $books);
    }

    public function mybooks(){
        $books = BookRequest::query()->where('user_id', auth()->user()->id)->get();

        return view('bookshelves')->with('requests', $books);
    }
}

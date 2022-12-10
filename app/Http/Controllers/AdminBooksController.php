<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        foreach ($books as $book){
            $category = Category::find($book->category_id);
            $book->category = $category->name;
        }
        return view('admin.books')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $ahtors = Author::all();
        return view('admin.addbook')->with('categories' , $categories)->with('authors', $ahtors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required|integer',
        ]);

        $book = new Book();
        if ($request->hasFile('file')){
            $file = Storage::disk('public')->putFile('/books/files', $request->file('file'));
            $book->file = $file;
        }
        if ($request->hasFile('image')){
            $path = Storage::disk('public')->putFile('/books', $request->file('image'));
            $book->image = $path;
        }
        $book->title = $request->title;
        $book->subtitle = $request->subtitle;
        $book->paralel = $request->paralel;
        $book->author_id = $request->author;
        $book->keywords = $request->keywords;
        $book->info = $request->info;
        $book->copies = $request->copies;
        $book->category_id = $request->category;
        $book->author_id = $request->author;
        $book->isbn = $request->identifier;
        $book->language = $request->language;
        $book->source = $request->source;
        $book->place = $request->place;
        $book->date = $request->date;
        $book->type = $request->type;
        $book->time = $request->time;
        $book->relation = $request->relation;
        $book->coverage = $request->coverage;
        $book->identifier = $request->identifier;
        $book->number = $request->number;
        $book->contributor = $request->contributor;
        $book->format = $request->form;

        $property = new Property();
        $property->publisher = $request->publisher;
        $property->copyrights = $request->copyrights;
        $property->orcid = $request->orcid;
        $property->author_id = $request->author;
        $property->save();

        $book->property = $property->id;
        $book->save();

        return redirect(route('books.index'))->with('msg' , 'book Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $authors = Author::all();
        $book = Book::find($id);
        return view('admin.editbook')->with('categories' , $categories)->with('book' , $book)->with('authors', $authors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required|integer',
        ]);

        $book = Book::find($id);
        $property = Property::find($request->property);

        if ($request->hasFile('image')){
            $path = Storage::disk('public')->putFile('/books', $request->file('image'));
            $book->image = $path;
        }
        if ($request->hasFile('file')){
            $file = Storage::disk('public')->putFile('/books/files', $request->file('file'));
            $book->file = $file;
        }
        $book->title = $request->title;
        $book->subtitle = $request->subtitle;
        $book->paralel = $request->paralel;
        $book->author_id = $request->author;
        $book->keywords = $request->keywords;
        $book->info = $request->info;
        $book->copies = $request->copies;
        $book->category_id = $request->category;
        $book->author_id = $request->author;
        $book->isbn = $request->identifier;
        $book->language = $request->language;
        $book->source = $request->source;
        $book->place = $request->place;
        $book->date = $request->date;
        $book->type = $request->type;
        $book->time = $request->time;
        $book->relation = $request->relation;
        $book->coverage = $request->coverage;
        $book->identifier = $request->identifier;
        $book->number = $request->number;
        $book->contributor = $request->contributor;
        $book->format = $request->form;
        $book->save();

        $property->publisher = $request->publisher;
        $property->copyrights = $request->copyrights;
        $property->orcid = $request->orcid;
        $property->author_id = $request->author;
        $property->save();

        return redirect(route('books.index'))->with('msg' , 'book edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $property = Property::find($book->property);

        $book->delete();
        $property->delete();
        return redirect(route('books.index'))->with('msg' , 'book deleted');
    }
}

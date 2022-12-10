<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminAuthorController extends Controller
{
    /**
     */
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors')->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addauthor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image'
        ]);

        $author = new Author();
        $author->name = $request->name;
        $path = 'authors/author.jpg';
        if ($request->hasFile('image')){
            $path = Storage::disk('public')->putFile('/authors', $request->file('image'));
            $author->image = $path;
        }
        $author->image = $path;
        $author->save();

        return redirect(route('authors.index'))->with('msg' , 'Author Added');
    }

    /**
     * Display the specified resource.
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
        $author = Author::find($id);
        return view('admin.editauthor')->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image'
        ]);
        $author = Author::find($id);
        $author->name = $request->name;
        if ($request->hasFile('image')){
            $path = Storage::disk('public')->putFile('/authors', $request->file('image'));
            $author->image = $path;
        }
        $author->save();

        return redirect(route('authors.index'))->with('msg' , 'Author Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();

        return redirect(route('authors.index'))->with('msg' , 'Author Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index($type){
        if(strtolower($type) == 'browse'){
            return view('search.browse');
        }
        if(strtolower($type) == 'advanced'){
            return view('search.advanced');
        }
        if(strtolower($type) == 'keyword'){
            return view('search.keyword');
        }

        return redirect()->back();
    }

    public function result(){
        return view('result');
    }

    public function browse(Request $request){

        $books = DB::table('books');
        if (isset($request->keyword) and $request->keyword != null){
            $books->where('title', 'LIKE', '%'.$request->title.'%');
            $books->orWhere('subtitle', 'LIKE', '%'.$request->title.'%');
            $books->orWhere('paralel', 'LIKE', '%'.$request->title.'%');
            $books->orWhere('info', 'LIKE', '%'.$request->subject.'%');
        }
        else{
            foreach ($request->all() as $key => $value){
                if($value != null and $value != 'null'){
                    if($key == 'title'){
                        $books->where('title', 'LIKE', '%'.$request->title.'%');
                        $books->orWhere('subtitle', 'LIKE', '%'.$request->title.'%');
                        $books->orWhere('paralel', 'LIKE', '%'.$request->title.'%');
                    }
                    if($key == 'author'){
                        $authors = Author::query()->where('name', 'LIKE', '%'.$request->author.'%')->get();
                        if (count($authors) > 0){
                            $i = 0;
                            foreach ($authors as $author){
                                if($i == 0){
                                    $books->where('author_id', '=', $author->id);
                                }
                                else{
                                    $books->orWhere('author_id', '=', $author->id);
                                }
                                $i++;
                            }
                        }
                    }
                    if($key == 'subject'){
                        $books->where('info', 'LIKE', '%'.$request->subject.'%');
                    }
                    if($key == 'isbn'){
                        $books->where('isbn', 'LIKE', '%'.$request->subject.'%');
                    }
                    if ($key == 'publisher'){
                        $publishers = Property::query()->where('publisher', 'LIKE', '%'.$request->publisher.'%')->get();
                        if (count($publishers) > 0){
                            $k = 0;
                            foreach ($publishers as $publisher){
                                if($k == 0){
                                    $books->where('property', '=', $publisher->id);
                                }
                                else{
                                    $books->orWhere('property', '=', $publisher->id);
                                }
                                $k++;
                            }
                        }
                    }
                    if ($key == 'category'){
                        $books->where('category_id', '=', $request->category);
                    }
                    if ($key == 'aviability'){
                        if($value == 1){
                            $books->where('copies', '>', 0);
                        }
                        if($value == 0){
                            $books->where('copies', '<', 0);
                        }
                    }
                }
            }
        }

        $objects = $books->get();
        return view('result')->with('books', $objects);
    }

    public function keyword(Request $request){

        $request->validate([
            'keyword' => 'required'
        ]);

        if(strtolower($request->on) == 'null'){
            return redirect()->back()->with('error', 'Please Select Search Place');
        }

        $books = DB::table('books');
        if(strtolower($request->on) == 'title'){
            $books->where('title', 'LIKE', '%'.$request->keyword.'%');
            $books->orWhere('subtitle', 'LIKE', '%'.$request->keyword.'%');
            $books->orWhere('paralel', 'LIKE', '%'.$request->keyword.'%');
        }
        if(strtolower($request->on) == 'author'){
            $authors = Author::query()->where('name', 'LIKE', '%'.$request->keyword.'%')->get();
            if (count($authors) > 0){
                $i = 0;
                foreach ($authors as $author){
                    if($i == 0){
                        $books->where('author_id', '=', $author->id);
                    }
                    else{
                        $books->orWhere('author_id', '=', $author->id);
                    }
                    $i++;
                }
            }
        }
        if(strtolower($request->on) == 'publisher'){
            $publishers = Property::query()->where('publisher', 'LIKE', '%'.$request->keyword.'%')->get();
            if (count($publishers) > 0){
                $k = 0;
                foreach ($publishers as $publisher){
                    if($k == 0){
                        $books->where('property', '=', $publisher->id);
                    }
                    else{
                        $books->orWhere('property', '=', $publisher->id);
                    }
                    $k++;
                }
            }
        }
        if(strtolower($request->on) == 'subject'){
            $books->where('info', 'LIKE', '%'.$request->keyword.'%');
        }

        if(strtolower($request->on) == 'all'){
            $books->where('title', 'LIKE', '%'.$request->keyword.'%');
            $books->orWhere('subtitle', 'LIKE', '%'.$request->keyword.'%');
            $books->orWhere('paralel', 'LIKE', '%'.$request->keyword.'%');

            $books->orWhere('info', 'LIKE', '%'.$request->keyword.'%');

            $authors = Author::query()->where('name', 'LIKE', '%'.$request->keyword.'%')->get();
            if (count($authors) > 0){
                foreach ($authors as $author){
                    $books->orWhere('author_id', '=', $author->id);
                }
            }

            $publishers = Property::query()->where('publisher', 'LIKE', '%'.$request->keyword.'%')->get();
            if (count($publishers) > 0){
                foreach ($publishers as $publisher){
                    $books->orWhere('property', '=', $publisher->id);
                }
            }
        }

        $objects = $books->get();
        return view('result')->with('books', $objects);
    }

    public function advanced(Request $request){
        $request->validate([
            'keyword' => 'required'
        ]);

        if(strtolower($request->within) == 'null'){
            return redirect()->back()->with('error', 'Please Select Keyword within');
        }

        if(strtolower($request->on) == 'null'){
            return redirect()->back()->with('error', 'Please Select Keyword anywhere');
        }
        if(strtolower($request->booltype) == null){
            return redirect()->back()->with('error', 'Please Check a value(and, or, not)');
        }

        $books = DB::table('books');

        if(strtolower($request->within) == 'all'){
            $books->where('title', 'LIKE', '%'.$request->keyword.'%');
            $books->orWhere('subtitle', 'LIKE', '%'.$request->keyword.'%');
            $books->orWhere('paralel', 'LIKE', '%'.$request->keyword.'%');

            $books->where('info', 'LIKE', '%'.$request->keyword.'%');
        }
        if(strtolower($request->within) == 'any'){
            $books->where('title', 'LIKE', '%'.$request->keyword.'%');
            $books->orWhere('subtitle', 'LIKE', '%'.$request->keyword.'%');
            $books->orWhere('paralel', 'LIKE', '%'.$request->keyword.'%');

            $books->orWhere('info', 'LIKE', '%'.$request->keyword.'%');
        }
        if(strtolower($request->within) == 'phrase'){
            $books->where('title', '=', $request->keyword);
            $books->orWhere('subtitle', '=', $request->keyword);
            $books->orWhere('paralel', '=', $request->keyword);

            $books->orWhere('info', '=', $request->keyword);
        }


        if(strtolower($request->booltype) == 'and'){
            if($request->yeartype != null){
                if(strtolower($request->yeartype) == 'year'){
                    if ($request->pyear != 'null'){
                        $books->where('date', '=', $request->pyear);
                    }
                }
                if(strtolower($request->yeartype) == 'fromto'){
                    if ($request->from != 'null'){
                        $books->where('date', '>', $request->from);
                    }
                    if($request->to != 'null'){
                        $books->where('date', '<', $request->to);
                    }
                }
            }

            if($request->type != 'null'){
                $books->where('type', '=', $request->type);
            }
            if ($request->place != null){
                $books->where('place', 'LIKE', '%'.$request->place.'%');
            }
            if ($request->place != null){
                $books->where('language', 'LIKE', '%'.$request->language.'%');
            }
        }
        if (strtolower($request->booltype) == 'or'){
            if($request->yeartype != null){
                if(strtolower($request->yeartype) == 'year'){
                    if ($request->pyear != 'null'){
                        $books->orWhere('date', '=', $request->pyear);
                    }
                }
                if(strtolower($request->yeartype) == 'fromto'){
                    if ($request->from != 'null'){
                        $books->orWhere('date', '>', $request->from);
                    }
                    if ($request->to != 'null'){
                        $books->where('date', '<', $request->to);
                    }

                }
            }

            if ($request->type != 'null'){
                $books->orWhere('type', '=', $request->type);
            }
            if ($request->place != null){
                $books->orWhere('place', 'LIKE', '%'.$request->place.'%');
            }
            if ($request->language != null){
                $books->orWhere('language', 'LIKE', '%'.$request->languale.'%');
            }
        }
        if (strtolower($request->booltype) == 'not'){
            if ($request->yeartype != null){
                if(strtolower($request->yeartype) == 'year'){
                    if ($request->pyear != 'null'){
                        $books->where('date', '<>', $request->pyear);
                    }
                }
                if(strtolower($request->yeartype) == 'fromto'){
                    if ($request->from != 'null'){
                        $books->where('date', '<', $request->from);
                    }
                    if ($request->to != 'null'){
                        $books->orWhere('date', '>', $request->to);
                    }
                }
            }

            if ($request->type != 'null'){
                $books->where('type', '<>', $request->type);
            }
            if ($request->place != null){
                $books->where('place', 'NOT LIKE', '%'.$request->place.'%');
            }
            if ($request->language != null){
                $books->where('language', 'NOT LIKE', '%'.$request->language.'%');
            }
        }

        $objects = $books->get();
        return view('result')->with('books', $objects);
    }
}

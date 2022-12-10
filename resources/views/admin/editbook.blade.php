@extends('adminlte::page')

@section('title', 'Add Category')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">edit book</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('partial.alert')
            <div class="mt-2">
                <form action="{{route("books.update" , $book->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <input type="hidden" name="property" value="{{$book->property}}">
                    <div class="form-group">
                        <label for="title"> title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
                    </div>
                    <div class="form-group">
                        <label for="subtitle"> subtitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{$book->subtitle}}">
                    </div>
                    <div class="form-group">
                        <label for="paralel"> paralel</label>
                        <input type="text" class="form-control" id="paralel" name="paralel" value="{{$book->paralel}}">
                    </div>
                    <div class="form-group">
                        <label for="author"> publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher" value="{{$book->propertty->publisher}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="author"> author</label>
                        <select id="author" class="form-control" name="author">
                            @foreach($authors as $author)
                                <option value="{{$author->id}}" @if($book->author_id == $author->id) selected @endif>{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="info"> Description</label>
                        <input type="text" class="form-control" id="info" name="info" value="{{$book->info}}">
                    </div>
                    <div class="form-group">
                        <label for="copies">copies number</label>
                        <input type="text" class="form-control" id="copies" name="copies" value="{{$book->copies}}">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="category"> category</label>
                        <select id="category" class="form-control" name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($book->category_id == $category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keywords"> keywords</label>
                        <input type="text" class="form-control" id="keywords" name="keywords" value="{{$book->keywords}}">
                    </div>
                    <div class="form-group">
                        <label for="copyrights"> rights</label>
                        <input type="text" class="form-control" id="copyrights" name="copyrights" value="{{$book->propertty->copyrights}}">
                    </div>
                    <div class="form-group">
                        <label for="isbn"> identifier</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="{{$book->isbn}}">
                    </div>
                    <div class="form-group">
                        <label for="language"> language</label>
                        <input type="text" class="form-control" id="language" name="language" value="{{$book->language}}">
                    </div>
                    <div class="form-group">
                        <label for="source"> source</label>
                        <input type="text" class="form-control" id="source" name="source" value="{{$book->source}}">
                    </div>
                    <div class="form-group">
                        <label for="place">publish place</label>
                        <input type="text" class="form-control" id="place" name="place" value="{{$book->place}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date">publish date</label>
                        <select id="date" class="form-control" name="date">
                            @for($i = 2020; $i >= 1700; $i--)
                                <option value="{{$i}}" @if($book->date == $i) selected @endif>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="type"> format</label>
                        <select id="type" class="form-control" name="type">
                            <option value="book" @if($book->type == 'book') selected @endif>Book</option>
                            <option value="pdf" @if($book->type == 'pdf') selected @endif>Pdf</option>
                            <option value="cd/dvd" @if($book->type == 'cd/dvd') selected @endif>Cd/Dvd</option>
                            <option value="audio" @if($book->type == 'audio') selected @endif>Audio</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="relation">relation</label>
                        <input type="text" class="form-control" id="relation" name="relation" value="{{$book->relation}}">
                    </div>
                    <div class="form-group">
                        <label for="coverage">coverage</label>
                        <input type="text" class="form-control" id="coverage" name="coverage" value="{{$book->coverage}}">
                    </div>
                    <div class="form-group">
                        <label for="contributor">contributor</label>
                        <input type="text" class="form-control" id="contributor" name="contributor" value="{{$book->contributor}}">
                    </div>
                    <div class="form-group">
                        <label for="number">call number</label>
                        <input type="text" class="form-control" id="number" name="number" value="{{$book->number}}">
                    </div>
                    <div class="form-group">
                        <label for="form">Type</label>
                        <input type="text" class="form-control" id="form" name="form" value="{{$book->format}}">
                    </div>
                    <div class="form-group">
                        <label for="identifier">identifier</label>
                        <input type="text" class="form-control" id="identifier" name="identifier" value="{{$book->identifier}}">
                    </div>
                    <div class="form-group">
                        <label for="time">Loan Time</label>
                        <input type="text" class="form-control" id="time" name="time" value="{{$book->time}}">
                    </div>
                    <div class="form-group">
                        <label for="orcid">ORCID</label>
                        <input type="text" class="form-control" id="orcid" name="orcid" value="{{$book->propertty->orcid}}">
                    </div>
                    <div class="form-group">
                        <label for="file">book file</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

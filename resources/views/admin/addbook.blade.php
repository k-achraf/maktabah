@extends('adminlte::page')

@section('title', 'Add New Document')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Add New Document</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('partial.alert')
            <div class="mt-2">
                <form action="{{route("books.store")}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title"> title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="subtitle"> subtitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle">
                    </div>
                    <div class="form-group">
                        <label for="paralel"> paralel title</label>
                        <input type="text" class="form-control" id="paralel" name="paralel">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="author"> author</label>
                        <select id="author" class="form-control" name="author">
                            <option selected value="null">Choose...</option>
                            @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="publisher"> publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher">
                    </div>
                    <div class="form-group">
                        <label for="info"> Description</label>
                        <input type="text" class="form-control" id="info" name="info">
                    </div>
                    <div class="form-group">
                        <label for="copies">copies number</label>
                        <input type="text" class="form-control" id="copies" name="copies">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="category"> category</label>
                        <select id="category" class="form-control" name="category">
                            <option selected value="null">Choose...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keywords"> keywords</label>
                        <input type="text" class="form-control" id="keywords" name="keywords">
                    </div>
                    <div class="form-group">
                        <label for="copyrights"> rights</label>
                        <input type="text" class="form-control" id="copyrights" name="copyrights">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="language"> Language</label>
                        <select id="language" class="form-control" name="language">
                            <option value="" selected>Select</option>
                            <option value="Arabic">Arabic</option>
                            <option value="French">French</option>
                            <option value="English">English</option>
                            <option value="Tamazight">Tamazight</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Italian">Italian</option>
                            <option value="German">German</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="source"> source</label>
                        <input type="text" class="form-control" id="source" name="source">
                    </div>
                    <div class="form-group">
                        <label for="place">publish place</label>
                        <input type="text" class="form-control" id="place" name="place">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date">publish date</label>
                        <select id="date" class="form-control" name="date">
                            <option value="" selected>Select</option>
                            @for($i = 2020; $i >= 1700; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="type"> Format</label>
                        <select id="type" class="form-control" name="type">
                            <option value="" selected>Select</option>
                            <option value="book">Book</option>
                            <option value="pdf">Pdf</option>
                            <option value="cd/dvd">Cd/Dvd</option>
                            <option value="audio">Audio</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="relation">relation</label>
                        <input type="text" class="form-control" id="relation" name="relation">
                    </div>
                    <div class="form-group">
                        <label for="coverage">coverage</label>
                        <input type="text" class="form-control" id="coverage" name="coverage">
                    </div>
                    <div class="form-group">
                        <label for="contributor">contributor</label>
                        <input type="text" class="form-control" id="contributor" name="contributor">
                    </div>
                    <div class="form-group">
                        <label for="number">call number</label>
                        <input type="text" class="form-control" id="number" name="number">
                    </div>
                    <div class="form-group">
                        <label for="form">Type</label>
                        <input type="text" class="form-control" id="form" name="form">
                    </div>
                    <div class="form-group">
                        <label for="identifier">identifier</label>
                        <input type="text" class="form-control" id="identifier" name="identifier">
                    </div>
                    <div class="form-group">
                        <label for="time">Loan Duration</label>
                        <input type="text" class="form-control" id="time" name="time">
                    </div>
                    <div class="form-group">
                        <label for="orcid">ORCID</label>
                        <input type="text" class="form-control" id="orcid" name="orcid">
                    </div>
                    <div class="form-group">
                        <label for="file"> file</label>
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

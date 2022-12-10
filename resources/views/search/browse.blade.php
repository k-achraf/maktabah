@extends('layouts.app')

@section('search')

    <div class="container">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Search for object</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('partial.alert')
                <div class="mt-2">
                    <form action="/search/make/browse" method="get">
                        <div class="keyword">
                            <div class="form-group">
                                <label for="keyword">Search</label>
                                <input type="text" class="form-control" id="keyword" name="keyword">
                                <br>
                                <button type="submit" class="btn btn-primary pull-right" id="add-filter">Search Options</button>
                            </div>
                            <br>
                        </div>
                        <div class="form-filter" style="display: none">
                            <div class="form-group">
                                <label for="title">Book title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="isbn">Standard number</label>
                                <input type="text" class="form-control" id="isbn" name="isbn">
                            </div>
                            <div class="form-group">
                                <label for="publisher">book publisher</label>
                                <input type="text" class="form-control" id="publisher" name="publisher">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category">book category</label>
                                <select id="category" class="form-control" name="category">
                                    <option selected value="null">Choose...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category">Aviability</label>
                                <select id="aviability" class="form-control" name="aviability">
                                    <option selected value="null">Choose...</option>
                                    <option value="1">Aviable</option>
                                    <option value="0">Not Aviable</option>
                                    <option value="2">Any</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary pull-right mb-3" id="remove-filter">Remove filter</button>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection

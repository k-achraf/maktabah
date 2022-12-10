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
                    <form action="/search/make/keyword" method="get">
                        <div class="form-records-1">
                            <div class="form-group">
                                <label for="keyword">Search</label>
                                <input type="text" class="form-control" id="keyword" name="keyword">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="on">Keyword On:</label>
                                <select id="on" class="form-control" name="on">
                                    <option selected value="null">Choose...</option>
                                    <option value="all">All</option>
                                    <option value="title">Title</option>
                                    <option value="author">Author</option>
                                    <option value="subject">Subject</option>
                                </select>
                            </div>
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

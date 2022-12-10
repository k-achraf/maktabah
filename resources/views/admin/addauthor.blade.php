@extends('adminlte::page')

@section('title', 'Add Author')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">create author</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('partial.alert')
            <div class="mt-2">
                <form action="{{route("authors.store")}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">author name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
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

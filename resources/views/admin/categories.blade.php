@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        @include('partial.alert')
        <div class="box-header with-border">
            <h3 class="box-title">Categories</h3>
            <div class="box-tools fa-pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a class="btn btn-primary" href="{{route("categories.create")}}">add Category</a>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>books number</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                </thead>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->books}}</td>
                            <td><a class="btn btn-success" href="{{route('categories.edit' , $category->id)}}">edit</a> </td>
                            <td>
                                <form action="{{route('categories.destroy' , $category->id)}}" method="post">
                                    <input type="hidden" name="_method" value="delete" />
                                    {{csrf_field()}}
                                    <button class="btn btn-danger">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

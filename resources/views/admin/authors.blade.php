@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        @include('partial.alert')
        <div class="box-header with-border">
            <h3 class="box-title">Authors</h3>
            <div class="box-tools fa-pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a class="btn btn-primary" href="{{route("authors.create")}}">add Author</a>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <td>#</td>
                    <td>name</td>
                    <td>image</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                </thead>
                @if(count($authors) > 0)
                    @foreach($authors as $author)
                        <tr>
                            <td>{{$author->id}}</td>
                            <td>{{$author->name}}</td>
                            <td><img src="{{url('/')}}/storage/{{$author->image}}" width="70" height="100"></td>
                            <td><a class="btn btn-success" href="{{route('authors.edit' , $author->id)}}">edit</a> </td>
                            <td>
                                <form action="{{route('authors.destroy' , $author->id)}}" method="post">
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

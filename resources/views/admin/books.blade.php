@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        @include('partial.alert')
        <div class="box-header with-border">
            <h3 class="box-title">Books</h3>
            <div class="box-tools fa-pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a class="btn btn-primary" href="{{route("books.create")}}">add Book</a>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <td>title</td>
                    <td>subtitle</td>
                    <td>paralel title</td>
                    <td>author</td>
                    <td>publisher</td>
                    <td>copyrights</td>
                    <td>info</td>
                    <td>image</td>
                    <td>aviablie copies</td>
                    <td>category</td>
                    <td>standart number</td>
                    <td>language</td>
                    <td>source</td>
                    <td>place</td>
                    <td>date</td>
                    <td>format</td>
                    <td>identifier</td>
                    <td>coverage</td>
                    <td>contributor</td>
                    <td>relation</td>
                    <td>call number</td>
                    <td>Loan Duration</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                </thead>
                @if(count($books) > 0)
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->title}}</td>
                            <td>{{$book->subtitle}}</td>
                            <td>{{$book->paralel}}</td>
                            <td>{{$book->author->name}}</td>
                            <td>{{$book->propertty->publisher}}</td>
                            <td>{{$book->propertty->copyrights}}</td>
                            <td>{{substr($book->info, 0, 30)}} ...</td>
                            <td>@if ($book->image != null)
                                <img src="{{url('/')}}/storage/{{$book->image}}" width="70" height="100">
                            @endif</td>
                            <td>{{$book->copies}}</td>
                            <td>{{$book->category}}</td>
                            <td>{{$book->isbn}}</td>
                            <td>{{$book->language}}</td>
                            <td>{{$book->source}}</td>
                            <td>{{$book->place}}</td>
                            <td>{{$book->date}}</td>
                            <td>{{$book->type}}</td>
                            <td>{{$book->identifier}}</td>
                            <td>{{$book->coverage}}</td>
                            <td>{{$book->contributor}}</td>
                            <td>{{$book->relation}}</td>
                            <td>{{$book->number}}</td>
                            <td>{{$book->time}}</td>
                            <td><a class="btn btn-success" href="{{route('books.edit' , $book->id)}}">edit</a> </td>
                            <td>
                                <form action="{{route('books.destroy' , $book->id)}}" method="post">
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

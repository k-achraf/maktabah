@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        @include('partial.alert')
        <div class="box-header with-border">
            <h3 class="box-title">Saved Books</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <td>Book title</td>
                    <td>Book info</td>
                    <td>Book image</td>
                    <td>Loan Duration</td>
                </tr>
                </thead>
                @if(count($books) > 0)
                    @foreach($books as $book)
                        <tr>
                            <td><a href="{{url('/book/'.$book->id)}}">{{$book->title}}</a></td>
                            <td>{{$book->info}}</td>
                            <td><img src="{{url('/')}}/storage/{{$book->image}}" width="60" height="90"></td>
                            <td>{{$book->time}} Days</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

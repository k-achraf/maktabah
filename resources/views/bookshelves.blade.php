@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        @include('partial.alert')
        <div class="box-header with-border">
            <h3 class="box-title">Accepted Requests</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Status</td>
                    <td>Book id</td>
                    <td>Book title</td>
                    <td>Book image</td>
                    <td>Loan Duration</td>
                    <td>Last Update Day</td>
                    <td>Last Update time</td>
                </tr>
                </thead>
                @if(count($requests) > 0)
                    @foreach($requests as $r)
                        <tr>
                            <td>{{$r->id}}</td>
                            <td>{{$r->status}}</td>
                            <td>{{$r->book->id}}</td>
                            <td>{{$r->book->title}}</td>
                            <td><img src="{{url('/')}}/storage/{{$r->book->image}}" width="60" height="90"></td>
                            <td>{{$r->user->type->time}}</td>
                            <td>{{explode(' ', $r->updated_at)[0]}}</td>
                            <td>{{explode(' ', $r->updated_at)[1]}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

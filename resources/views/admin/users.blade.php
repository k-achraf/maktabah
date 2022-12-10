@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Users</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone number</td>
                    <td>Matricule</td>
                    <td>Date Of Birth</td>
                    <td>Account Type</td>
                    <td>Role</td>
                    <td>Accept</td>
                    <td>Change Role</td>
                    <td>Delete</td>
                </tr>
                </thead>
                @if(count($users) > 0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->number}}</td>
                            <td>{{$user->matricule}}</td>
                            <td>{{$user->date}}</td>
                            <td>{{$user->type->name}}</td>
                            <td>{{$user->role->name}}</td>
                            @if ($user->status == 0)
                                <td><a class="btn btn-secondary" href="{{url('/admin/users/accept/'.$user->id)}}">Accept</a> </td>
                            @endif
                            @if (strtolower($user->role->name) != 'admin')
                                <td><a class="btn btn-info" href="{{url('/admin/users/'.$user->id)}}">Change role</a></td>
                                <td>
                                    <form action="{{route('users.destroy' , $user->id)}}" method="post">
                                        <input type="hidden" name="_method" value="delete" />
                                        {{csrf_field()}}
                                        <button class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

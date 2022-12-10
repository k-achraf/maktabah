@extends('adminlte::page')

@section('title', 'Add Category')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">edit profile</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('partial.alert')
            <div class="mt-2">
                <form action="{{route("profile.update" , $user->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="number">phone number</label>
                        <input type="text" class="form-control" id="number" name="number" value="{{$user->number}}">
                    </div>
                    <div class="form-group">
                        <label for="matricule">matricule</label>
                        <input type="text" class="form-control" id="matricule" name="matricule" value="{{$user->matricule}}">
                    </div>
                    <div class="form-group">
                        <label for="date">birth date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{$user->date}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <hr>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">change password</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="mt-2">
                <form action="{{route("profile.update" , $user->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="p" value="1">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="password">new password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm">confirm password</label>
                        <input type="password" class="form-control" id="confirm" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

@extends('adminlte::page')

@section('title', 'Add Category')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{$user->name}} | Change Role</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('partial.alert')
            <div class="mt-2">
                <form action="{{url('/admin/users/'.$user->id.'/role')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group col-md-4">
                        <label for="role">Role:</label>
                        <select id="role" class="form-control" name="role">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($user->role->id == $role->id) selected @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
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

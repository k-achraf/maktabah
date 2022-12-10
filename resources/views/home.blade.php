@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    @include('partial.alert')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">My Books</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-red"><i class="fas fa-fw fa-pause-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Requested Books</span>
                            <span class="info-box-number">{{count(auth()->user()->requests)}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-blue"><i class="fas fa-fw fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Accepted Requests</span>
                            <span class="info-box-number">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach(auth()->user()->requests as $r)
                                    @if ($r->status == 'Accepted')
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @endforeach
                                {{$i}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-green"><i class="fas fa-fw fa-times"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Rejected Requests</span>
                            <span class="info-box-number">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach(auth()->user()->requests as $r)
                                    @if ($r->status == 'Rejected')
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @endforeach
                                {{$i}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <br>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">My Account</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-navy"><i class="fas fa-fw fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Account Type</span>
                            <span class="info-box-number">{{auth()->user()->type->name}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-fuchsia"><i class="fas fa-fw fa-clock"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Loan Duration</span>
                            <span class="info-box-number">
                                {{auth()->user()->type->time}} Days
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-cyan"><i class="fas fa-fw fa-user-tag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">My Role</span>
                            <span class="info-box-number">
                                {{auth()->user()->role->name}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <div class="col-md-3">
        @auth()
            <div style="margin: 20px">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('/search/browse')}}">Browse</a>
                        <a class="dropdown-item" href="{{url('/search/advanced')}}">Advanced Search</a>
                        <a class="dropdown-item" href="{{url('/search/keyword')}}">Keyword search</a>
                    </div>
                </div>
            </div>
        @endauth
        @yield('content')
        @yield('search')
        @yield('result')
        @yield('book')
        @yield('contact')
        @yield('about')
    </div>
    <div class="col-md-12">
        @if (count($categories) > 0)
            @foreach($categories as $category)
                <a href="{{url('/category/'.$category->id)}}" class="badge badge-success" style="padding: 15px;">{{$category->name}}</a>
            @endforeach
        @endif
    </div>
    <br>
    <br>
@stop

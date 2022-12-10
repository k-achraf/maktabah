<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <script size="{{asset('js/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #f6f6f6;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
            height: 50px;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
        <div class="top-left links">
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <a href="{{url('/')}}/category/{{$category->id}}">{{$category->name}}</a>
                @endforeach
            @endif
        </div>
    @endif
</div>
<div class="container">
    <div style="margin: 20px">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Search
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{url('/search/browse')}}">Browse</a>
                <a class="dropdown-item" href="{{url('/search/advanced')}}">Advanced Search</a>
                <a class="dropdown-item" href="{{url('/search/keyword')}}">Keyword search</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 text-center">
            <h2>
                {{$cat->name}}
            </h2>
        </div>
    </div>
    <hr>
</div>
@if (count($books) > 0)
    <section id="blog">
        <div class="container">
            <div class="row">
                @foreach($books as $book)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{url('/')}}/storage/{{$book->image}}" alt="" width="100%">
                            <div class="card-block">
                                <div class="text-center">
                                    <h4 class="card-title">{{$book->title}}</h4>
                                </div>
                                <p class="card-text"><b>Author: </b>{{$book->author->name}}</p>
                                <p class="card-text"><b>Language: </b>{{$book->language}}</p>
                                <p class="card-text"><b>Request number: </b>{{$book->id}}</p>
                                <p class="card-text">{{substr($book->info, 0, 80)}} ...</p>
                                <div class="text-center">
                                    <a class="btn btn-default" href="{{url('/')}}/book/{{$book->id}}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div> <!-- row -->

        </div>
    </section>
@endif

@include('layouts.footer')
</body>
</html>

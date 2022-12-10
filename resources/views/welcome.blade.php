<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

        <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/fontawesome.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

        <script src="{{asset('js/main.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootsrap4.css')}}" >
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
                            <a href="{{ route('register') }}">Create account</a>
                        @endif
                    @endauth
                </div>
{{--                <div class="top-left links">--}}
{{--                    @if(count($categories) > 0)--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <a href="{{url('/')}}/category/{{$category->id}}">{{$category->name}}</a>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}
            @endif
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{asset('img/logo.png')}}" class="img-fluid" style="margin-top: -50px;">
                </div>
            </div>
        </div>
        <div class="container">
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
            <hr>
            <div class="text-center">
                @if (count($categories) > 0)
                    @foreach($categories as $category)
                        <a href="{{url('/category/'.$category->id)}}" class="badge badge-success" style="padding: 40px 45px; font-size: 22px; margin: 5px">{{$category->name}}</a>
                    @endforeach
                @endif
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
        @else
            <div class="content">
                <h3>No Book Available Now</h3>
            </div>
        @endif

        @include('layouts.footer')
    </body>
</html>

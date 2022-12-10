@extends('layouts.app')

@section('result')
    <section id="blog">
        <div class="container">

            @if (count($books) > 0)
                <section id="blog">
                    <div class="container">

                        <div class="row">

                            @foreach($books as $book)
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="{{url('/')}}/storage/{{$book->image}}" alt="" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title">{{$book->title}}</h4>
                                            <p class="card-text">{{substr($book->info, 0, 80)}} ...</p>
                                            <a class="btn btn-default" href="{{url('/')}}/book/{{$book->id}}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div> <!-- row -->

                    </div>
                </section>

            @else
                <div class="text-center">
                    <h4 class="card-title">No Results</h4>
                </div>
            @endif

        </div>
    </section>
@endsection

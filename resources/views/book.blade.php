@extends('layouts.app')

@section('book')
    @if(!empty($book))
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">{{$book->title}}</h4>
                        <h5 class="card-title font-weight-bold">{{$book->subtitle}}</h5>
                        <h6 class="card-title font-weight-bold">{{$book->paralel}}</h6>
                        <hr>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>Created By:</b> {{$book->author->name}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>ORCID:</b> {{$book->propertty->orcid}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>Published By:</b> {{$book->propertty->publisher}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>Language:</b> {{$book->language}}</p>
                    </span>
                        <hr>
                        <p><b>right to:</b> {{$book->propertty->copyrights}}</p>
                        <p class="card-text">{{$book->info}}</p>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>Category:</b> {{$book->category->name}}</p>
                    </span>
                        <hr class="my-4">
                        <p class="lead">
                            @if($book->copies > 0)
                                <span class="badge badge-pill badge-success">Aviable</span>
                            @else
                                <span class="badge badge-pill badge-danger">Not Aviable</span>
                            @endif
                        </p>
                        <span class="badge badge-pill badge-success">{{$book->copies}} copies</span>
                        <br>
                        <span class="badge badge-pill badge-success">Loan Duration: {{$book->time}} Days</span>
                        <hr>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>Source:</b> {{$book->source}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>Publication place:</b> {{$book->place}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>publication date:</b> {{$book->date}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>format:</b> {{$book->type}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>rlation:</b> {{$book->relation}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>coverage:</b> {{$book->coverage}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>contributor:</b> {{$book->contributor}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>call number:</b> {{$book->number}}</p>
                    </span>
                        <br>
                        <span class="badge badge-success">
                        <p class="mb-3"><b>type:</b> {{$book->format}}</p>
                    </span>
                        <hr>
                        <div>
                            <h6>Qr Code:</h6>

                            @if($book->file != null)
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{url('/storage/'.$book->file)}}">
                            @else
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{url('/book/'.$book->id)}}">
                            @endif
                        </div>
                        <br>
                        @auth
                            @if (auth()->user()->status == 1)
                                @if ($book->file != null)
                                    <a href="{{url('/storage/'.$book->file)}}" class="btn btn-success btn-block">Download</a>
                                @endif

                                <a href="{{url('/book/'.$book->id.'/save')}}" class="btn btn-success btn-block">Save</a>
                                <br>
                                <form action="{{url('/')}}/book/{{$book->id}}/request" method="post">
                                    {{csrf_field()}}
                                    <button class="btn btn-success btn-block" @if($book->copies <= 0) disabled @endif>Request</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="col-md-3">
                    <img class="card-img-top img-fluid" src="{{url('/')}}/storage/{{$book->image}}">
                </div>
            </div>
        </div>
    @endif
@endsection

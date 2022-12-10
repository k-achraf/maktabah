@extends('layouts.app')

@section('search')

    <div class="container">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Search for object</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('partial.alert')
                <div class="mt-2">
                    <form action="/search/make/advanced" method="get">
                        <div class="form-group">
                            <label for="keyword">Search</label>
                            <input type="text" class="form-control" id="keyword" name="keyword">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="within">Keyword Within:</label>
                            <select id="within" class="form-control" name="within">
                                <option selected value="null">Choose...</option>
                                <option value="all">All Of These</option>
                                <option value="any">Any Of These</option>
                                <option value="phrase">As a Phrase</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="on">Keyword Anywhere:</label>
                            <select multiple class="form-control" id="on" name="on">
                                <option>Title</option>
                                <option>Subject</option>
                                <option>Description</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="booltype" id="and" value="and">
                                <label class="form-check-label" for="and">
                                    And
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="booltype" id="or" value="or">
                                <label class="form-check-label" for="or">
                                    Or
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="booltype" id="not" value="not">
                                <label class="form-check-label" for="not">
                                    Not
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Year:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="yeartype" id="year" value="year">
                                <label class="form-check-label" for="year">
                                    Year
                                </label>
                            </div>
                            <div class="f-year" style="display: none">
                                <div class="form-group col-md-4">
                                    <select id="pyear" class="form-control" name="pyear">
                                        <option selected value="null">Year</option>
                                        @for($i = 2020; $i >= 1700; $i--)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="yeartype" id="fromto" value="fromto">
                                <label class="form-check-label" for="fromto">
                                    From-To
                                </label>
                            </div>

                            <div class="f-t-year" style="display: none">
                                <div class="form-group col-md-4">
                                    <select id="from" class="form-control" name="from">
                                        <option selected value="null">From</option>
                                        @for($i = 2020; $i >= 1700; $i--)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <select id="to" class="form-control" name="to">
                                        <option selected value="null">To</option>
                                        @for($i = 2020; $i >= 1700; $i--)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-4">
                            <label for="location">Location in Library</label>
                            <select id="location" class="form-control" name="location">
                                <option selected value="null">Choose...</option>
                                <option value="title">Test</option>
                                <option value="subject">Test</option>
                                <option value="subject">Test</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="type">Type of material</label>
                            <select id="type" class="form-control" name="type">
                                <option selected value="null">Choose...</option>
                                <option value="book">Book</option>
                                <option value="pdf">Pdf</option>
                                <option value="cd/dvd">Cd/Dvd</option>
                                <option value="audio">Audio</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="place">Place of publication</label>
                            <input type="text" class="form-control" id="place" name="place">
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" id="language" name="language">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection

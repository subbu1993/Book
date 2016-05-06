@extends('layouts.master')
@section('content')
  <br/>
  <style>
      p span {
       position: absolute;
       top: 200px;
       left: 0;
       width: 100%;
      }
  </style>
  @if (Auth::guest())


  @else
  <div class="container">
    @if($top_read_books->count() > 0)
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-info">
            <div class="panel-heading"><strong>Most Read</strong></div>
            <div id="crCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">
                  @foreach($top_read_books as $index=>$book)
                    @if($index % 4 == 0 and $index > 0)
                      </div>
                      <div class="item">
                    @endif
                    @if(file_exists(public_path("uploads/cover_pics/$book->id.jpg")))
                      <div class="col-xs-3 image">
                        <a href="/books/show/{{$book->id}}" class="thumbnail"><img src="/uploads/cover_pics/{{$book->id}}.jpg" /></a>
                        <p><center><span>{{ $book->name}}</span></center></p>
                      </div>
                    @else
                      <div class="col-xs-3 image"><a href="/books/show/{{$book->id}}" class="thumbnail"><img src="/uploads/cover_pics/default.jpg" /></a><p><center><span>{{ $book->name}}</span></center></p></div>
                    @endif
                  @endforeach
                </div>
              </div>
              <a class="left carousel-control" href="#crCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#crCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <br/>
          <br/>
          <br/>
          <br/>
        </div>
      </div>
    @endif
    @if($new_arrivals->count() > 0)
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-info">
            <div class="panel-heading"><strong>New Arrivals</strong></div>
            <div id="naCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">
                  @foreach($new_arrivals as $index=>$book)
                    @if($index % 4 == 0 and $index > 0)
                      </div>
                      <div class="item">
                    @endif
                    @if(file_exists(public_path("uploads/cover_pics/$book->id.jpg")))
                      <div class="col-xs-3 image"><a href="/books/show/{{$book->id}}" class="thumbnail"><img src="/uploads/cover_pics/{{$book->id}}.jpg" /></a><p><center><span>{{ $book->name}}</span></center></p></div>
                    @else
                      <div class="col-xs-3 image"><a href="/books/show/{{$book->id}}" class="thumbnail"><img src="/uploads/cover_pics/default.jpg" /></a><p><center><span>{{ $book->name}}</span></center></p></div>
                    @endif
                  @endforeach
                </div>
              </div>
              <a class="left carousel-control" href="#naCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#naCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <br/>
          <br/>
          <br/>
          <br/>
        </div>
      </div>
    @endif
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">
          <div class="panel-heading"><strong>All Books</strong></div>
          <div id="bookCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                @foreach($all_books as $index=>$book)
                  @if($index % 4 == 0 and $index > 0)
                    </div>
                    <div class="item">
                  @endif
                  @if(file_exists(public_path("uploads/cover_pics/$book->id.jpg")))
                    <div class="col-xs-3"><a href="/books/show/{{$book->id}}" class="thumbnail"><img src="/uploads/cover_pics/{{$book->id}}.jpg" /></a><p><center><span>{{ $book->name}}</span></center></p></div>
                  @else
                    <div class="col-xs-3"><a href="/books/show/{{$book->id}}" class="thumbnail"><img src="/uploads/cover_pics/default.jpg" /></a><p><center><span>{{ $book->name}}</span></center></p></div>
                  @endif
                @endforeach
              </div>
            </div>
            <a class="left carousel-control" href="#bookCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bookCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
      </div>
    </div>
  </div>
@endif
@endsection

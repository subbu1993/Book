@extends('layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
<script>
  function showBook()
  {
    document.getElementById("bookBox").style.display = "block";
  }
  $(function() {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", '/authors/all', false ); // false for synchronous request
    xmlHttp.send( null );
    var authors =  xmlHttp.responseText.split(",");
    $( "#authorComplete" ).autocomplete({
      source: authors,
      appendTo: '.authorResults'
    })
  });
  $(function() {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", '/books/all', false ); // false for synchronous request
    xmlHttp.send( null );
    var books =  xmlHttp.responseText.split(",");
    $( "#bookComplete" ).autocomplete({
      source: books,
      appendTo: '.bookResults'
    })
  });
</script>
<style>
  .btn-file {
      position: relative;
      overflow: hidden;
  }
  .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
  }
  .authorresults, .bookResults
  {
    cursor: pointer;
  }
</style>
<div class="container">
  <div class ="row">
    <div class="col-md-10 col-md-offset-1">
          <a class="btn btn-success btn-large pull-right" onclick="showBook();"><strong><span class="glyphicon-plus"/></strong> New Book</a>
          <br/>
          <br/>
          <br/>
          <div id="bookBox" class="panel panel-success" style="display:none;">
            <div class="panel-heading"><strong>Add a book</strong></div>
            <div class="panel-body">
              <form method="post" action="/addBook" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <label>Name:</label>
                  <input type="text" id="bookComplete" class="form-control" name="book_name"/>
                  <div class="bookResults"></div>
                </div>
                <div class="form-group">
                  <label>Author:</label>
                  <input type="text" id="authorComplete" class="form-control" name="author_name"/>
                  <div class="authorResults"></div>
                </div>
                <div class="form-group">
                  <label>Cover Picture:</label>
                  <span class="btn btn-default btn-file">Browse<input name="cover_pic" type="file"></span>
                </div>
                <div class="form-group">
                  <label>E Book(PDF):</label>
                  <span class="btn btn-default btn-file">Browse<input name="ebook" type="file"></span>
                </div>
                <div class="form-group">
                  <select name="genre" class="form-control">
                    <option value="Comedy"><li><a href="#">Comedy</a></li></option>
                    <option value="Drama"><li><a href="#">Drama</a></li></option>
                    <option value="Non-fiction"><li><a href="#">Non-fiction</a></li></option>
                    <option value="Fiction"><li><a href="#">Fiction</a></li></option>
                    <option value="Realistic fiction"><li><a href="#">Realistic fiction</a></li></option>
                    <option value="Romance novel"><li><a href="#">Romance novel</a></li></option>
                    <option value="Satire"><li><a href="#">Satire</a></li></option>
                    <option value="Tragedy"><li><a href="#">Tragedy</a></li></option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Description: </label>
                  <textarea class="form-control" rows="5" name="description"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary"/>
                </div>
            </div>
          </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-info">
        <div class="panel-heading"><strong>My Library</strong></div>
        <div class="panel-body">
          @foreach($books as $book)
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-4"><strong>{{ $book->name }}</strong></div>
              </div>
              <div class="row">
                @if(file_exists(public_path("uploads/cover_pics/$book->id.jpg")))
                  <div class="col-sm-4"><img src="/uploads/cover_pics/{{$book->id}}.jpg" height="150" width="200"/></div>
                @else
                  <div class="col-xs-3 image"><a href="/books/show/{{$book->id}}" class="thumbnail"><img src="/uploads/cover_pics/default.jpg" /></a><p><center><span>{{ $book->name}}</span></center></p></div>
                @endif
                <div class="col-sm-8">{{ $book->author()->get()->first()->name }}<hr/></div>
                <div class="col-sm-8">{{ $book->description }}</div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

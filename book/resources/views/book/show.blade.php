@extends('layouts.master')

@section('content')
<div class="containter">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading"> <strong> {{ $book->name }} | {{ $book->author()->get()->first()->name}} </strong></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4"><img src="/uploads/cover_pics/{{$book->id}}.jpg" height="250" width="250"/></div>
            <div class="col-md-8"><p> {{ $book->description }}</p> </div>
          </div>
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-3"></div>
            <div class="col-md-1"><a class="btn btn-success btn-large" href="/books/read/{{$book->id}}">Read</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

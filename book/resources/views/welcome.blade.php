@extends('layouts.master')
@section('content')
  <br/>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
          <div class="panel-heading">Continue Reading</div>
          <div id="bookCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
              </div>
              <div class="item">
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
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
        <div class="panel panel-primary">
          <div class="panel-heading">New Arrivals</div>
          <div id="bookCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
              </div>
              <div class="item">
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
                <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
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
      </div>
    </div>
  </div>
@endsection

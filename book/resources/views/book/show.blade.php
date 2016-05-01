@extends('layouts.master')

@section('content')
<script>
  function showReview()
  {
    document.getElementById("review").style.display = "block";
  }
</script>
<div class="containter">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading"> <strong> {{ $book->name }} | {{ $book->author()->get()->first()->name}} </strong> <a class="btn btn-success btn-sm pull-right" href="/books/done/{{$book->id}}">Add to your Done list</a></div>
        <div class="panel-body">
          <div class="row">
            @if(file_exists(public_path("uploads/cover_pics/$book->id.jpg")))
              <div class="col-md-4"><img src="/uploads/cover_pics/{{$book->id}}.jpg" height="250" width="250"/></div>
            @else
              <div class="col-md-4"><img src="/uploads/cover_pics/default.jpg" height="250" width="250"/></div>
            @endif
            <div class="col-md-8"><p> {{ $book->description }}</p> </div>
          </div>
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-1"></div>
            <div class="col-md-1"><a class="btn btn-danger btn-large" onclick="showReview();">Write Review</a> </div>
            <div class="col-md-1"></div>
            <div class="col-md-1"><a class="btn btn-success btn-large" href="/books/read/{{$book->id}}">Read</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="review" class="row" style="display:none;">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-success">
        <div class="panel-heading"> <strong> Write a review for {{ $book->name }} </strong></div>
        <div class="panel-body">
          <div class="row">
            <form method="post" action="/review/">
              <div class="form-group col-md-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="book_id" value="{{ $book->id }}"/>
                <label>Review Text: </label>
                <textarea class="form-control input-sm" name="review_text"></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>Review Rating: </label>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5">
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </div>
              <div class="form-group col-md-12">
                <input type="submit" class="btn btn-success pull-right"></input>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if($reviews->count() > 0)
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-danger">
          <div class="panel-heading"> <strong> See reviews from readers of {{ $book->name }} </strong></div>
          @foreach($reviews as $review)
          <div class="row">
            <br/>
            <div class="col-md-10 col-md-offset-1 ">
              <div class="panel panel-default">
                <div class="panel-heading"> <strong> {{  $review->user->name }} </strong> <p class="pull-right"> {{ $review->created_at }} </p></div>
                <div class="panel-body">
                  <p> {{ $review->review_description  }} </p>
                  <br/>
                  <strong> Score: {{ $review->review_rating}}/5 </strong>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  @endif
</div>
@endsection

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
          .hoverImage {
            -webkit-transition: all 1s ease; /* Safari and Chrome */
            -moz-transition: all 1s ease; /* Firefox */
            -o-transition: all 1s ease; /* IE 9 */
            -ms-transition: all 1s ease; /* Opera */
            transition: all 1s ease;
          }

        .hoverText {
          visibility: hidden;
          }


        .hoverImage:hover .hoverText {
          visibility: visible;
          }

        .hoverImage:hover{
          -webkit-transform:scale(1.25); /* Safari and Chrome */
          -moz-transform:scale(1.25); /* Firefox */
          -ms-transform:scale(1.25); /* IE 9 */
          -o-transform:scale(1.25); /* Opera */
           transform:scale(1.25);
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5 Hey there</div>
            </div>
        </div>

        <br/>
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
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
                      <div class="col-xs-3 hoverImage"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a><p class="hoverText"> This is a book</div>
                      <div class="col-xs-3 hoverImage"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" /></a></div>
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
    </body>
</html>

<html>
    <head>
        <title>Book</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery library -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
          $(function() {
             var xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", '/books/all', false ); // false for synchronous request
            xmlHttp.send( null );
            var books =  xmlHttp.responseText.split(",");
            
            $( "#search" ).autocomplete({
              source: books
            });
          });
            $("#searchButton").click(function(){

            });
        </script>

        <style>
        body {
          background:   #595959 !important;
        }
        </style>

    </head>
    <body bgcolor="black">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="/">BookIT</a>
          </div>
          @if (Auth::guest())

          @else
            <ul class="nav navbar-nav">
              <li class="dropdown active  ">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/genre/list/Comedy">Comedy</a></li>
                  <li><a href="/genre/list/Drama">Drama</a></li>
                  <li><a href="/genre/list/Fiction">Fiction</a></li>
                  <li><a href="/genre/list/Non-Fiction">Non-fiction</a></li>
                  <li><a href="/genre/list/Realistic fiction">Realistic fiction</a></li>
                  <li><a href="/genre/list/Romance novel">Romance novel</a></li>
                  <li><a href="/genre/list/Satire">Satire</a></li>
                  <li><a href="/genre/list/Tragedy">Tragedy</a></li>
                </ul>
              </li>
            </ul>
          @endif
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">

              <!-- Authentication Links -->
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
              @else
                  <li class="ui-widget">
                  <form action="/books/get" method="post">
                  <label for="search">Search: </label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input id="search" type="text" name="book_name"/>
                  <input type="submit" id="searchButton" value="Go"/>
                  </form>

                </li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>


                      <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ url('/library') }}"><i class="fa fa-btn fa-sign-out"></i>My Library</a></li>
                          <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                      </ul>
                  </li>
              @endif
          </ul>
        </div>
      </nav>
      @yield('content')

        <nav class="navbar navbar-default navbar-fixed-bottom">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li><a href="/about">About</a></li>
              <li><a href="/team">Team</a></li>
              <li><a href="/contact">Contact Us</a></li>
              <li><a href="/contribute">Contribute</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="	glyphicon glyphicon-copyright-mark"></span> Created by the BookIT Team</a></li>
            </ul>
          </div>
        </nav>
    </body>
</html>

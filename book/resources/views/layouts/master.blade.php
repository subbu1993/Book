<html>
    <head>
        <title>Book</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Latest compiled JavaScript -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
                  <li><a href="#">Comedy</a></li>
                  <li><a href="#">Fiction</a></li>
                  <li><a href="#">Action</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Authors
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Dan Brown</a></li>
                  <li><a href="#">Jeffery Archer</a></li>
                  <li><a href="#">J K Rowling</a></li>
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
              <li><a href="/follow">About</a></li>
              <li><a href="/">Team</a></li>
              <li><a href="/">Contact Us</a></li>
              <li><a href="/">Contribute</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="	glyphicon glyphicon-copyright-mark"></span> Created by the BookIT Team</a></li>
            </ul>
          </div>
        </nav>
    </body>
</html>

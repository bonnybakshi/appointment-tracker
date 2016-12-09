<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>
    @yield('title','Appointment Tracker - Rajrupa Bakshi')
  </title>

  <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href='/css/style.css' type='text/css' rel='stylesheet'>
    
    <script type="text/javascript" src="/js/myjs.js"></script> 
    @yield('head')
</head>

<body>
<header>
<!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Togle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" id="logo" href="/">Appointment Tracker</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @if (Auth::guest())
                <li><a href="/welcome">Home </a></li> 
                @else <li><a href="/home">Home </a></li> 
                @endif
                <li><a href="/appointments">Appoinments </a></li> 
                @if(Auth::user()->admin)
                <li><a href="/clients">Clients </a></li> 
                @endif 
            </ul>
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
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
          </div><!--/nav-collapse -->
        </div>
    </div>
</header>
 
  <section class="content">
    {{-- Main page content will be yielded here --}}
        @yield('content')
  </section>

  <footer>
    <div class="container">
    &copy; {{ date('Y') }} Rajrupa Bakshi &nbsp;&nbsp;
        <a href='https://github.com/rajrupabakshi/p4' target='_blank'><i class='p3_github'></i> View on Github</a> &nbsp;&nbsp;
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  @yield('body')
</body>
</html>
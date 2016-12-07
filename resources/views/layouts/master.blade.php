<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>
    @yield('title','P4 - Rajrupa Bakshi')
  </title>

  <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
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
            <a class="navbar-brand" id="logo" href="/">Magnolia Skin Care</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="\"> Home </a></li> 
                <li><a href="/appointments">Appoinments </a></li> 
                <li><a href="/clients">Clients </a></li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Login</a></li>               
                <li><a href="/">Logout</a></li>
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
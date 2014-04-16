<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    {{ HTML::style("assets/bootstrap/css/bootstrap.css") }}

    <!-- Loading Flat UI -->
    {{ HTML::style("assets/css/flat-ui.css") }}

    <link rel="shortcut icon" href="assets/images/favicon.ico">    

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    @yield('styles')
  </head>
  <body style="background-color: #1abc9c;">
    <div class="container">
        @yield('container')        
    </div>
    <!-- /.container -->


    <!-- Load JS here for greater good =============================-->
    {{ HTML::script("assets/js/jquery-2.0.3.min.js") }}    
    {{ HTML::script("assets/js/jquery-ui-1.10.3.custom.min.js") }}
    {{ HTML::script("assets/js/jquery.ui.touch-punch.min.js") }}
    {{ HTML::script("assets/js/bootstrap.min.js") }}
    {{ HTML::script("assets/js/bootstrap-select.js") }}
    {{ HTML::script("assets/js/bootstrap-switch.js") }}
    {{ HTML::script("assets/js/flatui-checkbox.js") }}
    {{ HTML::script("assets/js/flatui-radio.js") }}
    {{ HTML::script("assets/js/jquery.tagsinput.js") }}
    {{ HTML::script("assets/js/jquery.placeholder.js") }}
    {{ HTML::script("assets/js/actions.js") }}
    <script>@yield('script')</script>
  </body>
</html>
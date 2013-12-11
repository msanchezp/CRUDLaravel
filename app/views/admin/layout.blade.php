<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','Bootstrap 101 Template')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    <!--<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrap">
      {{--empieza el contenido de la pagina--}}
      <div class="container">
        @yield('content')
      </div>
      {{--termina el contenido de la pagina--}}
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{--<script src="{{ assets('assets/js/bootstrap.min.js') }}"></script>--}}
    {{ HTML::script('assets/js/admin.js') }}
  </body>
</html>
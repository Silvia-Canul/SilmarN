<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <title>@yield('titulo')</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/vue.js"></script>
    <script type="css/bootstrap.css"></script>
    <script src="js/vue-resource.js"></script>

  </head>
  <body>
    @yield('contenido')



    @stack('scripts')
    <!-- <script src="js/jquery.min.js"></script> -->
  <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 


  </body>
</html>
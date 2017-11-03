<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ url('public')}}/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link href="{{ url('public')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
    <style>
         @yield('style')
    </style>
</head>
<body id="app-layout">
    @yield('header')

    @yield('content')

    @yield('footer')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ url('public')}}/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ url('public')}}/js/bootstrap.min.js"></script>
    @yield('js')
    <script type="text/javascript">
        @yield('script')
    </script>
</body>
</html>

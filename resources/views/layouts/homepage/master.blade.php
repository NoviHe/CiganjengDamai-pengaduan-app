<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | Ciganjeng-Damai</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link href="{{url('homepage/css/fa.all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{url('homepage/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{url('homepage/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Stepper CSS -->
    <link href="{{url('homepage/css/addons-pro/steppers.css')}}" rel="stylesheet">
    <!-- Stepper CSS - minified-->
    <link href="{{url('homepage/css/addons-pro/steppers.min.css')}}" rel="stylesheet">


    @stack('css')

</head>

<body>
    @yield('content')

    <!--  SCRIPTS  -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{url('homepage/js/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{url('homepage/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{url('homepage/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{url('homepage/js/mdb.min.js')}}"></script>
    <script src="{{url('js/active.homepage.js')}}"></script>
    <!-- Stepper JavaScript -->
    <script type="text/javascript" src="{{url('homepage/js/addons-pro/steppers.js')}}"></script>
    <!-- Stepper JavaScript - minified -->
    <script type="text/javascript" src="{{url('homepage/js/addons-pro/steppers.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('sweetalert2/package/dist/sweetalert2.all.min.js')}}"></script>

    @include('sweetalert::alert')
    <script>
        new WOW().init();

    </script>

    @stack('js')
</body>

</html>

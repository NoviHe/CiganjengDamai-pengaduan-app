<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | Masyarakat | Ciganjeng-Damai</title>
    <!-- Font Awesome -->
    <link href="{{url('user/css/fa.all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{url('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{url('user/css/mdb.min.css')}}" rel="stylesheet">

    @stack('css')
</head>

<body class="fixed-sn white-skin">
@include('layouts.user.header')
<main>
@yield('content')
</main>
@include('layouts.user.footer')
<!-- SCRIPTS -->
<script type="text/javascript" src="{{url('user/js/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{url('user/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{url('user/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{url('user/js/mdb.min.js')}}"></script>

<script type="text/javascript" src="{{asset('sweetalert2/package/dist/sweetalert2.all.min.js')}}"></script>

@include('sweetalert::alert')

@stack('js')

</body>

</html>

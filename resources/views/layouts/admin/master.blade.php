<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | Petugas | Ciganjeng-Damai</title>
    <!-- Font Awesome -->
    <link href="{{url('admin/css/fa.all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{url('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{url('admin/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Stepper CSS -->
    <link href="{{url('homepage/css/addons-pro/steppers.css')}}" rel="stylesheet">
    <!-- Stepper CSS - minified-->
    <link href="{{url('homepage/css/addons-pro/steppers.min.css')}}" rel="stylesheet">
        <!-- MDBootstrap Datatables  -->
    <link href="{{asset('admin/css/addons/datatables.min.css')}}" rel="stylesheet">

    @stack('css')
</head>

<body class="fixed-sn white-skin">
@include('layouts.admin.header')
<main>
@yield('content')
</main>
@include('layouts.admin.footer')
<!-- SCRIPTS -->
<script type="text/javascript" src="{{url('admin/js/jquery-3.4.1.min.js')}}"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{url('admin/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{url('admin/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{url('admin/js/mdb.min.js')}}"></script>
<!-- Stepper JavaScript -->
<script type="text/javascript" src="{{url('homepage/js/addons-pro/steppers.js')}}"></script>
<!-- Stepper JavaScript - minified -->
<script type="text/javascript" src="{{url('homepage/js/addons-pro/steppers.min.js')}}"></script>
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="{{asset('admin/js/addons/datatables.min.js')}}"></script>

<script type="text/javascript" src="{{asset('sweetalert2/package/dist/sweetalert2.all.min.js')}}"></script>


@include('sweetalert::alert')

@stack('js')

<script>
    $(document).ready(function(){
		$('#datatable').DataTable();
        $('.dataTables_length').addClass('bs-select');
	});
</script>

</body>

</html>

<!-- Main Navigation -->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
        <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
            <div class="text-center">
            {{-- <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a> --}}
            </div>
        </li>

        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">

                <li class="nav-item ">
                    <a class="nav-link" href="/#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('pengaduan.create')}}">Buat Laporan</a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{route('pengaduan.daftar')}}">Laporan Saya</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/#how-to">How to Use</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/#contact">Contac Us</a>
                </li>

            </ul>
        </li>
        <!-- Side navigation links -->

        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-dn mr-auto">
            <p>Ciganjeng-Damai.NET</p>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('pengaduan.create')}}">Buat Laporan</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('pengaduan.daftar')}}">Laporan Saya</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/#how-to">How to Use</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/#contact">Contac Us</a>
                </li>
            </ul>
        </div>

        <div class="d-flex change-mode">
            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{{Auth::guard('masyarakat')->user()->nama}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('masyarakat.setting',Auth::guard('masyarakat')->user()->id)}}">My account</a>
                        <a class="dropdown-item logout">Log Out</a>
                    </div>
                </li>

            </ul>
            <!-- Navbar links -->

        </div>

    </nav>
    <!-- Navbar -->


</header>
<!-- Main Navigation -->

@push('js')
    <script>
        $(".button-collapse").sideNav();
    </script>
    <script>
        $('.logout').click(function(){
            Swal.fire({
                title: 'Yakin?',
                text: "Logout Aplikasi!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!'
            }).then((result) => {
                if (result.value) { 
                window.location = "{{route('logouts')}}"
                }
            })
        });
    </script>
@endpush
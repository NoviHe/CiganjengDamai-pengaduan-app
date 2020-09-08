<!-- Main Navigation -->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed" >
        <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
            <div class="text-center">
            {{-- <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a> --}}
            </div>
        </li>
        <hr class="white">
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">

                <li>
                    <a class="collapsible-header waves-effect arrow-r" href="{{route('petugas')}}">
                    <i class="w-fa fas fa-tachometer-alt"></i>Dashboards
                    </a>
                </li>

                <li><a class="collapsible-header"> Administrator</a></li>

                <li>
                    <a class="collapsible-header waves-effect arrow-r">
                    <i class="w-fa fas fa-envelope"></i>Data Laporan
                    <i class="fas fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="{{route('pengaduan.index')}}" class="waves-effect">Laporan Pengaduan</a>
                            </li>
                            <li>
                                <a href="{{route('tanggapan.index')}}" class="waves-effect">Laporan Tanggapan</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="collapsible-header waves-effect arrow-r">
                    <i class="w-fa fas fa-users"></i>Data Pengguna
                    <i class="fas fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="{{route('masyarakat.index')}}" class="waves-effect">Masyarakat</a>
                            </li>
                            @if (Auth::user()->level=='admin')
                            <li>
                                <a href="{{route('petugas.index')}}" class="waves-effect">Petugas</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="collapsible-header waves-effect arrow-r">
                    <i class="w-fa fas fa-database"></i>Data Master
                    <i class="fas fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('jenis.index')}}" class="waves-effect">Jenis</a></li>
                        </ul>
                    </div>
                </li>

                <li><a class="collapsible-header"> About Us</a></li>

                <li>
                    <a class="collapsible-header waves-effect arrow-r" href="/#how-to">
                    <i class="w-fa fas fa-eye"></i>Tentang Aplikasi
                    </a>
                </li>

                <li>
                    <a class="collapsible-header waves-effect arrow-r" href="/#contact">
                    <i class="w-fa fas fa-envelope"></i>Contact
                    </a>
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

        <div class="d-flex change-mode">

            <div class="ml-auto mb-0 mr-3 change-mode-wrapper">
                <button class="btn btn-outline-black btn-sm" id="dark-mode">Change Mode</button>
            </div>

            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <li class="nav-item">
                    <a class="nav-link waves-effect" href="{{route('pengaduan.index')}}">
                    <span class="badge red">{{App\Pengaduan::where('status','proses')->get()->count()}}</span>  
                    <i class="fas fa-envelope"></i> 
                    <span class="clearfix d-none d-sm-inline-block">Message</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile: {{Auth::user()->nama_petugas}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('petugas.edit',Auth::id())}}">My account</a>
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
        
        $(function () {
            $('#dark-mode').on('click', function (e) {

                e.preventDefault();
                $('h4, button').not('.check').toggleClass('dark-grey-text text-white');
                $('.list-panel a').toggleClass('dark-grey-text');

                $('footer, .card').toggleClass('dark-card-admin');
                $('body, .navbar').toggleClass('white-skin navy-blue-skin');
                $(this).toggleClass('white text-dark btn-outline-black');
                $('body').toggleClass('dark-bg-admin');
                $('h6, .card, p, td, th, i, li a, h4, input, label').not(
                '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
                $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
                $('.gradient-card-header').toggleClass('white black lighten-4');
                $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

            });
        });
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
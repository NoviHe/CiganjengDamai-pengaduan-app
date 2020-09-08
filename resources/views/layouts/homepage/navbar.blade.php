<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar double-nav">
  <div class="container">
    <a class="navbar-brand" href="/"><strong>Ciganjeng-Damai.NET</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
      aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="/#home">Home <span class="sr-only">(current)</span></a>
        </li>
        @if (Auth::guard('masyarakat')->check())
        <li class="nav-item ">
          <a class="nav-link" href="{{route('pengaduan.create')}}">Buat Laporan</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('pengaduan.daftar')}}">Laporan Saya</a>
        </li>
        @endif
        <li class="nav-item ">
          <a class="nav-link" href="/#how-to">How to Use</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="/#contact">Contac Us</a>
        </li>
      </ul>

      <!-- Navbar links -->
      <div class="d-flex change-mode">
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          @if (Auth::guard('masyarakat')->check())
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
          @elseif(Auth::guard('petugas')->check())
            <li class="nav-item ">
              <a class="nav-link" href="{{route('petugas')}}">Dashboard</a>
            </li>
          @else
            <li class="nav-item ">
              <a class="nav-link" href="{{route('register')}}">Sign Up</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
          @endif

        </ul>
      </div>
    </div>
    
  </div>
</nav>

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
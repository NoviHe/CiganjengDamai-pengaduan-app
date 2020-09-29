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
          <a class="nav-link" href="/#how-to">Cara Bekerja</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="/#contact" data-toggle="modal" data-target="#manual">Manual</a>
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

<!-- Modal -->
<div class="modal fade" id="manual" tabindex="-1" aria-labelledby="manualLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manualLabel">Manual Aplikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <!-- Section: Horizontal stepper -->
    <section class="text-center my-5" data-wow-delay="0.3s">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-12">
          <ul class="stepper horizontal" id="horizontal-stepper">
            <li class="step active">
              <div class="step-title waves-effect waves-dark">Login / Register</div>
              <div class="step-new-content">
                <div class="row">
                  <div class="md-form col-12 ml-auto">
                    <div class="step-content lighten-3" style="width:100%;">
                      <p>Sebelum melapor di wajibkan untuk login atau daftar bila belum punya akun</p>
                      <img src="{{asset('img/manual_user/login_bro.png')}}" width="70%" alt="">
                      <p>Daftarkan diri anda dengan mengisi data data seperi nik untuk identifikasi dan nomor telp untuk dihubungi</p>
                      <img src="{{asset('img/manual_user/register_here.png')}}" width="90%" alt="">
                      <p>Bila sudah punya akun silahkan masuk untuk memulai</p>
                      <img src="{{asset('img/manual_user/login_page.png')}}" width="90%" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect waves-dark">Mulai Melapor</div>
              <div class="step-new-content">
                  <div class="row">
                    <div class="md-form col-12 ml-auto">
                      <div class="step-content lighten-3" style="width:100%;">
                        <p>Mulai melakukan laporan dengan mengisi laporan nya, kemudian isikan jenis laporan nya, set tnggal kejadian, dan jangan lupa masukan gambar bila ada</p>
                        <img src="{{asset('img/manual_user/mulai_lapor.png')}}" width="90%" alt="">
                      </div>
                    </div>
                  </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect waves-dark">Laporan Masuk</div>
              <div class="step-new-content">
                  <div class="row">
                    <div class="md-form col-12 ml-auto">
                      <div class="step-content lighten-3" style="width:100%;">
                        <p>Bila sudah mengisi laporan akan masuk ke menu laporan saya, di situ semua laporan anda akan di tampung</p>
                        <img src="{{asset('img/manual_user/daftar_laporan.png')}}" width="90%" alt="">
                      </div>
                    </div>
                  </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect waves-dark">Hasil</div>
              <div class="step-new-content">
                  <div class="row">
                    <div class="md-form col-12 ml-auto">
                      <div class="step-content lighten-3" style="width:100%;">
                        <p>Setelah di review petugas hasil akan keluar, ada dua hasil yang keluar yaitu</p>
                        <img src="{{asset('img/manual_user/slesai.png')}}" width="50%" alt="">
                        <p>yang berarti laporan di terima dan akan di tindak lanjuti, atau</p>
                        <img src="{{asset('img/manual_user/ditolak.png')}}" width="50%" alt="">
                        <p>yang berarti laporan di tolak karena berbagai hal, seperti kurang isi jelas, gambar kurang jelas, atau data palsu</p>
                      </div>
                    </div>
                  </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
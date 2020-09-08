@extends('layouts.homepage.master')
@section('title', 'Welcome ')
@section('content')
<header id="home">
  @include('layouts.homepage.navbar')
  <!-- Intro Section -->
  <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('https://mdbootstrap.com/img/Photos/Others/gradient2.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-purple-slight">
      <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row pt-5 mt-3">
          <div class="col-md-12 wow fadeIn mb-3">
            <div class="text-center">
              <h1 class="display-4 font-weight-bold mb-5 wow fadeInUp">Ciganjeng-Damai.NET</h1>
              </li>
              <h3 class="mb-5 wow fadeInUp" data-wow-delay="0.2s">APA ITU PENGADUAN!?</h3>
              <h5 class="mb-5 wow fadeInUp" data-wow-delay="0.2s">Pengaduan adalah pemberitahuan yang disertai permintaan oleh 
                pihak yang berkepentingan kepada pihak yang berwenang untuk menindak menurut Hukum, 
                terhadap seseorang yang telah melakukan Tindak Pidana Aduan yang merugikan.</h5>
              <div class="wow fadeInUp" data-wow-delay="0.4s">
                <a class="btn btn-purple btn-rounded" href="#lapor"><i class="fas fa-paper-plane left"></i> Mulai Lapor!</a>
                <a class="btn btn-outline-purple btn-rounded" href="#learn-more"><i class="fas fa-book left"></i> Learn more</a>
              </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</header>

<main>
  <div class="container">
    <hr class="mb-5" id="lapor"> 

    {{-- Section: isi laporan --}}
    <section class="section pb-5 wow fadeIn" data-wow-delay="0.3s">
      <div class="row">
        <div class="col-md-12  animated fadeInUp ">
          <!-- Table with panel -->
          <br>
          <div class="card card-cascade narrower">
    
            <!--Card image-->
            <div
              class="view view-cascade gradient-card-header purple narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
    
              <a href="" class="white-text mx-3">Form Pengaduan</a>
    
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="fas fa-info-circle mt-0"></i>
              </button>
    
            </div>
            <!--/Card image-->
    
            <div class="card-body px-lg-5 pt-0">
    
              <!-- Form -->
              <form role="form" action="{{route('pengaduan.store')}}" method="POST" class="text-center"
                style="color: #757575;" enctype="multipart/form-data"> 
                {{ csrf_field() }}
                @if (Auth::guard('masyarakat')->check())
                  <input type="hidden" name="nik" value="{{Auth::guard('masyarakat')->user()->nik}}">
                @endif
                <div class="md-form">
                  <textarea rows="3" name="isi_laporan" id="materialContactFormMessage" class="form-control md-textarea"
                  value="{{ old('isi_laporan')}}" required></textarea>
                  <label for="materialContactFormMessage">Ketik Pengaduan Anda...</label>
                </div>

                <div class="md-form">
                  <select name="jenis" class="mdb-select md-form colorful-select dropdown-primary" required>
                    <option value="{{ old('jenis')}}" disabled selected>Jenis Pengaduan</option>
                    @foreach ($jenis as $j)
                    <option value="{{$j ->id_jenis}}">{{$j ->nama}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="md-form">
                  <input placeholder="Plih Tanggal..." name="tgl_pengaduan" type="date" id="date-picker-example"
                    class="form-control datepicker @error('tgl_pengaduan') is-invalid @enderror" value="{{ old('tgl_pengaduan')}}">
                    @error('tgl_pengaduan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="md-form">
                  <div class="file-field">
                    <div class="btn purple btn-sm float-left">
                      <span class="white-text"><i class="fas fa-cloud-upload-alt mr-2 white-text"
                          aria-hidden="true"></i>Pilih File</span>
                      <input name="foto" type="file">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Upload Foto Bukti...">
                    </div>
                  </div>
                </div>

                <button class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect"
                type="submit">Kirim</button>
              </form>
              <!-- Form -->
    
            </div>
    
          </div>
          <!-- Table with panel -->
        </div>
      </div>
    </section>
    {{-- Section: isi laporan --}}

    <hr class="mb-5" id="learn-more">

    <!--Section: Features v.4-->
    <section class="section wow fadeIn" data-wow-delay="0.3s">

      <!--Section heading-->
      <h1 class="font-weight-bold text-center h1 my-5">Aplikasi Pengaduan Online?</h1>
      <!--Section description-->
      <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Sebuah aplikasi untuk membantu kita memberitahu secara anonim 
        maupun tidak, disertai permintaan oleh pihak yang berkepentingan kepada petugas 
        atau pihak yang berwenang untuk menindak lanjuti suatu pengaduan.</p>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-4">

          <!--Grid row-->
          <div class="row mb-2">
            <div class="col-2">
              <i class="fas fa-2x fa-flag-checkered indigo-text"></i>
            </div>
            <div class="col-10">
              <h5 class="font-weight-bold mb-4">Aninim</h5>
              <p class="grey-text">Fitur yang bisa dipilih oleh pelapor yang akan 
                membuat identitas pelapor tidak akan diketahui oleh 
                pihak terlapor dan masyarakat umum.</p>
            </div>
          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row mb-2">
            <div class="col-2">
              <i class="fas fa-2x fa-university blue-text"></i>
            </div>
            <div class="col-10">
              <h5 class="font-weight-bold mb-4">Safety</h5>
              <p class="grey-text">Data Masyarakat akan aman tidak akan bocor, sehingga kita bisa 
                leluasa untuk melaporkan kejadian apapun disekitar 
                kita yang bertentangan dengan hukum..</p>
            </div>
          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row mb-2">
            <div class="col-2">
              <i class="fas fa-2x fa-glass-martini cyan-text"></i>
            </div>
            <div class="col-10">
              <h5 class="font-weight-bold mb-4">Relaxing</h5>
              <p class="grey-text">Bisa dengan tenang melaporkan kejadian atau kejahatan disekitar.</p>
            </div>
          </div>
          <!--Grid row-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-2 text-center text-md-left flex-center">
          <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/iphone-portfolio1.png" alt="" class="z-depth-0">
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4">

          <!--Grid row-->
          <div class="row mb-2">
            <div class="col-2">
              <i class="fas fa-2x fa-heart deep-purple-text"></i>
            </div>
            <div class="col-10">
              <h5 class="font-weight-bold mb-4">Beloved</h5>
              <p class="grey-text">Petugas akan manggapi laporan baik dan benar.</p>
            </div>
          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row mb-2">
            <div class="col-2">
              <i class="fas fa-2x fa-bolt purple-text"></i>
            </div>
            <div class="col-10">
              <h5 class="font-weight-bold mb-4">Rapid</h5>
              <p class="grey-text">Cepat, Petugas akan den gan cepat menanggapi laporan masyarakat. 
                Dalam 3 hari, petugas akan menindaklanjuti dan membalas laporan Anda.</p>
            </div>
          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row mb-2">
            <div class="col-2">
              <i class="fas fa-2x fa-magic pink-text"></i>
            </div>
            <div class="col-10">
              <h5 class="font-weight-bold mb-4">Magical</h5>
              <p class="grey-text">Dengan berbagai fitur yang canggih, kita bisa dengan 
                tenang melaporkan segala kejadian di sekitar.</p>
            </div>
          </div>
          <!--Grid row-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </section>
    <!--/Section: Features v.4-->

    <hr class="mb-5">

    <!--Section: Testimonials v.3-->
    <section class="section team-section text-center pb-3 wow fadeIn" data-wow-delay="0.3s">

      <!--Section heading-->
      <h1 class="font-weight-bold text-center h1 my-5">Testimonials</h1>
      <!--Section description-->
      <p class="text-center grey-text mb-5 mx-auto w-responsive">Lorem ipsum dolor sit amet, consectetur adipisicing
        elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
        quisquam eum porro a pariatur accusamus veniam.</p>

      <!--Grid row-->
      <div class="row text-center">

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg" class="rounded-circle z-depth-1 img-fluid">
            </div>

            <!--Content-->
            <h4 class="font-weight-bold mt-4 mb-3">Anna Deynah</h4>
            <h6 class="mb-3 font-weight-bold grey-text">Web Designer</h6>
            <p><i class="fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos
              id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>

            <!--Review-->
            <div class="orange-text">
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star-half-alt"> </i>
            </div>
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">
          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" class="rounded-circle z-depth-1 img-fluid">
            </div>

            <!--Content-->
            <h4 class="font-weight-bold mt-4 mb-3">John Doe</h4>
            <h6 class="mb-3 font-weight-bold grey-text">Web Developer</h6>
            <p><i class="fas fa-quote-left"></i> Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
              suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>

            <!--Review-->
            <div class="orange-text">
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
            </div>
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">
          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle z-depth-1 img-fluid">
            </div>
            <!--Content-->
            <h4 class="font-weight-bold mt-4 mb-3">Maria Kate</h4>
            <h6 class="mb-3 font-weight-bold grey-text">Photographer</h6>
            <p><i class="fas fa-quote-left"></i> At vero eos et accusamus et iusto odio dignissimos ducimus qui
              blanditiis praesentium voluptatum deleniti atque corrupti.</p>

            <!--Review-->
            <div class="orange-text">
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="far fa-star"> </i>
            </div>

          </div>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </section>
    <!--Section: Testimonials v.3-->

    <hr class="mb-5"  id="how-to">
    
    <!-- Section: Horizontal stepper -->
    <section class="text-center my-5" data-wow-delay="0.3s>
      <!-- Section heading -->
      <h2 class="h1-responsive font-weight-bold mb-4  animated fadeInRight">Proses Pengaduan!!</h2>
      <br>
      {{-- <img src="http://localhost/ApplicationPengaduan/public/img/baihaki2.png" width="200px" height="250px" class="img-fluid mb-3 animated tada infinite" alt="Responsive image"> --}}
      <!-- Section description -->
      <p class="lead grey-text w-responsive mx-auto mb-3"></p>
      <hr>
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-12">
          <ul class="stepper horizontal" id="horizontal-stepper">
            <li class="step active">
              <div class="step-title waves-effect waves-dark">Tulis Pengaduan</div>
              <div class="step-new-content">
                <div class="row">
                  <div class="md-form col-12 ml-auto">
                    <div class="step-content lighten-3" style="width:100%;">
                      <h3>Laporkan pengaduan atau aspirasi anda dengan jelas dan lengkap</h3>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect waves-dark">Proses Verifikasi</div>
              <div class="step-new-content">
                  <div class="row">
                    <div class="md-form col-12 ml-auto">
                      <div class="step-content lighten-3" style="width:100%;">
                        <h3>Dalam 1 hari, pengaduan Anda akan diverifikasi dan diteruskan kepada yang berwenang</h3>
                      </div>
                    </div>
                  </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect waves-dark">Tindak Lanjut</div>
              <div class="step-new-content">
                  <div class="row">
                    <div class="md-form col-12 ml-auto">
                      <div class="step-content lighten-3" style="width:100%;">
                        <h3>Dalam 3 hari, petugas akan menindaklanjuti dan membalas laporan Anda</h3>
                      </div>
                    </div>
                  </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect waves-dark">Selesai</div>
              <div class="step-new-content">
                  <div class="row">
                    <div class="md-form col-12 ml-auto">
                      <div class="step-content lighten-3" style="width:100%;">
                        <h3>Pengaduan Anda akan terus ditindaklanjuti hingga terselesaikan</h3>
                      </div>
                    </div>
                  </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Section: Horizontal stepper -->

    <hr class="mb-5" id="contact">

    <!--Section: Contact v.2-->
    <section class="section pb-5 wow fadeIn" data-wow-delay="0.3s">

      <!--Section heading-->
      <h2 class="font-weight-bold text-center h1 my-5">Contact us</h2>
      <!--Section description-->
      <p class="text-center grey-text mb-5 mx-auto w-responsive">Lorem ipsum dolor sit amet, consectetur adipisicing
        elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
        quisquam eum porro a pariatur accusamus veniam. Quia, minima?</p>

      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 col-xl-9">
          <form>

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-md-6">
                <div class="md-form">
                  <input type="text" id="contact-name" class="form-control">
                  <label for="contact-name" class="">Your name</label>
                </div>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-6">
                <div class="md-form">
                  <input type="text" id="contact-email" class="form-control">
                  <label for="contact-email" class="">Your email</label>
                </div>
              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                  <input type="text" id="contact-Subject" class="form-control">
                  <label for="contact-Subject" class="">Subject</label>
                </div>
              </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-md-12">

                <div class="md-form">
                  <textarea type="text" id="contact-message" class="md-textarea form-control" rows="3"></textarea>
                  <label for="contact-message">Your message</label>
                </div>

              </div>
            </div>
            <!--Grid row-->

          </form>

          <div class="text-center text-md-left my-4">
            <a class="btn btn-light-blue btn-rounded">Send</a>
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 col-xl-3">
          <ul class="contact-icons text-center list-unstyled">
            <li><i class="fas fa-map-marker fa-2x"></i>
              <p>San Francisco, CA 94126, USA</p>
            </li>

            <li><i class="fas fa-phone fa-2x"></i>
              <p>+ 01 234 567 89</p>
            </li>

            <li><i class="fas fa-envelope fa-2x"></i>
              <p>contact@mdbootstrap.com</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->

      </div>

    </section>
    <!--Section: Contact v.2-->

  </div>        








</main>

@include('layouts.homepage.footer')
@endsection

@push('css')
    
<style>
  html,
  body,
  header,
  .jarallax {
      height: 700px;
  }

  @media (max-width: 740px) {
      html,
      body,
      header,
      .jarallax {
          height: 100vh;
      }
  }

  @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .jarallax {
          height: 100vh;
      }
  }

  @media (min-width: 560px) and (max-width: 650px) {
      header .jarallax h1 {
          margin-bottom: .5rem !important;
      }
      header .jarallax h5 {
          margin-bottom: .5rem !important;
      }
  }


  @media (min-width: 660px) and (max-width: 700px) {
      header .jarallax h1 {
          margin-bottom: 1.5rem !important;
      }
      header .jarallax h5 {
          margin-bottom: 1.5rem !important;
      }
  }

  .top-nav-collapse {
      background-color: #9da4b1 !important;
  }
  .navbar:not(.top-nav-collapse) {
      background: transparent !important;
  }
  @media (max-width: 768px) {
      .navbar:not(.top-nav-collapse) {
          background: #9da4b1 !important;
      }
  }

  @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
          background: #9da4b1!important;
      }
  }

  footer.page-footer {
      background-color: #9da4b1;
  }

</style>
@endpush
@push('js')
<script>
  $(document).ready(function() {
      $('.mdb-select').materialSelect();
  });
</script>
<script>
  $(document).ready(function () {
    $('.stepper').mdbStepper();
    })

    function someFunction21() {
    setTimeout(function () {
    $('#horizontal-stepper').nextStep();
    }, 2000);
  }
</script>
<script>
  $('.datepicker').pickadate({
    format: 'yyyy/mm/dd',
    formatSubmit: 'yyyy/mm/dd'
//     hiddenPrefix: 'prefix__',
// hiddenSuffix: '__suffix'
  });
</script>
@endpush
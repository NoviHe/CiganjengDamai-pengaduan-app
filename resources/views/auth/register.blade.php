@extends('layouts.homepage.master')
@section('title', 'Register ')
@section('content')
<!--Main Navigation-->
<header>
    @include('layouts.homepage.navbar')

    <!--Intro Section-->
    <section class="view intro-2">
        <div class="mask rgba-gradient">
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <!--Grid row-->
                <div class="row  pt-5 mt-3">
                    <!--Grid column-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="font-weight-bold my-4 text-center mb-5 mt-4 font-weight-bold">
                                    <strong>REGISTER</strong>
                                </h2>
                                <hr>
                                <!--Grid row-->
                                <div class="row mt-5">
                                    <!--Grid column-->
                                    <div class="col-md-6 ml-lg-5 ml-md-3">
                                        <!--Grid row-->
                                        <div class="row pb-4">
                                            <div class="col-2 col-lg-1">
                                            <i class="fas fa-university indigo-text fa-lg"></i>
                                            </div>
                                            <div class="col-10">
                                            <h4 class="font-weight-bold mb-4">
                                                <strong>Safety</strong>
                                            </h4>
                                            <p class="">Data Masyarakat akan aman tidak akan bocor, sehingga kita bisa leluasa
                                                untuk melaporkan kejadian apapun disekitar kita yang bertentangan dengan hukum.</p>
                                            </div>
                                        </div>
                                        <!--Grid row-->

                                        <!--Grid row-->
                                        <div class="row pb-4">
                                            <div class="col-2 col-lg-1">
                                            <i class="fas fa-desktop deep-purple-text fa-lg"></i>
                                            </div>
                                            <div class="col-10">
                                            <h4 class="font-weight-bold mb-4">
                                                <strong>Technology</strong>
                                            </h4>
                                            <p class="">Dengan teknologi yang canggih akan memudahkan kita untuk melaporkan 
                                                berbagai kejadian dengan cepat dan mudah.</p>
                                            </div>
                                        </div>
                                        <!--Grid row-->

                                        <!--Grid row-->
                                        <div class="row pb-4">
                                            <div class="col-2 col-lg-1">
                                            <i class="fas fa-money-bill-alt purple-text fa-lg"></i>
                                            </div>
                                            <div class="col-10">
                                            <h4 class="font-weight-bold mb-4">
                                                <strong>Free</strong>
                                            </h4>
                                            <p class="">Nikmati layanan pelaporan ini dengan gratis tanpa dipungut biaya.</p>
                                            </div>
                                        </div>
                                        <!--Grid row-->
                                    </div>
                                    <!--Grid column-->
                                    <!--Grid column-->
                                    <div class="col-md-5">
                                        <!--Grid row-->
                                        <div class="row pb-4 d-flex justify-content-center mb-4">
                                            <h4 class="mt-3 mr-4">
                                            <strong>Sign Up:</strong>
                                        </div>
                                        <!--/Grid row-->
                                        <form action="{{route('registers')}}" method="post" autocomplete="off" >
                                            {{ csrf_field() }}
                                            <!--Body-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="md-form">
                                                    <i class="fas fa-users prefix"></i>
                                                    <input type="text" id="orangeForm-nama" value="{{ old('nama') }}" required
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama">
                                                    <label for="orangeForm-nama">Nama Lengkap</label>
                                                    @error('nama')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="md-form">
                                                    <input type="text" id="orangeForm-nik" value="{{ old('nik') }}" required
                                                    class="form-control @error('nik') is-invalid @enderror" name="nik">
                                                    <label for="orangeForm-nik">Nomor NIK</label>
                                                    @error('nik')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="md-form">
                                                <i class="fas fa-phone prefix "></i>
                                                <input id="no-telp" type="text" class="form-control  @error('telp') is-invalid @enderror" 
                                                name="telp" required value="{{ old('telp') }}">
                                                <label for="no-telp" >No Telp</label>
                                                @error('telp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="md-form">
                                                <i class="fas fa-user prefix "></i>
                                                <input type="text" id="orangeForm-username" value="{{ old('username') }}" required
                                                class="form-control @error('username') is-invalid @enderror" name="username">
                                                <label for="orangeForm-username">Username</label>
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="md-form">
                                                <i class="fas fa-lock prefix "></i>
                                                <input type="password" id="orangeForm-pass" name="password" required
                                                class="form-control @error('password') is-invalid @enderror">
                                                <label for="orangeForm-pass">Your password</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="md-form">
                                                <i class="fas fa-key prefix "></i>
                                                <input id="password-confirm" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" 
                                                name="password_confirmation" required>
                                                <label for="password-confirm" >Confirm Password</label>
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="text-center">
                                                <button class="btn btn-indigo btn-rounded mt-5">Sign up</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Grid column-->
                                </div>
                                <!--Grid row-->
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
        </div>
    </section>
    <!--Intro Section-->
</header>

@endsection
@push('css')
<style>
    html,
    body,
    header,
    .view {
        height: 100%;
    }

    @media (min-width: 851px) and (max-width: 1440px) {
        html,
        body,
        header,
        .view {
        height: 850px;
        }
    }

    @media (min-width: 800px) and (max-width: 850px) {
        html,
        body,
        header,
        .view {
        height: 1000px;
        }
    }

    @media (min-width: 451px) and (max-width: 740px) {
        html,
        body,
        header,
        .view {
        height: 1200px;
        }
    }

    @media (max-width: 450px) {
        html,
        body,
        header,
        .view {
        height: 1400px;
        }
    }

    .intro-2 {
        background: url("{{url('homepage/img/bgsignup.jpg')}}")no-repeat center center;
        background-size: cover;
    }

    .top-nav-collapse {
        background-color: #3f51b5 !important;
    }

    .navbar:not(.top-nav-collapse) {
        background: transparent !important;
    }

    @media (max-width: 768px) {
        .navbar:not(.top-nav-collapse) {
        background: #3f51b5 !important;
        }
    }
    @media (min-width: 800px) and (max-width: 850px) {
        .navbar:not(.top-nav-collapse) {
            background: #3f51b5!important;
        }
    }

    .rgba-gradient {
        background: -webkit-linear-gradient(98deg, rgba(22, 91, 231, 0.5), rgba(255, 32, 32, 0.5) 100%);
        background: -webkit-gradient(linear, 98deg, from(rgba(22, 91, 231, 0.5)), to(rgba(255, 32, 32, 0.5)));
        background: linear-gradient(to 98deg, rgba(22, 91, 231, 0.5), rgba(255, 32, 32, 0.5) 100%);
    }

    .card {
        background-color: rgba(255, 255, 255, 0.85);
    }

    h6 {
        line-height: 1.7;
    }
    </style>
@endpush













@extends('layouts.admin.master')
@section('title', 'Detail Data Masyarakat')
@section('content')
<div class="container-fluid">
    <!-- Material form subscription -->
    <div class="row">
        <div class="col-md-12"><a href="{{route('masyarakat.index')}}" class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect"
                type="submit">Kembali</a></div>
        </div>  

    <div class="row">
    <div class="col-md-6">
        <div class="card">

            <h5 class="card-header purple white-text text-center py-4">
                <strong>Detail pengguna</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5">

                <!-- Form -->
                <!-- Name -->
                <div class="md-form">
                    <input type="text" name="id" id="materialSubscriptionFormPasswords" class="form-control"
                        value="{{$data ->id}}" disabled value="id">
                    <label for="materialSubscriptionFormPasswords">ID.</label>
                </div>
                <div class="md-form">
                    <input type="text" value="{{$data ->nama}}" disabled name="nama" id="materialSubscriptionFormEmail"
                        class="form-control">
                    <label for="materialSubscriptionFormEmail">Nama</label>
                </div>
                <div class="md-form">
                    <input type="text" value="{{$data ->nik}}" disabled name="nik" id="materialSubscriptionFormEmail"
                        class="form-control">
                    <label for="materialSubscriptionFormEmail">NIK</label>
                </div>
                <div class="md-form">
                    <input type="text" value="{{$data ->username}}" disabled name="username" id="materialSubscriptionFormEmail"
                        class="form-control">
                    <label for="materialSubscriptionFormEmail">Username</label>
                </div>
                <div class="md-form">
                    <input type="text" value="{{$data ->telp}}" disabled name="telp" id="materialSubscriptionFormEmail"
                        class="form-control">
                    <label for="materialSubscriptionFormEmail">No. Telp</label>
                </div>
                <!-- Form -->

            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card">

            <h5 class="card-header purple white-text text-center py-4">
                <strong>Foto pengguna</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5">

                <!-- Form -->
                <div class="md-form">
                    @if (!empty($data ->foto))
                    <img src="{{asset('img')}}/{{$data ->foto}}" class="img-fluid img-thumbnail z-depth-2"
                        alt="Responsive image" width="500px" height="500px">

                    @else
                    <img src="{{asset('img/profil/image_placeholder.jpg')}}" class="img-fluid img-thumbnail z-depth-2"
                        alt="Responsive image" width="400px" height="400px">

                    @endif
                </div>



                </form>
                <!-- Form -->

            </div>

        </div>
    </div>
    </div>
    <!-- Material form subscription -->
</div>
@endsection
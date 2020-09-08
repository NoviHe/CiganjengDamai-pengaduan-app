@extends('layouts.admin.master')
@section('title', 'Input Data Jenis ')
@section('content')
<div class="container">
    <!-- Material form subscription -->
    <div class="card">

        <h5 class="card-header purple white-text text-center py-4">
            <strong>Tambah Data Jenis</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-sm-5">

            <!-- Form -->
            <form role="form" method="POST" class="text-center" style="color: #757575;" action="{{route('jenis.store')}}">
                @csrf

                <!-- E-mai -->
                <div class="md-form">
                    <input type="text" name="nama" id="materialSubscriptionFormEmail" class="form-control @error('nama') is-invalid @enderror" autofocus>
                    <label for="materialSubscriptionFormEmail">Nama</label>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Sign in button -->
                <button class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect"
                    type="submit" name="proses">Submit</button>

            </form>
            <!-- Form -->

        </div>

    </div>
    <!-- Material form subscription -->
</div>
@endsection
@extends('layouts.admin.master')
@section('title', 'Edit Data Jenis ')
@section('content')
<div class="container">
    <!-- Material form subscription -->
<div class="card">

    <h5 class="card-header purple white-text text-center py-4">
        <strong>Edit Data Jenis</strong>
    </h5>
    <!--Card content-->
    <div class="card-body px-sm-5">

        <!-- Form -->
        <form role="form" method="POST" class="text-center" style="color: #757575;" action="{{route('jenis.update', $data ->id_jenis)}}">
            @method('put')
            @csrf
            <!-- Name -->
            <div class="md-form">
            <input type="text" name="id" id="materialSubscriptionFormPasswords" class="form-control" value="{{($data ->id_jenis)}}" disabled>
                <label for="materialSubscriptionFormPasswords">ID</label>
            </div>

            <!-- E-mai -->
            <div class="md-form">
            <input type="text" name="nama" id="materialSubscriptionFormEmail" class="form-control" value="{{( $data ->nama)}}">
                <label for="materialSubscriptionFormEmail">Nama</label>
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
@extends('layouts.admin.master')
@section('title', 'Input Data Petugas ')
@section('content')
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header purple white-text text-center py-4">
            <strong>Input Data Petugas</strong>
        </h5>
        <!--Card content-->
        <div class="card-body px-lg-5">
    
            <!-- Form -->
            <form class="text-center" style="color: #757575;" method="POST" action="{{route('petugas.store')}}"
                enctype="multipart/form-data">
                @csrf

                <div class="md-form">
                    <input type="text" id="orangeForm-nama_petugas" value="{{ old('nama_petugas') }}" required
                    class="form-control @error('nama_petugas') is-invalid @enderror" name="nama_petugas">
                    <label for="orangeForm-nama_petugas">Nama Lengkap</label>
                    @error('nama_petugas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form">
                    <input id="no-telp" type="number" class="form-control  @error('telp') is-invalid @enderror" 
                    name="telp" required value="{{ old('telp') }}">
                    <label for="no-telp" >No Telp</label>
                    @error('telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form">
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
                    <input type="password" id="orangeForm-password" value="{{ old('password') }}" required
                    class="form-control @error('password') is-invalid @enderror" name="password">
                    <label for="orangeForm-password">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form">
                    <input type="password" id="orangeForm-rePassword" required
                    class="form-control @error('rePassword') is-invalid @enderror" name="rePassword">
                    <label for="orangeForm-rePassword">Password Confirmation</label>
                    @error('rePassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form">
                    <select name="level" class="mdb-select md-form @error('level') is-invalid @enderror">
                        <option disabled selected>Role</option>
                        <option value="petugas">Petugas</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Sign in button -->
                <button class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Input
                    Data
                </button>
    
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>
@endpush
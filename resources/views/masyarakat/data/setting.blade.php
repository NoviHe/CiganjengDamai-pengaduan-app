@extends('layouts.user.master')
@section('title', 'Edit Data Masyarakat ')
@section('content')
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header purple white-text text-center py-4">
            <strong>Update Data Masyarakat</strong>
        </h5>
        <!--Card content-->
        <div class="card-body px-lg-5">
    
            <!-- Form -->
            <form class="text-center" style="color: #757575;" method="POST" action="{{route('setting.update', $data ->id)}}"
                enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="md-form">
                    <input type="text" id="orangeForm-nama" value="{{ old('nama', $data->nama) }}" required
                    class="form-control @error('nama') is-invalid @enderror" name="nama">
                    <label for="orangeForm-nama">Nama Lengkap</label>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form">
                    <input id="no-telp" type="text" class="form-control  @error('telp') is-invalid @enderror" 
                    name="telp" required value="{{ old('telp', $data->telp) }}">
                    <label for="no-telp" >No Telp</label>
                    @error('telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form">
                    <input type="text" id="orangeForm-nik" value="{{ old('nik',$data->nik) }}" required
                    class="form-control @error('nik') is-invalid @enderror" name="nik" disabled>
                    <label for="orangeForm-nik">Nomor NIK</label>
                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form">
                    <input type="text" id="orangeForm-username" value="{{ old('username',$data->username) }}" required
                    class="form-control @error('username') is-invalid @enderror" name="username" disabled>
                    <label for="orangeForm-username">Username</label>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Sign in button -->
                <button class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Update
                    Data
                </button>
    
            </form>
        </div>
    </div>
</div>
@endsection

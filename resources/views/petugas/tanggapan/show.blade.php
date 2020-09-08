@extends('layouts.admin.master')
@section('title', 'Detail Data Tanggapoan ')
@section('content')
<div class="container">
    <div class="row animated fadeInRight">
        <div class="col-md-12"><a href="{{route('tanggapan.index')}}" class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect"
                type="submit">Kembali</a></div>
        </div>
        <div class="row">
            <div class="col-md-12 animated fadeInUp">
                <!-- Material form subscription -->
                <div class="card">

                    <h5 class="card-header purple white-text text-center py-4">
                        <strong>Detail Tanggapan</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-sm-5">

                            <!-- E-mai -->
                            <div class="md-form">
                                <input type="text" name="nama" id="materialSubscriptionFormEmail" class="form-control" disabled  value="{{old('nama',$data->getAdmin->nama_petugas)}}">
                                <label for="materialSubscriptionFormEmail">Nama</label>
                            </div>

                            <div class="md-form">
                                <input type="text" name="tgl_tanggapan" id="materialSubscriptionFormEmail" class="form-control" disabled  value="{{old('tgl_tanggapan',$data->tgl_tanggapan)}}">
                                <label for="materialSubscriptionFormEmail">Tanggal Ditulis</label>
                            </div>

                            <div class="md-form">
                                <textarea rows="3" name="tanggapan" id="materialContactFormMessage" class="form-control md-textarea"
                                disabled>{{old('tanggapan',$data->tanggapan)}}</textarea>
                                <label for="materialContactFormMessage">Tanggapan</label>
                            </div>

                    </div>

                </div>
                <!-- Material form subscription -->
            </div>
        </div>
    </div>
</div>
@endsection
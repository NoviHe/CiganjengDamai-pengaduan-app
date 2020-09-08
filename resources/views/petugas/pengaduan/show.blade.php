@extends('layouts.admin.master')
@section('title', 'Detail Data Pengaduan ')
@section('content')
<div class="container-fluid">
    <div class="row animated fadeInRight">
        <div class="col-md-12"><a href="{{route('pengaduan.index')}}" class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect"
                type="submit">Kembali</a></div>
        </div>
        <div class="row">
            <div class="col-md-6 animated fadeInUp">
                    <div class="card">

                            <h5 class="card-header purple white-text text-center py-4">
                                <strong>Detail Pengaduan</strong>
                            </h5>
                        
                            <!--Card content-->
                            <div class="card-body px-lg-5">
                        
                                <!-- Form -->
                                <form class="text-center" style="color: #757575;" action="#!">
                                    <!-- Name -->
                                    <div class="md-form mt-3">
                                        <input value="{{old('jenis',$data->getJenis->nama)}}" type="text" id="materialSubscriptionFormPasswords" class="form-control"
                                            disabled>
                                        <label for="materialSubscriptionFormPasswords">Jenis Pengaduan</label>
                                    </div>
                        
                                    <!-- E-mai -->
                                    <div class="md-form">
                                        <input value="{{$data->getUser->nama}}" type="email" id="materialSubscriptionFormEmail" class="form-control"
                                            disabled>
                                        <label for="materialSubscriptionFormEmail">User Pelapor</label>
                                    </div>
                        
                                    <div class="md-form">
                                        <input value="{{$data ->tgl_pengaduan}}" type="email" id="materialSubscriptionFormEmail"
                                            class="form-control" disabled>
                                        <label for="materialSubscriptionFormEmail">Tanggal</label>
                                    </div>
                        
                                    <div class="md-form">
                                        <textarea id="materialContactFormMessage" class="form-control md-textarea" rows="3"
                                            disabled>{{$data ->isi_laporan}}</textarea>
                                        <label for="materialContactFormMessage">Keterangan</label>
                                    </div>
                
                                    @if ( $data ->status != "proses")
                                    @php
                                        switch ($data ->status) {
                                            case 'selesai':
                                                $a = 'Selesai';
                                                break;

                                            case '0':
                                                $a = 'Ditolak';
                                                break;
                                            
                                            default:
                                                $a = 'Diproses';
                                                break;
                                        }
                                    @endphp

                                    <button type="button" class="btn btn-purple btn-lg btn-block" disabled>Tanggapan</button>

                                        <div class="md-form">
                                        <input value="{{$a}}" type="email" id="materialSubscriptionFormEmail"
                                            class="form-control" disabled>
                                        <label for="materialSubscriptionFormEmail">Status</label>
                                    </div>
                                    <div class="md-form">
                                        <input value="{{$dt->getAdmin->nama_petugas}}" type="email" id="materialSubscriptionFormEmail" class="form-control"
                                            disabled>
                                        <label for="materialSubscriptionFormEmail">Petugas</label>
                                    </div>
                        
                                    <div class="md-form mt-4">
                                        <textarea name="jawaban" id="materialContactFormMessage" class="form-control md-textarea" rows="3"
                                            disabled>{{$dt ->tanggapan}}</textarea>
                                        <label for="materialContactFormMessage">Tanggapan</label>
                                    </div>
                        
                                    @else
                        
                                    @endif
                        
                        
                        
                                </form>
                                <!-- Form -->
                        
                            </div>
                        
                        </div>
                        
                        
            </div>
            
            <div class="col-md-6 animated fadeInRight">
                    <div class="card">

                            <h5 class="card-header purple white-text text-center py-4">
                            <strong>Foto Bukti</strong>
                            </h5>
                        
                            <!--Card content-->
                            <div class="card-body px-lg-5">
                        
                                <!-- Form -->
                                    <div class="md-form">
                                        @if (!empty($data ->foto))
                                        <img src="{{url('data_file')}}/{{$data ->foto}}"
                                        class="img-fluid img-thumbnail z-depth-2" alt="Responsive image" width="500px" height="500px">
                                        
                                        @else
                                        <img src="{{url('img/image_placeholder.jpg')}}"
                                        class="img-fluid img-thumbnail z-depth-2" alt="Responsive image" width="500px" height="500px">
                                            
                                        @endif
                                    </div>
                        
                                    
                        
                                </form>
                                <!-- Form -->
                        
                            </div>
                        
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.user.master')
@section('title', 'Detail Data Pengaduan ')
@section('content')
<div class="container">
    <!-- Section: Blog v.4 -->
    <section class="mt-5 pb-3 wow fadeIn">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-12">

                <!-- Featured image -->
                <div class="card card-cascade wider reverse">
                <div class="view view-cascade overlay">
                    <img src="{{url('data_file')}}/{{$data->foto}}" alt="Wide sample post image" class="img-fluid">
                    <a>
                    <div class=""></div>
                    </a>
                </div>

                <!-- Post data -->
                <div class="card-body card-body-cascade text-center">
                    <h2><a><strong>{{$data->getJenis->nama}}</strong></a></h2>
                    <p>Laporan by <a>{{$data->getUser->nama}}</a>, {{$data->tgl_pengaduan}}</p>
                    <hr class="mb-5 mt-4">
                    <div class="excerpt mt-5 wow fadeIn" data-wow-delay="0.3s">
                    
                        <p>{{$data->isi_laporan}}</p>
        
                    </div>
                </div>
                <!-- Post data -->
                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </section>
    <!-- Section: Blog v.4 -->

    <hr class="mb-5 mt-4">
    @if ($data->status != 'proses')
    <!-- Author box -->
    <section class="mb-5">

        <div class="jumbotron p-5 text-center text-md-left author-box wow fadeIn" data-wow-delay="0.3s">
            <!-- Name -->
            <h4 class="h3-responsive text-center font-weight-bold dark-grey-text">Tanggapan</h4>
            <hr>
            <div class="row">
                <!-- Avatar -->
                {{-- <div class="col-12 col-md-2 mb-md-0 mb-4">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" class="img-fluid rounded-circle z-depth-2">
                </div> --}}
                <!-- Author Data -->
                <div class="col-12 col-md-10">
                <h5 class="font-weight-bold dark-grey-text mb-3">
                    <strong>{{$dt->getAdmin->nama_petugas}}</strong>
                </h5>
                @php
                    switch ($data->status) {
                        case 'selesai':
                            $a = 'Selesai';
                            $b = 'fa-check';
                            break;

                        default:
                            $a = 'Ditolak';
                            $b = 'fa-times';
                            break;
                    }
                @endphp
                <a href="" class="cyan-text">
                    <h6 class="pb-1"><i class="fas {{$b}}"></i><strong> {{$a}}</strong></h6>
                </a>
                <p>{{$dt->tanggapan}}
                </p>
                </div>
            </div>
        </div>

    </section>
    <!-- Author box -->
    @endif
    
</div>
@endsection
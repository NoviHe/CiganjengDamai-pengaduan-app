@extends('layouts.user.master')
@section('title', 'Daftar Laporan Anda')
@section('content')
<div class="container-fluid">
    <!-- Section: Blog v.3 -->
    <section class="my-5 text-center text-lg-left wow fadeIn" data-wow-delay="0.3s">

        <!-- Section heading -->
        <h2 class="text-center my-5 h1">Daftar Laporan</h2>

        @foreach ($data as $dt)
            <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-lg-4 mb-4">
                <!-- Featured image -->
                <div class="view overlay z-depth-1">
                    <img src="{{url('data_file')}}/{{$dt->foto}}" class="img-fluid" alt="First sample image">
                    <a>
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                </div>
                <!-- Grid column -->
    
                <!-- Grid column -->
                <div class="col-lg-7 mb-4">
                <!-- Excerpt -->
                @php
                    switch ($dt->status) {
                        case 'proses':
                            $a = 'Diproses';
                            $b = 'fa-arrow-up';
                            break;

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
                <h4 class="mb-4"><strong>{{$dt->getJenis->nama}}</strong></h4>
                    <div class="special-text">
                        <p>{{$dt->isi_laporan}}</p>
                    </div>
                <p>by <a><strong>{{$dt->getUser->nama}}</strong></a>, {{$dt->tgl_pengaduan}}</p>
                <div class="btn-group">
                    <a class="btn btn-purple expand-button">More</a>
                    <button type="button" class="btn btn-purple btn-sm text-white dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        data-reference="parent">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                        <a class="dropdown-item modalPoll-1" href="{{route('pengaduan.detail',$dt->id_pengaduan)}}"><i class="fas fa-eye mr-1"></i>Detail</a>
                        @if ($dt->status == 'proses')
                        <a class="dropdown-item" href="{{route('pengaduan.edit',$dt->id_pengaduan)}}"><i class="fas fa-edit mr-1"></i>Edit</a>
                        <a href="#" class="dropdown-item hapus" link="pengaduan" hapus-id="{{$dt->id_pengaduan}}"><i class="fas fa-trash mr-1"></i>Delete</a>
                        @endif
                    </div>
                </div>
                </div>
                <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <hr class="mb-5">
        @endforeach
        {{$data->links()}}
    </section>
</div>
@endsection
@push('css')
    <style>
        .special-text{
            overflow: hidden; white-space: nowrap; text-overflow: ellipsis;
        }
    </style>
@endpush
@push('js')
<script>
    $('.hapus').click(function(){
        var hapus_id = $(this).attr('hapus-id'); 
        var link = $(this).attr('link');
        Swal.fire({
            title: 'Yakin?',
            text: "Data Ingin dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) { 
            window.location = "/masyarakat/data/"+ link +"/"+ hapus_id +"/delete"
            }
        })
    });
</script>
@endpush
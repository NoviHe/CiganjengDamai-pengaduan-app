@extends('layouts.admin.master')
@section('title', 'Data Masyarakat ')
@section('content')
<div class="container">
    <div class="row  animated fadeInRight">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb purple">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a><i class="fas fa-angle-right mx-2"
                        aria-hidden="true"></i></li>
                    <li class=""><a class="white-text" href="#">Admin</a><i class="fas fa-angle-right mx-2"
                        aria-hidden="true"></i></li>
                    <li class="breadcrumb-item text-light active">Data Masyarakat</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row animated fadeInUp delay-1s">
        <div class="col-md-12">
        <!-- Table with panel -->
        <br>
        <div class="card card-cascade narrower">

            <!--Card image-->
            <div
            class="view view-cascade gradient-card-header purple narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <a href="" class="white-text mx-3">Table Pengaduan</a>

            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="fas fa-info-circle mt-0"></i>
            </button>

            </div>
            <!--/Card image-->

            <div class="px-4">

            <div class="table-wrapper table-responsive w-auto">
                <!--Table-->
                <table id="datatable" class="table table-hover mb-0 ">

                    <!--Table head-->
                    <thead>
                        <tr>
                            <th class="th-md">No.</th>
                            <th class="th-md">ID.</th>
                            <th class="th-md">Username</th>
                            <th class="th-md">Nama</th>
                            <th class="th-md">NIK</th>
                            <th class="th-md">Telp</th>
                            <th class="th-md">Action</th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>   
                        @foreach ($data as $dt)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dt ->id}}</td>
                            <td>{{$dt->username}}</td>
                            <td>{{$dt ->nama}}</td>
                            <td>{{$dt ->nik}}</td>
                            <td>{{$dt ->telp}}</td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-purple btn-sm">Action</button>
                                <button type="button" class="btn btn-purple btn-sm text-white dropdown-toggle dropdown-toggle-split"
                                    id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    data-reference="parent">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                    <a class="dropdown-item" href="{{ route('masyarakat.show', $dt ->id) }}" value=""><i class="fas fa-eye mr-1"></i>Detail</a>
                                    <a class="dropdown-item" href="{{route('masyarakat.edit', $dt ->id)}}"><i class="fas fa-edit mr-1"></i>Edit</a>
                                    <a href="#" class="dropdown-item hapus" link="masyarakat" hapus-id="{{$dt ->id}}"><i class="fas fa-trash mr-1"></i>Delete</a>
                                </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                <!--Table body-->
                </table>
                <!--Table-->
            </div>

            </div>

        </div>
        <!-- Table with panel -->
        </div>
    </div>
</div>
@endsection

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
            window.location = "/petugas/data/"+ link +"/"+ hapus_id +"/delete"
            }
        })
    });
</script>
@endpush
@extends('layouts.admin.master')
@section('title', 'Data Petugas ')
@section('content')
<div class="container">
    <div class="row animated fadeInRight">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb purple">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a><i class="fas fa-angle-right mx-2"
                    aria-hidden="true"></i></li>
                <li class=""><a class="white-text" href="#">Admin</a><i class="fas fa-angle-right mx-2"
                    aria-hidden="true"></i></li>
                <li class="breadcrumb-item text-light active">Data Petugas</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 animated fadeInLeft delay-1s">
            <a href="{{route('petugas.create')}}" class="btn btn-success btn-block"><i class="fas fa-plus mr-1"></i> Tambah</a>
            <br>
            <br>
            <a href="#" class="btn btn-primary btn-block"><i class="fas fa-print mr-1"></i> Cetak</a>
            <br>
            <br>
            <a href="#" class="btn btn-primary  btn-block"><i class="fas fa-file-excel mr-1"></i>
                Excel
            </a>
        </div>
        <div class="col-md-10 animated fadeInUp delay-1s" >
        
            <br>
            <div class="card card-cascade narrower">

                <!--Card image-->
                <div class="view view-cascade gradient-card-header purple narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                    <a href="" class="white-text mx-3">Table Petugas</a>

                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-info-circle mt-0"></i>
                    </button>

                </div>

                <div class="px-4">

                    <div class="table-wrapper table-responsive">
                        <!--Table-->
                        <table id="datatable" class="table table-hover mb-0">

                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th class="th-md">No.</th>
                                    <th class="th-md">ID.</th>
                                    <th class="th-md">Username</th>
                                    <th class="th-md">Nama </th>
                                    <th class="th-md">Telp</th>
                                    <th class="th-md">Role</th>
                                    <th class="th-md">Action</th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                @foreach ($data as $dt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dt ->id_petugas }}</td>
                                    <td>{{ $dt ->username }}</td>
                                    <td>{{ $dt ->nama_petugas }}</td>
                                    <td>{{ $dt ->telp }}</td>
                                    <td>{{ $dt ->level }}</td>
                                    <td>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-purple btn-sm">Action</button>
                                        <button type="button" class="btn btn-purple btn-sm text-white dropdown-toggle dropdown-toggle-split"
                                            id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            data-reference="parent">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <a class="dropdown-item modalPoll-1" href="{{route('petugas.show', $dt->id_petugas)}}"><i class="fas fa-eye mr-1"></i>Detail</a>
                                            <a class="dropdown-item" href="{{route('petugas.edit', $dt ->id_petugas)}}"><i class="fas fa-edit mr-1"></i>Edit</a>
                                            @if ($dt->id_petugas != Auth::id())
                                            <a href="#" class="dropdown-item hapus" link="petugas" hapus-id="{{$dt ->id_petugas}}"><i class="fas fa-trash mr-1"></i>Delete</a>                                                
                                            @endif
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
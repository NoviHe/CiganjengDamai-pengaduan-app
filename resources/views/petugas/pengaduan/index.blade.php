@extends('layouts.admin.master')
@section('title', 'Data Pengaduan ')
@section('content')
<div class="container">
    <div class="row" >
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb purple">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a><i class="fas fa-angle-right mx-2"
                    aria-hidden="true"></i></li>
                <li class=""><a class="white-text" href="#">User</a><i class="fas fa-angle-right mx-2" aria-hidden="true"></i>
                </li>
                <li class="breadcrumb-item text-light active">Laporan Pengaduan</li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a href="">
            <button class="btn btn-primary btn-block"><i class="fas fa-print mr-1"></i> Cetak</button></a>
            <br>
            <a href="">
            <button class="btn btn-primary  btn-block"><i class="fas fa-file-excel mr-1"></i> Excel</button></a>
        </div>
        <div class="col-md-10">
            <!-- Table with panel -->
            <br>
            <div class="card card-cascade narrower">
    
            <!--Card image-->
            <div
                class="view view-cascade gradient-card-header purple narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
    
                <a href="" class="white-text mx-3">Table Laporan Pengaduan</a>
    
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="fas fa-info-circle mt-0"></i>
                </button>
    
            </div>
            <!--/Card image-->
    
            <div class="px-4">
    
                <div class="table-wrapper table-responsive-md w-auto">
                <!--Table-->
                <table id="datatable1" class="table table-hover mb-0">
    
                    <!--Table head-->
                    <thead>
                    <tr>
                        <th class="th-md">ID.</th>
                        <th class="th-md">Nama Pelapor</th>
                        <th class="th-md">Jenis</th>
                        <th class="th-md">Tanggal Pengaduan</th>
                        <th class="th-md">Tanggapan</th>
                        <th class="th-md">Action</th>
                    </tr>
                    </thead>
                    <!--Table head-->
    
                    <!--Table body-->
                    <tbody>
                    @foreach ($data as $dt)
                    <tr>
                        <td>{{$dt ->id_pengaduan}}</td>
                        <td>{{$dt ->getUser->nama}}</td>
                        <td>{{$dt ->getJenis->nama}}</td>
                        <td>{{$dt ->tgl_pengaduan}}</td>
                        @if ($dt ->status != "proses")
                        <td>Sudah Ditanggapi</td>
                        @else
                        <td>Belum Ditanggapi <span class="badge badge-warning">WARNING</span></td>
                        @endif
                        <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-purple btn-sm">Action</button>
                            <button type="button"
                            class="btn btn-purple btn-sm text-white dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            data-reference="parent">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                <a class="dropdown-item" href="{{route('pengaduan.show',$dt->id_pengaduan)}}"><i
                                    class="fas fa-info mr-1"></i> Detail</a>
                                @if ($dt->status == 'proses')
                                <a class="dropdown-item" href="{{route('tanggapan.create',$dt->id_pengaduan)}}"><i
                                    class="fas fa-eye mr-1"></i> Tanggapi</a>
                                @else
                                
                                @endif
                                <a href="#" class="dropdown-item hapus" link="pengaduan" hapus-id="{{$dt ->id_pengaduan}}"><i
                                class="fas fa-trash mr-1"></i> Delete</a>
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
    $(document).ready(function () {
        $('#datatable1').DataTable({
            "order": [[ 0, "desc" ]]
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>
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
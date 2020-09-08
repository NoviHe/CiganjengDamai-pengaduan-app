@extends('layouts.admin.master')
@section('title', 'Input Data Tanggapan ')
@section('content')
<div class="container-fluid">
    <div class="card animated fadeInUp">
        <h5 class="card-header purple white-text text-center py-4">
        <strong>Tanggapan</strong>
        </h5>
        <!--Card content-->
        <div class="card-body px-lg-5">
            <h5>Isi Laporan</h5>
            <div class="md-form">
                <textarea id="materialContactFormMessage" class="form-control md-textarea" rows="3"
                    disabled>{{$data ->isi_laporan}}</textarea>
                <label for="materialContactFormMessage">Keterangan</label>
            </div>
            <hr>
            <h5>Tanggapan</h5>
            <!-- Form -->
        <form class="text-center" style="color: #757575;" method="POST" action="{{route('tanggapan.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="md-form">
                <select name="status" class="mdb-select md-form @error('status') is-invalid @enderror">
                    <option disabled selected>Status</option>
                    <option value="selesai">Diterima</option>
                    <option value="0">Ditolak</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <input type="hidden" name="id_petugas" value="{{Auth::id()}}">
                <input type="hidden" name="id_pengaduan" value="{{$id_pengaduan}}">
                <input type="hidden" name="tgl_tanggapan" value="{{date('Y-m-d')}}">
            <div class="md-form mt-4">
                <textarea name="tanggapan" id="materialContactFormMessage" 
                class="form-control md-textarea @error('tanggapan') is-invalid @enderror" rows="3"></textarea>
                <label for="materialContactFormMessage">Tanggapan</label>
                @error('tanggapan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
                <!-- Sign in button -->
                <button class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Kirim Tanggapan
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
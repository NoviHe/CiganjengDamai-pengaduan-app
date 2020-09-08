@extends('layouts.user.master')
@section('title', 'Buat Laporan ')
@section('content')
<section class="section pb-5 wow fadeIn" data-wow-delay="0.3s">
    <div class="row">
        <div class="col-md-12  animated fadeInUp ">
            <!-- Table with panel -->
            <br>
            <div class="card card-cascade narrower">
    
            <!--Card image-->
            <div
                class="view view-cascade gradient-card-header purple narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
    
                <a href="" class="white-text mx-3">Form Pengaduan</a>
    
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="fas fa-info-circle mt-0"></i>
                </button>
    
            </div>
            <!--/Card image-->
                <div class="card-body px-lg-5 pt-0">
                    
                    <!-- Form -->
                    <form role="form" action="{{route('pengaduan.store')}}" method="POST" class="text-center"
                        style="color: #757575;" enctype="multipart/form-data"> 
                        {{ csrf_field() }}
                        <input type="hidden" name="nik" value="{{Auth::guard('masyarakat')->user()->nik}}">
                        <div class="md-form">
                            <textarea rows="3" name="isi_laporan" id="materialContactFormMessage" class="form-control md-textarea"
                            value="{{ old('isi_laporan')}}" required></textarea>
                            <label for="materialContactFormMessage">Ketik Pengaduan Anda...</label>
                        </div>

                        <div class="md-form">
                            <select name="jenis" class="mdb-select md-form colorful-select dropdown-primary" required>
                                <option value="{{ old('jenis')}}" disabled selected>Jenis Pengaduan</option>
                                @foreach ($jenis as $j)
                                <option value="{{$j ->id_jenis}}">{{$j ->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form">
                            <input placeholder="Plih Tanggal..." name="tgl_pengaduan" type="date" id="date-picker-example"
                            class="form-control datepicker @error('tgl_pengaduan') is-invalid @enderror" value="{{ old('tgl_pengaduan')}}">
                            @error('tgl_pengaduan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <div class="btn purple btn-sm float-left">
                                    <span class="white-text"><i class="fas fa-cloud-upload-alt mr-2 white-text"
                                        aria-hidden="true"></i>Pilih File</span>
                                    <input name="foto" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate @error('foto') is-invalid @enderror" type="text" placeholder="Upload Foto Bukti...">
                                </div>
                            </div>
                            @error('foto')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect"
                        type="submit">Kirim</button>
                    </form>
                    <!-- Form -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>
<script>
    $('.datepicker').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd'
  //     hiddenPrefix: 'prefix__',
  // hiddenSuffix: '__suffix'
    });
</script>
@endpush
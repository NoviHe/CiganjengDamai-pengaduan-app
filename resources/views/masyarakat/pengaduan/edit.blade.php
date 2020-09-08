@extends('layouts.user.master')
@section('title', 'Edit Laporan ')
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
                    <form role="form" action="{{route('pengaduan.update',$data->id_pengaduan)}}" method="POST" class="text-center"
                        style="color: #757575;" enctype="multipart/form-data"> 
                        @method('put')
                        {{ csrf_field() }}
                        <input type="hidden" name="nik" value="{{old('nik',$data->nik)}}">
                        <div class="md-form">
                            <textarea rows="3" name="isi_laporan" id="materialContactFormMessage" class="form-control md-textarea"
                            value="{{ old('isi_laporan')}}" required>{{old('isi_laporan',$data->isi_laporan)}}</textarea>
                            <label for="materialContactFormMessage">Ketik Pengaduan Anda...</label>
                        </div>

                        <div class="md-form">
                            @php
                                $val = old('jenis',$data->id_jenis);
                            @endphp
                            <select name="jenis" class="mdb-select md-form colorful-select dropdown-primary" required>
                                <option value="{{ old('jenis')}}" disabled selected>Jenis Pengaduan</option>
                                @foreach ($jenis as $j)
                                <option value="{{$j->id_jenis}}" {{$val=="$j->id_jenis"?'selected':''}}>{{$j->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form">
                            <input placeholder="Plih Tanggal..." name="tgl_pengaduan" type="date" id="date-picker-example"
                            class="form-control datepicker @error('tgl_pengaduan') is-invalid @enderror" value="{{ old('tgl_pengaduan',$data->tgl_pengaduan)}}">
                            @error('tgl_pengaduan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-outline-purple btn-rounded btn-block z-depth-0 my-4 waves-effect"
                        type="submit">Update</button>
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
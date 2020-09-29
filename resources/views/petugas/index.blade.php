@extends('layouts.admin.master')
@section('title', 'Beranda ')
@section('content')
<div class="container-fluid">

    <!-- Section: Intro -->
    <section class="mt-md-4 pt-md-2 mb-5 pb-4">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <!-- Card Data -->
                <div class="admin-up">
                    <i class="far fa-edit primary-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase">pengaduan</p>
                        <h4 class="font-weight-bold dark-grey-text">{{$pengaduan->count()}}</h4>
                    </div>
                </div>

                <!-- Card content -->
                {{-- <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Better than last week (25%)</p>
                </div> --}}

            </div>
            <!-- Card -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <!-- Card Data -->
                <div class="admin-up">
                <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                <div class="data">
                    <p class="text-uppercase">user baru</p>
                    <h4 class="font-weight-bold dark-grey-text">{{$newUser->count()}}</h4>
                </div>
                </div>

                <!-- Card content -->
                {{-- <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                    <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Worse than last week (25%)</p>
                </div> --}}

            </div>
            <!-- Card -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <!-- Card Data -->
                <div class="admin-up">
                <i class="fas fa-users light-blue lighten-1 mr-3 z-depth-2"></i>
                <div class="data">
                    <p class="text-uppercase">total user</p>
                    <h4 class="font-weight-bold dark-grey-text">{{$masyarakat->count()}}</h4>
                </div>
                </div>

                <!-- Card content -->
                {{-- <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                    <div class="progress-bar red accent-2" role="progressbar" style="width: 75%" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Worse than last week (75%)</p>
                </div> --}}

            </div>
            <!-- Card -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6 mb-0">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <!-- Card Data -->
                <div class="admin-up">
                <i class="fas fa-user red accent-2 mr-3 z-depth-2"></i>
                <div class="data">
                    <p class="text-uppercase">data petugas</p>
                    <h4 class="font-weight-bold dark-grey-text">{{$petugas->count()}}</h4>
                </div>
                </div>

                <!-- Card content -->
                {{-- <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Better than last week (25%)</p>
                </div> --}}

            </div>
            <!-- Card -->

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </section>
    <!-- Section: Intro -->

    <!-- Section: Analytical panel -->
    <section class="mt-md-4 pt-md-2 mb-5">

        <!-- Card -->
        <div class="card card-cascade narrower">

            <!-- Section: Chart -->
            <section>

                <!-- Grid row -->
                <div class="row">

                <!-- Grid column -->
                <div class="col-xl-5 col-md-12 mr-0">

                    <!-- Card image -->
                    <div class="view view-cascade gradient-card-header purple">
                    <h2 class="h2-responsive mb-0 font-weight-bold">Traffic</h2>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade pb-0">

                    <!-- Panel data -->
                    <div class="row card-body pt-3">

                        <!-- First column -->
                        <div class="col-md-12">

                        </div>
                        <!-- First column -->

                    </div>
                    <!-- Panel data -->

                    </div>
                    <!-- Card content -->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-xl-7 col-md-12 mb-4">

                    <!-- Chart -->
                    <div class="view view-cascade gradient-card-header purple">

                    <canvas id="traffic" height="170px"></canvas>

                    </div>

                </div>
                <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </section>
            <!-- Section: Chart -->

        </div>
        <!-- Card -->

    </section>
    <!-- Section: Analytical panel -->

</div>
@endsection
@push('js')
    <script>

        // Material Select Initialization
        $(document).ready(function () {
            $('.mdb-select').material_select();
            });

        $(function () {
            var ctxB = document.getElementById("traffic").getContext('2d');
            var myBarChart = new Chart(ctxB, {
                type: 'line',
                data: {
                    labels: <?=$jsonDtBln;?>,
                    datasets: [{
                        label: '# Pengaduan',
                        data: <?=$jsonData?>,
                        backgroundColor: [
                        'rgba(255, 255, 255, 0.3)',
                        ],
                        borderColor: [
                        'rgba(255, 255, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                legend: {
                    labels: {
                    fontColor: "white"
                    }
                },
                scales: {
                    yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "white"
                    }
                    }],
                    xAxes: [{
                    ticks: {
                        fontColor: "white"
                    }
                    }]
                }
                }
            });

        });
    
    </script>
@endpush
@extends('layouts.master')
@section('title')
Dashboard | SI MANJA App v1.0
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-right">Total</span>
                            <h5 class="card-title mb-0">Data Anemia</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$anemia}} Anemia
                                </h2>
                            </div>
                            {{-- <div class="col-4 text-right">
                                <span class="text-muted">12.5% <i
                                        class="mdi mdi-arrow-up text-success"></i></span>
                            </div> --}}
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-right">Total</span>
                            <h5 class="card-title mb-0">Data Edukasi</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$edukasi}} Edukasi
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-right">Total</span>
                            <h5 class="card-title mb-0">Data Siswa</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$siswa}} Siswa
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div>
                <!--end card-->
            </div> <!-- end col-->

            
        </div>
        <!-- end row-->


        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="card-title">Analisis Riwayat Anemia</h4>
                                <p class="card-subtitle mb-4">Per Bulan Januari 2023 sampai Sekarang</p>
                                <div id="morris-bar-anemia" class="morris-chart"></div>
                            </div>

                            {{-- <div class="col-lg-4">

                                <h4 class="card-title">Data Anemia</h4>
                                <p class="card-subtitle mb-4">Data Anemia Terbaru</p>

                                <div class="text-center">
                                    <input data-plugin="knob" data-width="165" data-height="165"
                                        data-linecap=round data-fgColor="#7a08c2" value="1"
                                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                                        data-thickness=".15" />
                                    <h5 class="text-muted mt-3">Data Anemia hari ini </h5>


                                    <p class="text-muted w-75 mx-auto sp-line-2">Data Anemia diinput dan ditampilkan berdasarkan Tahun 2023,2024,dan 2025 </p>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                            <h4><i class="fas fa-arrow-up text-success mr-1"></i>$7.8k</h4>

                                        </div>
                                        <div class="col-6">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                            <h4><i class="fas fa-arrow-down text-danger mr-1"></i>$1.4k</h4>
                                        </div>

                                    </div>
                                </div>

                            </div> --}}
                        </div>
                    </div>
                    <!--end card body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edukasi Kesehatan Terakhir : </h4>
                        {{-- <p class="card-subtitle mb-4 font-size-13">Video Edukasi Kesehatan yang terakhir ditambahkan :
                        </p> --}}
                        
                         <!-- 16:9 aspect ratio -->
                         <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{$data_edukasi_terbaru->video_edukasi}}"></iframe>
                        </div>
                    </div>
                    <!--end card body-->

                </div>
                <!--end card-->
            </div>
        </div>
        <!--end row-->


        {{-- <div class="row">
         
            <!--end col-->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Top 5 Customers</h4>
                        <p class="card-subtitle mb-4 font-size-13">Transaction period from 21 July to 25 Aug
                        </p>

                        <div class="table-responsive">
                            <table class="table table-centered table-striped table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Create Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-4.jpg" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">Paul J. Friend</a>
                                        </td>
                                        <td>
                                            937-330-1634
                                        </td>
                                        <td>
                                            pauljfrnd@jourrapide.com
                                        </td>
                                        <td>
                                            New York
                                        </td>
                                        <td>
                                            07/07/2018
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-3.jpg" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">Bryan J. Luellen</a>
                                        </td>
                                        <td>
                                            215-302-3376
                                        </td>
                                        <td>
                                            bryuellen@dayrep.com
                                        </td>
                                        <td>
                                            New York
                                        </td>
                                        <td>
                                            09/12/2018
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-8.jpg" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">Kathryn S. Collier</a>
                                        </td>
                                        <td>
                                            828-216-2190
                                        </td>
                                        <td>
                                            collier@jourrapide.com
                                        </td>
                                        <td>
                                            Canada
                                        </td>
                                        <td>
                                            06/30/2018
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-1.jpg" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">Timothy Kauper</a>
                                        </td>
                                        <td>
                                            (216) 75 612 706
                                        </td>
                                        <td>
                                            thykauper@rhyta.com
                                        </td>
                                        <td>
                                            Denmark
                                        </td>
                                        <td>
                                            09/08/2018
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-5.jpg" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">Zara Raws</a>
                                        </td>
                                        <td>
                                            (02) 75 150 655
                                        </td>
                                        <td>
                                            austin@dayrep.com
                                        </td>
                                        <td>
                                            Germany
                                        </td>
                                        <td>
                                            07/15/2018
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--end card body-->

                </div>
                <!--end card-->
            </div>
            <!--end col-->

        </div> --}}
        <!--end row-->

    </div> <!-- container-fluid -->
</div>
@section('plugins-or-somting-else')
    <!-- Script for Chart-->
    <script>
        $(function() {
        'use strict';
        if ($("#morris-bar-anemia").length) {
            Morris.Bar({
            element: 'morris-bar-anemia',
            barColors: ['#ebeef1', '#00c2b2'],
            data: [
                {
                y: '2023',
                a: {{$riwayat_tidak_2023}},
                b: {{$riwayat_pernah_2023}}
                },
                {
                y: '2024',
                a: {{$riwayat_tidak_2024}},
                b: {{$riwayat_pernah_2024}}
                },
                {
                y: '2025',
                a: {{$riwayat_tidak_2025}},
                b: {{$riwayat_pernah_2025}}
                }
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            hideHover: 'auto',
            gridLineColor: '#eef0f2',
            resize: true,
            barSizeRatio: 0.4,
            labels: ['Tidak Pernah', 'Pernah']
            });
        }
        
        });
    </script>
@endsection
@stop

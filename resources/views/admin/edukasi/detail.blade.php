@extends('layouts.master')

@section('title')
Detail Edukasi | {{$data_edukasi->slug}} | Anemia Tracker App v1.0
@endsection

@section('plugins')
    <link href="{{asset('template/dashboard/vertical/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/plugins/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/plugins/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/plugins/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/plugins/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Dashboard <a href="/admin/edukasi" class="btn btn-success btn-rounded btn-sm">Kembali <i class="mdi mdi-arrow-left-bold-box"></i></a> </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item ">Dashboard</li>
                            <li class="breadcrumb-item active">Edukasi</li>
                            <li class="breadcrumb-item active">Detail</li>

                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mt-0 mb-1">{{$data_edukasi->judul_edukasi}}</h3>
                                <br>
                                {{$data_edukasi->detail_edukasi}}
                            </div>
                        </div> 
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
            <div class="col-2">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Link Dokumen :</h5>
                                <br>
                                <a href="{{$data_edukasi->dokumen_edukasi}}" target="_blank" class="btn btn-warning btn-lg waves-effect waves-light"><i class="mdi mdi-file-eye"></i> Lihat Dokumen</a>
                            </div>
                        </div> 
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
        
                        <h4 class="card-title">Video Edukasi : </h4>
                        <br>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{$data_edukasi->video_edukasi}}"></iframe>
                        </div>
                        <br>
                        <p class="card-subtitle mb-4">Sumber Video : <code>{{$data_edukasi->video_edukasi}}</code></p>
                        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->

            </div> <!-- end col -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Poster Edukasi : </h4>
                        <br>
                        {{-- <p class="card-subtitle mb-4">Here’s a carousel with slides only.
                                Note the presence of the <code>.d-block</code>
                                and <code>.img-fluid</code> on carousel images
                                to prevent browser default image alignment.</p> --}}

                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="/poster/{{$data_edukasi->poster_edukasi}}" alt="First slide">
                                </div>
                            </div>
                        </div>
        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
 
    </div> <!-- container-fluid -->
</div>
@endsection
@section('plugins-or-somting-else')

     <!-- Validation custom js-->
     <script src="{{asset('template/dashboard/vertical/assets/pages/validation-demo.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('template/dashboard/vertical/assets/pages/advanced-plugins-demo.js')}}"></script>

@endsection
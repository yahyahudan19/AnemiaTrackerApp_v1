@extends('layouts.master')

@section('title')
Edukasi Management | SI MANJA App v1.0
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
                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Siswa</a></li>
                            <li class="breadcrumb-item ">Dashboard</li>
                            <li class="breadcrumb-item active">Edukasi</li>

                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-right">Video</span>
                            <h5 class="card-title mb-0">Edukasi Tersedia : </h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$jml_edukasi}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->


        </div>
        <!-- end row-->


        <!-- Data Edukasi Kesehatan Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Data Edukasi Kesehatan</h4>
                        <p class="card-subtitle mb-4">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta eum inventore, cum sequi cupiditate ipsa, 
                            soluta veritatis consequuntur vitae iure maxime consectetur tenetur alias magni. Nihil tempore ratione officiis soluta.
                        </p>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Poster</th>
                                    {{-- <th>Video</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data_edukasi as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->judul_edukasi}}</td>
                                    <td>
                                        <img src="/poster/{{$data->poster_edukasi}}" alt="image"
                                        class="img-fluid img-thumbnail" width="500"/>
                                    </td>
                                    {{-- <td>
                                        <a href="{{$data->video_edukasi}}" target="_blank" class="btn btn-success btn-rounded btn-sm"><i class="mdi mdi-youtube"></i>Lihat Video</a> 
                                    </td> --}}
                                    <td>
                                        <a href="/siswa/edukasi/{{$data->slug}}" class="btn btn-success btn-rounded btn-sm">Detail <i class="mdi mdi-eye-circle"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
@section('plugins-or-somting-else')

     <!-- third party js -->
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/dataTables.responsive.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/dataTables.buttons.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/buttons.html5.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/buttons.flash.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/buttons.print.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/dataTables.select.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/pdfmake.min.js')}}"></script>
     <script src="{{asset('template/dashboard/vertical/plugins/datatables/vfs_fonts.js')}}"></script>
     <!-- third party js ends -->
 
     <!-- Datatables init -->
     <script src="{{asset('template/dashboard/vertical/assets/pages/datatables-demo.js')}}"></script>
     
     <!-- Validation custom js-->
     <script src="{{asset('template/dashboard/vertical/assets/pages/validation-demo.js')}}"></script>

     <!-- Plugins js -->
    <script src="{{asset('template/dashboard/vertical/plugins/autonumeric/autoNumeric-min.js')}}"></script>
    <script src="{{asset('template/dashboard/vertical/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('template/dashboard/vertical/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('template/dashboard/vertical/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('template/dashboard/vertical/plugins/select2/select2.min.js')}}"></script>
    
    <!-- Custom Js -->
    <script src="{{asset('template/dashboard/vertical/assets/pages/advanced-plugins-demo.js')}}"></script>


@endsection
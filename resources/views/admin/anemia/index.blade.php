@extends('layouts.master')

@section('title')
Anemia Management | Anemia Tracker App v1.0
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item ">Dashboard</li>
                            <li class="breadcrumb-item active">Anemia</li>

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
                            <span class="badge badge-soft-primary float-right">Siswa</span>
                            <h5 class="card-title mb-0">Jumlah Siswa</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$jml_siswa}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-right">Anemia</span>
                            <h5 class="card-title mb-0">Jumlah data Anemia</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$jml_anemia}}
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

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-warning float-right">Tambah, Export atau Import </span>
                            <h5 class="card-title mb-0">Action :</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-6">
                            <div class="col-4">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalTambahAnemia"><i class="mdi mdi-library-plus"></i>Tambah Data</button>
                                </h2>
                            </div>
                            <div class="col-4">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-file-excel-box"></i>Export Data</button>
                                </h2>
                            </div>
                            <div class="col-4">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-file-excel"></i>Import Data</button>
                                </h2>
                            </div>
                        </div>
                        <br>
                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

        </div>
        <!-- end row-->

        <!-- Modal -->
        <div class="modal fade" id="modalTambahAnemia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Anemia</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="POST" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                  <label for="validationCustom01">Pilih Siswa</label>
                                  <select class="form-control" data-toggle="select2">
                                      <option>Select</option>
                                      @foreach ($data_siswa as $siswa)
                                        <option value="{{$siswa->id_siswa}}">{{$siswa->nama_siswa}}</option>
                                      @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Tinggi Badan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroupPrepend">cm</span>
                                        </div>
                                        <input type="text" class="form-control" id="tinggi_anemia" name="tinggi_anemia" placeholder="Tinggi Badan" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                  </div>
  
                                  <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Berat Badan</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">Kg</span>
                                      </div>
                                      <input type="text" class="form-control" id="berat_anemia" name="berat_anemia" placeholder="Berat Badan" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                  </div>
                                <div class="col-md-6 mb-3">
                                  <label for="validationTooltip03">Riwayat Anemia</label>
                                    <select class="form-control" id="riwayat_anemia" name="riwayat_anemia">
                                        <option value="Pernah">Pernah</option>
                                        <option value="Tidak Pernah">Tidak Pernah</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="validationTooltip04">Pernah Minum Obat Anemia</label>
                                    <select class="form-control" id="minum_anemia" name="minum_anemia">
                                        <option value="Pernah">Pernah</option>
                                        <option value="Tidak Pernah">Tidak Pernah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Submit Form</button>
                            </div>
                          </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Data Anemia Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Data Anemia Siswa</h4>
                        <p class="card-subtitle mb-4">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta eum inventore, cum sequi cupiditate ipsa, 
                            soluta veritatis consequuntur vitae iure maxime consectetur tenetur alias magni. Nihil tempore ratione officiis soluta.
                        </p>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tinggi (cm)</th>
                                    <th>Berat (Kg)</th>
                                    <th>Riwayat Anemia</th>
                                    <th>Minum Obat Anemia</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data_anemia as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->siswa->nama_siswa}}</td>
                                    <td>{{$data->tinggi_anemia}} cm</td>
                                    <td>{{$data->berat_anemia}} Kg</td>
                                    <td>{{$data->riwayat_anemia}}</td>
                                    <td>{{$data->minum_anemia}}</td>
                                    <td>
                                        <button class="btn btn-success btn-rounded btn-sm">Detail <i class="mdi mdi-eye-circle"></i></button>
                                        <button class="btn btn-danger btn-rounded btn-sm">Hapus <i class="mdi mdi-trash-can"></i></button>
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
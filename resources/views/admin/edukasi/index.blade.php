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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
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
                            <h5 class="card-title mb-0">Jumlah data Edukasi</h5>
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

            <div class="col-md-6 col-xl-2">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-warning float-right">Tambah Data</span>
                            <h5 class="card-title mb-0">Action :</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-12">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalTambahEdukasi"><i class="mdi mdi-library-plus"></i>Tambah Data</button>
                                </h2>
                            </div>
                            {{-- <div class="col-4">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-file-excel-box"></i>Export Data</button>
                                </h2>
                            </div>
                            <div class="col-4">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-file-excel"></i>Import Data</button>
                                </h2>
                            </div> --}}
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

        <!-- Modal Create Edukasi -->
        <div class="modal fade" id="modalTambahEdukasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Edukasi Kesehatan</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="/admin/edukasi/create" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Judul Edukasi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="judul_edukasi" name="judul_edukasi" placeholder="Judul Edukasi" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Detail Edukasi</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="detail_edukasi" name="detail_edukasi" rows="3" placeholder="Detail Edukasi"></textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Link Video </label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="video_edukasi" name="video_edukasi" placeholder="https://www.youtube.com/watch?v=linkvideosepertiini" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Link Dokumen </label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="dokumen_edukasi" name="dokumen_edukasi" placeholder="https://linkpdfnya.com" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Upload Poster </label>
                                    <div class="input-group">
                                        <input type="file" class="dropify" data-height="200" id="poster_edukasi" name="poster_edukasi" required/>
                                    </div>
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

        <!-- Modal Edit Edukasi -->
        <div class="modal fade" id="modalEditEdukasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Edukasi Kesehatan</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="/admin/edukasi/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" class="form-control form-control" id="id_edukasi" name="id_edukasi_update" value="" required>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Judul Edukasi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="judul_edukasi" name="judul_edukasi" placeholder="Judul Edukasi" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Detail Edukasi</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="detail_edukasi" name="detail_edukasi" rows="3"></textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Link Video </label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="video_edukasi" name="video_edukasi" placeholder="https://www.youtube.com/watch?v=linkvideosepertiini" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Link Dokumen </label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="dokumen_edukasi" name="dokumen_edukasi" placeholder="https://linkpdfnya.com" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Upload Poster </label>
                                    <div class="input-group">
                                        <input type="file" class="dropify" data-height="200" id="poster_edukasi" name="poster_edukasi"/>
                                    </div>
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
                                    <th>Tanggal</th>
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
                                        class="img-fluid img-thumbnail" width="100"/>
                                    </td>
                                    {{-- <td>
                                        <a href="{{$data->video_edukasi}}" target="_blank" class="btn btn-success btn-rounded btn-sm"><i class="mdi mdi-youtube"></i>Lihat Video</a> 
                                    </td> --}}
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id_ID')->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td>
                                        <a href="/admin/edukasi/{{$data->slug}}" class="btn btn-success btn-rounded btn-sm">Detail <i class="mdi mdi-eye-circle"></i></a>
                                        <button id="editEdukasi" data-id="{{$data->id_edukasi}}" data-toggle="modal" data-target="#modalEditEdukasi" class="btn btn-warning btn-rounded btn-sm">Edit <i class="mdi mdi-circle-edit-outline"></i></button>
                                        <a href="/admin/edukasi/delete/{{$data->slug}}" class="btn btn-danger btn-rounded btn-sm">Hapus <i class="mdi mdi-trash-can"></i></a>
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

    <!-- JS for Detail Anemia -->
    <script>
        $('body').on('click', '#editEdukasi', function (event) {
                event.preventDefault();
                var token = $("input[name='_token']").val();
                var id = $(this).data('id');
                // console.log(id)
                // console.log(token)
                $.ajax({
                    url: "<?php echo route('getEdukasiID') ?>",
                    method: 'POST',
                    data: {id_edukasi:id, _token:token},
                    success: function(data) {
                        $("input[name='id_edukasi_update']").val(data.edukasi.id_edukasi);
                        $("input[name='judul_edukasi']").val(data.edukasi.judul_edukasi);
                        $("input[name='video_edukasi']").val(data.edukasi.video_edukasi);
                        $("input[name='dokumen_edukasi']").val(data.edukasi.dokumen_edukasi);
                        $("textarea[name='detail_edukasi']").val(data.edukasi.detail_edukasi);
                    }
                });
        });

    </script>

@endsection
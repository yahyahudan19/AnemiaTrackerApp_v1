@extends('layouts.master')

@section('title')
Siswa Management | SI MANJA App v1.0
@endsection

@section('plugins')
    <link href="{{asset('template/dashboard/vertical/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/plugins/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/plugins/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/plugins/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">User Management</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">User management</li>

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
                                   {{$jumlah_siswa}}
                                </h2>
                            </div>
                            <div class="col-4 text-right">
                                <span class="text-muted">12.5% <i
                                        class="mdi mdi-arrow-up text-success"></i></span>
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

            {{-- <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-right">Anemia</span>
                            <h5 class="card-title mb-0">Jumlah data Anemia</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    $1875.54
                                </h2>
                            </div>
                            <div class="col-4 text-right">
                                <span class="text-muted">18.71% <i
                                        class="mdi mdi-arrow-down text-danger"></i></span>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col--> --}}

            <div class="col-md-6 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-warning float-right">Tambah, Export atau Import </span>
                            <h5 class="card-title mb-0">Action :</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-6">
                            <div class="col-4">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalTambahSiswa"><i class="mdi mdi-library-plus"></i>Tambah Data</button>
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

        <!-- Modal Create Siswa -->
        <div class="modal fade" id="modalTambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Siswa</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="/admin/siswa/create" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Username</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="username" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">NIS Siswa</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nis_siswa" name="nis_siswa" placeholder="Contoh : 14045" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="validationCustom02">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Umur</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="umur_siswa" name="umur_siswa" placeholder="20" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Alamat Siswa</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="alamat_siswa" name="alamat_siswa" rows="3" placeholder="Alamat Siswa" required></textarea>
                                    </div>
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Jenis Kelamin </label>
                                    <div class="input-group">
                                        <select class="form-control" data-toggle="select2" id="jenisk_siswa" name="jenisk_siswa" required>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                      </select>
                                    </div>
                                </div>  
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Tempat Tanggal Lahir</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="ttl_siswa" name="ttl_siswa" placeholder="Malang, 31 Maret 2000" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                </div>  
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Nama Ayah </label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="ayah_siswa" name="ayah_siswa" placeholder="Nama Ayah Siswa" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                </div>  
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Nama Ibu </label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="ibu_siswa" name="ibu_siswa" placeholder="Nama Ibu Siswa" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
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

        <!-- Modal Edit Siswa -->
        <div class="modal fade" id="modalEditSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Detail & Update Siswa</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="/admin/siswa/update" method="POST">
                            @csrf
                            @method('PUT')                            
                            <div class="form-row">
                                <input type="hidden" class="form-control form-control" id="id_siswa" name="id_siswa_update" value="" required>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Username</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="username" name="username_update" placeholder="username" aria-describedby="inputGroupPrepend" required disabled>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Silahkan Cek Menu User" aria-describedby="inputGroupPrepend" required disabled>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">NIS Siswa</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nis_siswa" name="nis_siswa_update" placeholder="Contoh : 14045" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="validationCustom02">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa_update" placeholder="Nama Siswa" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Umur</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="umur_siswa" name="umur_siswa_update" placeholder="20" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Alamat Siswa</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="alamat_siswa" name="alamat_siswa_update" rows="3" placeholder="Alamat Siswa" required></textarea>
                                    </div>
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Jenis Kelamin </label>
                                    <div class="input-group">
                                        <select class="form-control" data-toggle="select2" id="jenisk_siswa_update" name="jenisk_siswa" required>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                      </select>
                                    </div>
                                </div>  
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Tempat Tanggal Lahir</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="ttl_siswa" name="ttl_siswa_update" placeholder="Malang, 31 Maret 2000" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                </div>  
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Nama Ayah </label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="ayah_siswa" name="ayah_siswa_update" placeholder="Nama Ayah Siswa" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                </div>  
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Nama Ibu </label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="ibu_siswa" name="ibu_siswa_update" placeholder="Nama Ibu Siswa" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                         Silahkan di isi terlebih dahulu !
                                      </div>
                                    </div>
                                </div>  
                                  
                            </div>
                            <div class="form-group">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
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

                        <h4 class="card-title">Data Siswa</h4>
                        <p class="card-subtitle mb-4">
                            The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                            that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                        </p>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    {{-- <th>Alamat</th> --}}
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Nama Ibu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data_siswa as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nis_siswa}}</td>
                                    <td>{{$data->nama_siswa}}</td>
                                    <td>{{$data->ttl_siswa}}</td>
                                    {{-- <td>{{$data->alamat_siswa}}</td> --}}
                                    <td>{{$data->jenisk_siswa}}</td>
                                    <td>{{$data->umur_siswa}} Tahun</td>
                                    <td>{{$data->ibu_siswa}}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-success btn-rounded btn-sm">Detail <i class="mdi mdi-eye-circle"></i></a> --}}
                                        <button id="editSiswa" data-id="{{$data->id_siswa}}" data-toggle="modal" data-target="#modalEditSiswa" class="btn btn-warning btn-rounded btn-sm">Edit <i class="mdi mdi-circle-edit-outline"></i></button>
                                        <a href="/admin/siswa/delete/{{$data->id_siswa}}" class="btn btn-danger btn-rounded btn-sm">Hapus <i class="mdi mdi-trash-can"></i></a>
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

     <!-- JS for Detail Siswa -->
    <script>
        $('body').on('click', '#editSiswa', function (event) {
                event.preventDefault();
                var token = $("input[name='_token']").val();
                var id = $(this).data('id');
                // console.log(id)
                // console.log(token)
                $.ajax({
                    url: "<?php echo route('getSiswaID') ?>",
                    method: 'POST',
                    data: {id_siswa:id, _token:token},
                    success: function(data) {
                        // console.log(data)
                        $("input[name='username_update']").val(data.user.username);
                        $("input[name='id_siswa_update']").val(data.siswa.id_siswa);
                        $("input[name='nama_siswa_update']").val(data.siswa.nama_siswa);
                        $("input[name='nis_siswa_update']").val(data.siswa.nis_siswa);
                        $("input[name='umur_siswa_update']").val(data.siswa.umur_siswa);
                        $("input[name='ttl_siswa_update']").val(data.siswa.ttl_siswa);
                        $("textarea[name='alamat_siswa_update']").val(data.siswa.alamat_siswa);
                        $("input[name='ayah_siswa_update']").val(data.siswa.ayah_siswa);
                        $("input[name='ibu_siswa_update']").val(data.siswa.ibu_siswa);
                        $("select[name='jenisk_update']").val(data.siswa.jenisk).change();
                        
                    }
                });
        });

    </script>
@endsection
@extends('layouts.master')

@section('title')
User Management | SI MANJA App v1.0
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
                            <span class="badge badge-soft-primary float-right">User</span>
                            <h5 class="card-title mb-0">Jumlah User</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$jumlah_user}}
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

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-warning float-right">Tambah, Export atau Import </span>
                            <h5 class="card-title mb-0">Action :</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            {{-- <div class="col-6">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-library-plus"></i>Tambah Data</button>
                                </h2>
                            </div> --}}
                            <div class="col-6">
                                <h2 class="d-flex align-items-center mb-0">
                                    <button type="button" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-file-excel-box"></i>Export Data</button>
                                </h2>
                            </div>
                            {{-- <div class="col-4">
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

        <!-- Modal Edit User -->
        <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Detail & Update User</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="/admin/user/update" method="POST">
                            @csrf
                            @method('PUT')                            
                            <div class="form-row">
                                <input type="hidden" class="form-control form-control" id="id" name="id_update" value="" required>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email@anemiatracker.app" aria-describedby="inputGroupPrepend" required disabled>
                                        <div class="invalid-feedback">
                                          Silahkan di isi terlebih dahulu !
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Username</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="username" aria-describedby="inputGroupPrepend" required disabled>
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

        <!-- Data User Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Data User </h4>
                        <p class="card-subtitle mb-4">
                            The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                            that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                        </p>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    {{-- <th>Role</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data_user as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->username}}</td>
                                    {{-- <td>{{$data->role}}</td> --}}
                                    <td>
                                        <button id="editUser" data-id="{{$data->id}}" data-toggle="modal" data-target="#modalEditUser" class="btn btn-warning btn-rounded btn-sm">Edit <i class="mdi mdi-circle-edit-outline"></i></button>
                                        <a href="/admin/user/delete/{{$data->id}}" class="btn btn-danger btn-rounded btn-sm">Hapus <i class="mdi mdi-trash-can"></i></a>
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

    <!-- JS for Detail User -->
    <script>
        $('body').on('click', '#editUser', function (event) {
                event.preventDefault();
                var token = $("input[name='_token']").val();
                var id = $(this).data('id');
                // console.log(id)
                // console.log(token)
                $.ajax({
                    url: "<?php echo route('getUserID') ?>",
                    method: 'POST',
                    data: {id:id, _token:token},
                    success: function(data) {
                        // console.log(data)
                        $("input[name='id_update']").val(data.user.id);
                        $("input[name='username']").val(data.user.username);
                        $("input[name='email']").val(data.user.email);
                        
                    }
                });
        });

    </script>

@endsection
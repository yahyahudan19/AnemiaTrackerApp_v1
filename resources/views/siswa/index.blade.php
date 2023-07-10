@extends('layouts.master')
@section('title')
Dashboard | Anemia Tracker App v1.0
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
            <div class="col-md-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-right">Welcome</span>
                            <h5 class="card-title mb-0">Halo Selamat Datang ! </h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{auth()->user()->name}}
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

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-right">Total</span>
                            <h5 class="card-title mb-0">Edukasi Tersedia</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$edukasi}} Edukasi
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;">
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
                            <span class="badge badge-soft-primary float-right">Data Anemia Siswa</span>
                            <h5 class="card-title mb-0">Input Anemia</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                @if ($cekanemiasiswa == NULL)
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{-- Belum Input Data ! <i class="mdi mdi-file-document-box-remove"></i> --}}
                                        <a href="#" class="btn btn-danger waves-effect waves-light">Belum Input Data ! <i class="mdi mdi-file-document-box-remove"></i></a>
                                    </h2>
                                @else
                                    <h2 class="d-flex align-items-center mb-0">
                                        <a href="#" class="btn btn-success waves-effect waves-light">Sudah Input Data <i class="mdi mdi-check-underline-circle"></i></a>
                                        {{-- Sudah Input Data <i class="mdi mdi-check-underline-circle"></i> --}}
                                    </h2>                                
                                @endif
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            @if ($cekanemiasiswa == NULL)
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;">
                            @else
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;">
                            @endif
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->
            
        </div>
        <!-- end row-->


        <div class="row">
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

            @if ($cekanemiasiswa == NULL)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Anemia</h5>
                                </div>
                                <div class="modal-body">
                                <form action="/siswa/anemia/create" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    
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
                                        {{-- <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button> --}}
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                                    </div>
                                </form>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                
            @else
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Detail Data Anemia</h5>
                                </div>
                                <div class="modal-body">
                                <form action="/siswa/anemia/update" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" class="form-control form-control" id="id_anemia" name="id_anemia" value="{{$cekanemiasiswa->id_anemia}}" required>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Tinggi Badan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">cm</span>
                                                </div>
                                                <input type="text" class="form-control" id="tinggi_anemia" name="tinggi_anemia" placeholder="Tinggi Badan" value="{{$cekanemiasiswa->tinggi_anemia}}" aria-describedby="inputGroupPrepend" required>
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
                                            <input type="text" class="form-control" id="berat_anemia" name="berat_anemia" placeholder="Berat Badan" value="{{$cekanemiasiswa->berat_anemia}}" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Silahkan di isi terlebih dahulu !
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label for="validationTooltip03">Riwayat Anemia</label>
                                            <select class="form-control" id="riwayat_anemia" name="riwayat_anemia">
                                                <option value="Pernah" {{ $cekanemiasiswa->riwayat_anemia == 'Pernah' ? 'selected' : '' }}>Pernah</option>
                                                <option value="Tidak Pernah" {{ $cekanemiasiswa->riwayat_anemia == 'Tidak Pernah' ? 'selected' : '' }}>Tidak Pernah</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label for="validationTooltip04">Pernah Minum Obat Anemia</label>
                                            <select class="form-control" id="minum_anemia" name="minum_anemia">
                                                <option value="Pernah" {{ $cekanemiasiswa->minum_anemia == 'Pernah' ? 'selected' : '' }}>Pernah</option>
                                                <option value="Tidak Pernah" {{ $cekanemiasiswa->minum_anemia == 'Tidak Pernah' ? 'selected' : '' }}>Tidak Pernah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        {{-- <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button> --}}
                                        <button class="btn btn-warning waves-effect waves-light" type="submit">Update</button>
                                    </div>
                                </form>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                
            @endif
            
        </div>
        <!--end row-->



    </div> <!-- container-fluid -->
</div>

@stop

@extends('layouts.master')
@section('title')
Profile | Anemia Tracker App v1.0
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
            
                            <h4 class="card-title">Data Diri : </h4>
                            <p class="card-subtitle mb-4">Silahkan melakukan perubahan <code>Jika diperlukan !</code> </p>
                            
                            <form class="form-horizontal">
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama Lengkap : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">NIS : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="NIS">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">TTL : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="TTL">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Jenis Kelamin : </label>
                                    <div class="col-9">
                                        <select class="form-control" data-toggle="select2" id="jenisk_siswa" name="jenisk_siswa" required>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Umur : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Umur">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama Ayah : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Ayah">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama Ibu : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Ibu">
                                    </div>
                                </div>
                                <div class="form-group mb-0 justify-content-end row">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
               
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
            
                            <h4 class="card-title">Reset Password : </h4>
                            <p class="card-subtitle mb-4">Silahkan Masukkan Password lama dan Password <code>Baru 2 Kali</code></p>
                            
                            <form class="form-horizontal">
                                
                                <div class="form-group row mb-4">
                                    <label for="inputPassword3" class="col-4 col-form-label">Password Lama</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password Lama">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="inputPassword3" class="col-4 col-form-label">Password Baru</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password Baru">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="inputPassword5" class="col-4 col-form-label">Re Password Baru</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="inputPassword5" placeholder="Ulangi Password Baru">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="inputPassword5" class="col-4 col-form-label"></label>
                                    <div class="col-8">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
        </div>
    </div>
@stop
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
                            
                            <form class="form-horizontal" action="/siswa/profile/update" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama Lengkap : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{$data_siswa->nama_siswa}}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">NIS : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="nis_siswa" name="nis_siswa" placeholder="NIS" value="{{$data_siswa->nis_siswa}}" disabled required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">TTL : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="ttl_siswa" name="ttl_siswa" placeholder="TTL" value="{{$data_siswa->ttl_siswa}}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Jenis Kelamin : </label>
                                    <div class="col-9">
                                        <select class="form-control" data-toggle="select2" id="jenisk_siswa" name="jenisk_siswa" required required>
                                            <option {{ $data_siswa->jenisk_siswa == 'Laki-Laki' ? 'selected' : '' }} >Laki-Laki</option>
                                            <option {{ $data_siswa->jenisk_siswa == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Umur : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="umur_siswa" name="umur_siswa" placeholder="Umur" value="{{$data_siswa->umur_siswa}}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Alamat : </label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="alamat_siswa" name="alamat_siswa" placeholder="Alamat" required> {{$data_siswa->alamat_siswa}} </textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama Ayah : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputEmail3" name="ayah_siswa" placeholder="Nama Ayah" value="{{$data_siswa->ayah_siswa}}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama Ibu : </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="ibu_siswa" name="ibu_siswa" placeholder="Nama Ibu" value="{{$data_siswa->ibu_siswa}}" required>
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
                            <p class="card-subtitle mb-4">Silahkan Masukkan Password lama dan Password Baru 2 Kali dengan aturan : <br><code>Minimal 8 Karakter !</code></p>
                            
                            <form class="form-horizontal" action="/siswa/password/update" method="POST">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label for="inputPassword3" class="col-4 col-form-label">Password Lama</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Password Lama">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="inputPassword3" class="col-4 col-form-label">Password Baru</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="inputPassword5" class="col-4 col-form-label">Re Password Baru</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="password_re_baru" name="password_re_baru" placeholder="Ulangi Password Baru">
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
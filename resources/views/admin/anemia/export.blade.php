@extends('layouts.blank')

@section('title')
Export Anemia PDF | Anemia Tracker App v1.0
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        {{-- <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Starter</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Starter</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div> --}}
        <!-- end page title -->

         <!-- Data Anemia Table -->
         <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br><br><br>
                        <center><h4>Laporan Deteksi Anemia Remaja Tahun 2023</h4></center>
                        <br>
                        <p class="card-subtitle mb-4">
                            {{-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta eum inventore, cum sequi cupiditate ipsa, 
                            soluta veritatis consequuntur vitae iure maxime consectetur tenetur alias magni. Nihil tempore ratione officiis soluta. --}}
                        </p>

                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tinggi (cm)</th>
                                    <th>Berat (Kg)</th>
                                    <th>Riwayat Anemia</th>
                                    <th>Minum Obat Anemia</th>
                                    <th>Tanggal</th>
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
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id_ID')->isoFormat('dddd, D MMMM Y') }}</td>
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
<script>
    window.onload = function() {
        window.print(); // Memicu pencetakan halaman saat halaman dimuat
    };
</script>
@endsection
{{-- @stop --}}
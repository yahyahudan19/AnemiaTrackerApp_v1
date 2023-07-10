<?php

namespace App\Http\Controllers;

use App\Models\Anemia;
use App\Models\Edukasi;
use App\Models\Siswa;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    // ================ Dashboard Siswa ================ //
    // Views
    public function index(){

        $data_edukasi_terbaru = Edukasi::latest()->first();
        $edukasi = Edukasi::all()->count();
        $data_siswa = Siswa::where('user_id',auth()->user()->id)->get()->first();


        $cekanemiasiswa = Anemia::where('siswa_id',$data_siswa->id_siswa)->get()->first();

        return view('siswa.index',compact('data_edukasi_terbaru','edukasi','cekanemiasiswa'));
    }

    // ================ Anemia Management ================ // 

    // Update
    public function anemiaUpdate(Request $request){

        // dd($request->all());
        $anemia = Anemia::findOrFail($request->id_anemia);
        
        // dd($anemia);

        $anemia->update($request->all());

        Alert::success('Siap, Berhasil ! ','Data Anemia berhasil diupdate !');
        return redirect()->back();
    }
    // Add
    public function anemiaCreate(Request $request){
        // dd($request->all());

        $data_siswa = Siswa::where('user_id',auth()->user()->id)->get()->first();

        // Checkig Avaialable Data Anemia
        $anemia = Anemia::where('siswa_id', $data_siswa->siswa_id)->first();

        if($anemia == NULL){
            // If null create data
            $create = Anemia::create([
                "tinggi_anemia" => $request->tinggi_anemia,
                "berat_anemia" => $request->berat_anemia,
                "riwayat_anemia" => $request->riwayat_anemia,
                "minum_anemia" => $request->minum_anemia,
                "siswa_id" => $data_siswa->id_siswa,
            ]);

            if($create){
            // If Success
                Alert::success('Siap, Berhasil ! ','Data Anemia berhasil ditambahkan !');
                return redirect()->back();
            }
        }else{ 
            // If exist 
            Alert::error('Wah Gagal ! ','Data Anemia sudah Ada !');
            return redirect()->back();
        }
    }
    
    // ================ Edukasi ================ //
    // Views
    public function edukasiPage(){
        $data_edukasi = Edukasi::all();

        $jml_edukasi = Edukasi::all()->count();

        return view('siswa.edukasi.index',compact([
            'data_edukasi','jml_edukasi'
        ]));
    } 
    // Detail
    public function edukasiDetailPage($slug){

        $data_edukasi = Edukasi::where('slug',$slug)->get()->first();
        return view('siswa.edukasi.detail',compact('data_edukasi'));
    }

    // ================ Profile ================ // 
    // Views
    public function profilePage(){
        return view('siswa.profile.index');
    }
    //Update
    public function profileUpdate(){

    }
}

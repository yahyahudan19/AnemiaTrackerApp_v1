<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    // ================ Dashboard Siswa ================ //
    // Views
    public function index(){
        return view('siswa.index');
    }

    // ================ Anemia Management ================ // 
    // Views
    public function anemiaPage(){
        return view('siswa.anemia.index');
    }
    // Detail
    public function anemiaDetail(){
        return view('siswa.anemia.detail');
    }
    // Add
    public function anemiaAdd(Request $request){
        
        Alert::success('Siap, Berhasil ! ','Data Anemia berhasil ditambahkan !');
        return redirect()->back();
    }
    // Delete
    public function anemiaDelete($id_anemia){

        $data_anemia = Edukasi::find($id_anemia);

        try {
            $data_anemia->delete($data_anemia);
            Alert::success('Siap, Berhasil ! ','Data Anemia berhasil dihapus !');
            return redirect()->back();
        } catch (QueryException $e) {
            Alert::error('Wah Gagal ! ','Data Anemia Gagal dihapus !');
            return redirect()->back();
        }

    }
    // ================ Edukasi ================ //
    // Views
    public function edukasiPage(){
        return view('siswa.edukasi.index');
    } 
    // Detail
    public function edukasiDetail(){
        return view('siswa.edukasi.detail');
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

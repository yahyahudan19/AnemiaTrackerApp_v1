<?php

namespace App\Http\Controllers;

use App\Models\Anemia;
use App\Models\Edukasi;
use App\Models\Siswa;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDO;
use Pdf;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{   
    // ================ Dashboard Admin ================ //
    // Views 
    public function index(){
        return view('admin.index');
    }

    // ================  Anemia Management ================ // 
    // Views
    public function anemiaPage(){

        $jml_siswa = Siswa::all()->count();
        $jml_anemia = Anemia::all()->count();

        $data_anemia = Anemia::all();
        $data_siswa = Siswa::all();
        
        return view('admin.anemia.index', compact([
            'jml_siswa','jml_anemia','data_anemia',
            'data_siswa'
        ]));
    }
    // Detail
    public function anemiaDetail(){
        return view('admin.anemia.detail');
    }
    // Add 
    public function anemiaAdd(Request $request){
        
        Alert::success('Siap, Berhasil ! ','Data Anemia berhasil ditambahkan !');
        return redirect()->back();

        Alert::error('Wah Gagal ! ','Data Anemia Gagal ditambahkan !');
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
    // Export PDF
    public function anemiaExportPDF(){

       
    }

    // ================ Edukasi Management ================ // 
    //Views
    public function edukasiPage(){

        $data_edukasi = Edukasi::all();

        $jml_edukasi = Edukasi::all()->count();

        return view('admin.edukasi.index',compact([
            'data_edukasi','jml_edukasi'
        ]));
    }
     // Detail
     public function edukasiDetail(){
        return view('admin.edukasi.detail');
    }
    // Add
    public function edukasiAdd(Request $request){
        
        Alert::success('Siap, Berhasil ! ','Data Edukasi berhasil ditambahkan !');
        return redirect()->back();

        Alert::error('Wah Gagal ! ','Data Edukasi Gagal ditambahkan !');
        return redirect()->back();
    }
    // Delete
    public function edukasiDelete($id_edukasi){

        $data_edukasi = Edukasi::find($id_edukasi);

        try {
            $data_edukasi->delete($data_edukasi);
            Alert::success('Siap, Berhasil ! ','Data Edukasi berhasil dihapus !');
            return redirect()->back();
        } catch (QueryException $e) {
            Alert::error('Wah Gagal ! ','Data Edukasi Gagal dihapus !');
            return redirect()->back();
        }

    }

    // ================ User Management ================ // 
    // Views
    public function userPage(){
        return view('admin.user.index');
    }
    // Detail
    public function userDetail(){
        return view('admin.user.detail');
    }
    // Update
    public function userUpdate(){
        
    }
    // Delete
    public function userDelete(){

    }

    // ================ Siswa Management ================ // 
    // Views
    public function siswaPage(){
        return view('admin.siswa.index');
    }
    // Detail
    public function siswaDetail(){
        return view('admin.siswa.detail');
    }
    // Update
    public function siswaUpdate(){
        
    }
    // Delete
    public function siswaDelete(){

    }
}

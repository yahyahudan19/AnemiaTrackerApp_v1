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
   
    // Add 
    public function anemiaCreate(Request $request){

        // Checkig Avaialable Data Anemia
        $anemia = Anemia::where('siswa_id', $request->siswa_id)->first();

        if($anemia == NULL){
            // If null create data
            $create = Anemia::create($request->all());

            if($create){
            // If Success
                Alert::success('Siap, Berhasil ! ','Data Anemia berhasil ditambahkan !');
                return redirect()->back();
            }
        }else{ 
            // If exist 
            Alert::error('Wah Gagal ! ','Data Anemia Gagal ditambahkan !');
            return redirect()->back();
        }
        
    }
    // Get Detail Data
    public function anemiaDetail(Request $request){

        if ($request->ajax()) {
            $data_anemia = Anemia::findOrFail($request->id_anemia);
            $data_siswa = Siswa::findOrFail($data_anemia->siswa_id);
            return response()->json(['anemia' => $data_anemia,'siswa' => $data_siswa]);
        }
    }
    // Delete
    public function anemiaDelete($id_anemia){

        $data_anemia = Anemia::find($id_anemia);

        try {
            $data_anemia->delete($data_anemia);
            Alert::success('Siap, Berhasil ! ','Data Anemia berhasil dihapus !');
            return redirect()->back();
        } catch (QueryException $e) {
            Alert::error('Wah Gagal ! ','Data Anemia Gagal dihapus !');
            return redirect()->back();
        }

    }
    // Update 
    public function anemiaUpdate(Request $request){
        
        $id = $request->id_anemia_update;
        $anemia = Anemia::findOrFail($id);

        $anemia->update($request->all());

        Alert::success('Siap, Berhasil ! ','Data Anemia berhasil diupdate !');
        return redirect()->back();
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
    // Detail Views
    public function edukasiDetailPage(){

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
    public function userDetailPage(){
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
    public function siswaDetailPage(){
        return view('admin.siswa.detail');
    }
    // Update
    public function siswaUpdate(){
        
    }
    // Delete
    public function siswaDelete(){

    }
}

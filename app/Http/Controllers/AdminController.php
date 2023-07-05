<?php

namespace App\Http\Controllers;

use App\Models\Anemia;
use App\Models\Edukasi;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDO;
use Pdf;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

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
    public function edukasiDetailPage($slug){
        
        $data_edukasi = Edukasi::where('slug',$slug)->get()->first();
        return view('admin.edukasi.detail',compact('data_edukasi'));

    }
    // Get Detail Data
    public function edukasiDetail(Request $request){

        // return response()->json($request->all());

        if ($request->ajax()) {
            $data_edukasi = Edukasi::findOrFail($request->id_edukasi);
            return response()->json(['edukasi' => $data_edukasi]);
        }
    }
    // Update
    public function edukasiUpdate(Request $request){

        // Checking Data dummy
        //  dd($request->all());

        // Find data by ID
        $id = $request->id_edukasi_update;
        $edukasi = Edukasi::findOrFail($id);

        if($request->hasFile('poster_edukasi')){

             // Validation file size and type
            $validator = Validator::make($request->all(), [
                'poster_edukasi' => 'required|max:2048|mimes:png,jpg,jpg,jpeg',
            ]);
            
            // Alert If no validate
            if ($validator->fails()) {
                Alert::error('Gagal Ditambahkan ! ','Pastikan jenis gambar dan ukurannya ya !');
                return redirect()->back();
            }
            
            // Deleting files in storage
            $file = $edukasi->poster_edukasi;
            $file_path = public_path('poster/' . $file);
            unlink($file_path);

            // Checking Link 
            $videoLink = $request->video_edukasi;
            $existingVideoLink = $edukasi->video_edukasi;

            if ($videoLink !== $existingVideoLink) {
                // Convert Videos link to embeded link
                $last = explode("/", $videoLink);

                // Take the last side, replace with embed/
                $convertedLast = substr_replace($last[3], "embed/", 0, 8);

                // Create embeded link with youtube links
                $finalLink = "https://youtube.com/" . $convertedLast;
            } else {
                // Gunakan link video yang sudah ada dalam basis data
                $finalLink = $existingVideoLink;
            }
            
            $edukasi->update([
                "judul_edukasi" => $request->judul_edukasi,
                "poster_edukasi" => $request->file('poster_edukasi')->getClientOriginalName(),
                "video_edukasi" => $finalLink,
                "detail_edukasi" => $request->detail_edukasi,
                "slug" => Str::slug($request->judul_edukasi, '-')
            ]);

            $request->file('poster_edukasi')->move('poster/', $request->file('poster_edukasi')->getClientOriginalName());

        }else{

            // Checking Link 
            $videoLink = $request->video_edukasi;
            $existingVideoLink = $edukasi->video_edukasi;

            if ($videoLink !== $existingVideoLink) {
                // Convert Videos link to embeded link
                $last = explode("/", $videoLink);

                // Take the last side, replace with embed/
                $convertedLast = substr_replace($last[3], "embed/", 0, 8);

                // Create embeded link with youtube links
                $finalLink = "https://youtube.com/" . $convertedLast;
            } else {
                // Gunakan link video yang sudah ada dalam basis data
                $finalLink = $existingVideoLink;
            }
             
             $edukasi->update([
                 "judul_edukasi" => $request->judul_edukasi,
                 "video_edukasi" => $finalLink,
                 "detail_edukasi" => $request->detail_edukasi,
                 "slug" => Str::slug($request->judul_edukasi, '-')
             ]);
        }
        
        // Checking 
        if($edukasi){
            
            Alert::success('Siap, Berhasil ! ','Data Edukasi berhasil ditambahkan !');
            return redirect()->back();
        
        }else{
            
            Alert::error('Wah Gagal ! ','Data Edukasi Gagal ditambahkan !');
            return redirect()->back();
        }
    }
    // Add
    public function edukasiCreate(Request $request){
        // Checking Data dummy
        //  dd($request->all());

         // Validation file size and type
         $validator = Validator::make($request->all(), [
            'poster_edukasi' => 'required|max:2048|mimes:png,jpg,jpg,jpeg',
        ]);
        
        // Alert If no validate
        if ($validator->fails()) {
            Alert::error('Gagal Ditambahkan ! ','Pastikan jenis gambar dan ukurannya ya !');
            return redirect()->back();
        }
        
         // Convert Videos link to embeded link
         $last = explode("/", $request->video_edukasi);

         // Take the last side, replace with embed/
         $convertedLast = substr_replace($last[3], "embed/",0,8);

         // Create embeded link with youtube links
         $finalLink = "https://youtube.com/" . $convertedLast;
        
         $createEdukasi = Edukasi::create([
            "judul_edukasi" => $request->judul_edukasi,
            "poster_edukasi" => $request->file('poster_edukasi')->getClientOriginalName(),
            "video_edukasi" => $finalLink,
            "detail_edukasi" => $request->detail_edukasi,
            "slug" => Str::slug($request->judul_edukasi, '-')
         ]);
        // Checking 
        if($createEdukasi){
            
            $request->file('poster_edukasi')->move('poster/', $request->file('poster_edukasi')->getClientOriginalName());
            
            Alert::success('Siap, Berhasil ! ','Data Edukasi berhasil ditambahkan !');
            return redirect()->back();
        
        }else{
            
            Alert::error('Wah Gagal ! ','Data Edukasi Gagal ditambahkan !');
            return redirect()->back();
        }
         

    }
    // Delete
    public function edukasiDelete($slug){

        $data_edukasi = Edukasi::where('slug',$slug)->get()->first();

        try {
            // Deleting data edukasi in Database
            $data_edukasi->delete($data_edukasi);

            // Deleting files in storage
            $file = $data_edukasi->poster_edukasi;
            $file_path = public_path('poster/' . $file);
            unlink($file_path);

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

        $data_siswa = Siswa::all();
        $jumlah_siswa = Siswa::all()->count();
        
        return view('admin.siswa.index',compact('data_siswa','jumlah_siswa'));
    }
    // Create
    public function siswaCreate(Request $request){
        // Checking data 
        // dd($request->all());

        // Checking Available Data Siswa
        $siswa = Siswa::where('nis_siswa',$request->nis_siswa)->first();

        if($siswa == NULL){

            // if data null then create data user before
            $user = User::create([
                // "id" => Str::uuid()->toString(),
                "role" => 'Siswa',
                "name" => $request->nama_siswa,
                "remember_token" => Str::random(10),
                "email" => $request->username ."@anemiatracker.app",
                "username" => $request->username,
                "password" => Hash::make($request->password),
            ]);

            // checking data user was created
            if($user->wasRecentlyCreated){

                // if succses then create data siswa
                // find id from table user
                $user_id = User::where('username',$request->username)->first();
                
                // then create siswa
                $create = Siswa::create([
                    "user_id" => $user_id->id,
                    "nis_siswa" => $request->nis_siswa,
                    "nama_siswa" => $request->nama_siswa, 
                    "ttl_siswa" => $request->ttl_siswa, 
                    "alamat_siswa" => $request->alamat_siswa, 
                    "jenisk_siswa" => $request->jenisk_siswa, 
                    "ayah_siswa" => $request->ayah_siswa, 
                    "ibu_siswa" => $request->ibu_siswa, 
                ]);

                // cheking data siswa
                if($create->wasRecentlyCreated){
                    // if success then redirect 
                    Alert::success('Siap, Berhasil ! ','Data Siswa berhasil ditambahkan !');
                    return redirect()->back();
                }else{
                    // if failed, rollback db and redirect back'
                    DB::rollback();
                    Alert::error('Wah Gagal ! ','Silahkan dicek lagi ya kak !');
                    return redirect()->back();
                }
                
            }else{
                // if error then abort
                Alert::error('Wah Gagal ! ','Silahkan dicek lagi ya kak !');
                return redirect()->back();
            }

        }else{
            // if data exist then abort
            Alert::error('Wah Gagal ! ','Data Siswa Sudah Ada !');
            return redirect()->back();
        }
    }
    // Detail
    public function siswaDetailPage(){
        return view('admin.siswa.detail');
    }
    // Update
    public function siswaUpdate(){
        
    }
    // Delete
    public function siswaDelete($id_siswa){

        $data_siswa = Siswa::find($id_siswa);
        $data_user = User::where('id',$data_siswa->user_id)->first();

        try {
            $data_siswa->delete($data_siswa);
            $data_user->delete($data_user);

            Alert::success('Siap, Berhasil ! ','Data Siswa berhasil dihapus !');
            return redirect()->back();

        } catch (QueryException $e) {
            
            Alert::error('Wah Gagal ! ','Data Siswa Gagal dihapus !');
            return redirect()->back();

        }
    }
    // Get Detail Data
    public function siswaDetail(Request $request){

        $data_siswa = Siswa::findOrFail($request->id_siswa);
        $data_user = User::where('id',$data_siswa->user_id);
        return response()->json($data_user);


        if ($request->ajax()) {
            $data_siswa = Siswa::findOrFail($request->id_siswa);
            $data_user = User::where('id',$data_siswa->user_id);
            return response()->json(['siswa' => $data_siswa,'user' => $data_user]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\AnemiaExport;
use App\Exports\AnemiasExport;
use App\Models\Anemia;
use App\Models\Edukasi;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use PDO;
use Pdf;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{   
    // ================ Dashboard Admin ================ //
    // Views 
    public function index(){

        $anemia = Anemia::all()->count();
        $edukasi = Edukasi::all()->count();
        $siswa = Siswa::all()->count();

        $data_edukasi_terbaru = Edukasi::latest()->first();

        $riwayat_pernah_2023 = Anemia::where('riwayat_anemia','Pernah')->whereYear('created_at',"2023")->get()->count();
        $riwayat_tidak_2023 = Anemia::where('riwayat_anemia','Tidak Pernah')->whereYear('created_at',"2023")->get()->count();

        $riwayat_pernah_2024 = Anemia::where('riwayat_anemia','Pernah')->whereYear('created_at',"2024")->get()->count();
        $riwayat_tidak_2024 = Anemia::where('riwayat_anemia','Tidak Pernah')->whereYear('created_at',"2024")->get()->count();

        $riwayat_pernah_2025 = Anemia::where('riwayat_anemia','Pernah')->whereYear('created_at',"2025")->get()->count();
        $riwayat_tidak_2025 = Anemia::where('riwayat_anemia','Tidak Pernah')->whereYear('created_at',"2025")->get()->count();

        return view('admin.index',compact(
            'anemia','edukasi','siswa','data_edukasi_terbaru',
            'riwayat_pernah_2023','riwayat_tidak_2023',
            'riwayat_pernah_2024','riwayat_tidak_2024',
            'riwayat_pernah_2025','riwayat_tidak_2025',
        ));
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
            Alert::error('Wah Gagal ! ','Data Anemia sudah Ada !');
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

        $data_anemia = Anemia::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('admin.anemia.export')->with('data_anemia',$data_anemia));
        $pdf->render();

        $tanggal = date('d-m-Y');
        $judul = "Laporan Deteksi Anemia Remaja Tahun 2023 per-$tanggal.pdf";
        $pdf->stream($judul);
    }
    // Export PDF Page
    public function anemiaExportPage(){

        $data_anemia = Anemia::all();

        return view('admin.anemia.export',compact('data_anemia'));
    }
    // Export Exce;
    public function anemiaExportExcel(){
        $tanggal =  Carbon::now()->locale('id_ID')->isoFormat('dddd, D MMMM Y');
        return Excel::download(new AnemiasExport, "Laporan Deteksi Anemia per-$tanggal.xlsx");
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
        
        $user_exception = ['admin@anemiatracker.app'];

        $data_user = User::whereNotIn('email',$user_exception)->orderBy('created_at')->get()->all();
        $total_user = User::all()->count();
        $jumlah_user = $total_user-1;

        return view('admin.user.index',compact('data_user','jumlah_user'));
    }
    // Detail
    public function userDetail(Request $request){

        if ($request->ajax()) {
            $data_user = User::findOrFail($request->id);
            return response()->json(['user' => $data_user]);
        }
    }
    // Update
    public function userUpdatePassword(Request $request){

        // dd($request->all());

        $user = User::where('id',$request->id_update)->get()->first();

        // dd($user->id);

        if($user == NULL){
            Alert::error('Update Gagal','Silahkan Update Password Lain !');
            return redirect()->back(); 
        }else{
            $user->update([
                "password" => Hash::make($request->password)
            ]);
            Alert::success('Update Password Berhasil','Silahkan Coba Login Ya!');
            return redirect()->back(); 
        }
    }
    // Delete
    public function userDelete($id){

        $data_user = User::findOrFail($id);
        $data_siswa = Siswa::where('user_id',$id);
        
        if($data_siswa == NULL){
            try {
                $data_user->delete($data_user);
                Alert::success('Siap, Berhasil ! ','Data Siswa berhasil dihapus !');
                return redirect()->back();
            } catch (QueryException $e) {
                Alert::error('Wah Gagal ! ','Data Siswa Gagal dihapus !');
                return redirect()->back();
            }
        }else{
            Alert::error('Gagal Dihapus ! ','Hapus dari Menu Siswa Ya !');
            return redirect()->back();
        }
    }


    // ================ Siswa Management ================ // 
    // Views
    public function siswaPage(){

        $data_siswa = Siswa::all()->sortBy('ASC');
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
    public function siswaUpdate(Request $request){
        // dd($request->all());
        
        $id = $request->id_siswa_update;
        $siswa = Siswa::findOrFail($id);
        $user = User::findOrFail($siswa->user_id);
        
        try {
            $siswa->update($request->all());
            $user->update([
                "name" => $request->nama_siswa
            ]);
        } catch (QueryException $e) {
            Alert::warning('Wah Gagal ! ','Data Siswa gagal diupdate !');
            return redirect()->back();
        }
        Alert::success('Siap, Berhasil ! ','Data Siswa berhasil diupdate !');
        return redirect()->back();

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
            
            Alert::error('Wah Gagal ! ','Hapus data di menu Anemia ya');
            return redirect()->back();

        }
    }
    // Get Detail Data
    public function siswaDetail(Request $request){

        if ($request->ajax()) {
            $data_siswa = Siswa::findOrFail($request->id_siswa);
            $data_user = User::findOrFail($data_siswa->user_id);
            
            // return response()->json($data_user);

            return response()->json(['siswa' => $data_siswa,'user' => $data_user]);
        }
    }
}

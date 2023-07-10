<?php

namespace App\Http\Controllers;

use App\Models\Anemia;
use App\Models\Edukasi;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

        $data_siswa = Siswa::where('user_id',auth()->user()->id)->get()->first();
        // dd($data_siswa);
        return view('siswa.profile.index',compact('data_siswa'));
    }
    //Update Profile
    public function profileUpdate(Request $request){
        // dd($request->all());

        $siswa = Siswa::where('user_id',auth()->user()->id)->get()->first();
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
    //Update Password
    public function passwordUpdate(Request $request){

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
            'password_re_baru' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            Alert::error('Yaah Gagal ! ','Pastikan password sesuai aturan ya !');
            return redirect()->back()->withErrors($validator)->withInput();;
        }

        if($request->password_baru == $request->password_re_baru){

            $user = User::where('id',auth()->user()->id)->get()->first();

            if (Hash::check($request->password_lama, $user->password)) {
                // dd("wah gagal ini");
                $user->password = Hash::make($request->password_baru);
                $user->save();
    
                Alert::success('Yeay Berhasil ! ','Password sudah terupdate !');
                return redirect()->back();
                
            }else{
                // dd("wah betul");
                Alert::error('Wah Gagal ! ','Password Lama tidak Sesuai !');
                return redirect()->back();
                
            }
        }else{
            Alert::error('Yaah Gagal ! ','Pastikan password baru sama ya !');
            return redirect()->back()->withErrors($validator)->withInput();;

        }

        }
}

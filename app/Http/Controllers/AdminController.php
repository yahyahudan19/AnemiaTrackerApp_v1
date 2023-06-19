<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{   
    // Dashboard Admin Views //

    // Views //
    public function index(){
        return view('admin.index');
    }

    // Anemia Management // 
    // Views
    public function anemiaPage(){
        return view('admin.anemia.index');
    }

    // User Management // 
    // Views
    public function userPage(){
        return view('admin.user.index');
    }

    // Edukasi Management // 
    //Views
    public function edukasiPage(){
        return view('admin.edukasi.index');
    }
}

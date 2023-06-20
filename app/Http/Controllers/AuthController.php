<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // View Login Page
    public function loginPage(){
        return view('auth.login');
    }
    // Login Processing
    public function doLogin(Request $request){
        
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/admin');
        } else {
            // Login gagal
            return redirect()->back()->withErrors(['username' => 'Username atau password salah']);
        }
    }
    // Logout Processing
    public function logout(){
        Auth::logout();
        return redirect('/login');
    } 
}

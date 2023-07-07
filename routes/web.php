<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Main Routes 

//Admin Routes
Route::middleware(['auth','role:Administrator'])->group(function() {
    // =========== Dashboard =========== //
    Route::get('/admin',[AdminController::class,'index'])->name('index'); //Dashboard Admin Views

    // =========== Anemia Management =========== //
    Route::get('/admin/anemia',[AdminController::class,'anemiaPage']); //Anemia Management Views
    Route::post('/admin/anemia/create',[AdminController::class,'anemiaCreate']); // Anemia Add Data
    Route::put('/admin/anemia/update',[AdminController::class,'anemiaUpdate']); // Anemia Update Data
    Route::get('/admin/anemia/delete/{id}',[AdminController::class,'anemiaDelete']); // Anemia Delete Data
    Route::post('/admin/anemia/detail',[AdminController::class,'anemiaDetail'])->name('getAnemiaID'); // Anemia Get Detail Data  
    Route::get('/admin/anemia/export',[AdminController::class,'anemiaExportPDF']); // Anemia Export PDF
    

    // =========== Edukasi Management =========== //
    Route::get('/admin/edukasi',[AdminController::class,'edukasiPage']); // Edukasi Management Views
    Route::post('/admin/edukasi/create',[AdminController::class,'edukasiCreate']); // Edukasi Add Data
    Route::put('/admin/edukasi/update',[AdminController::class,'edukasiUpdate']); // Edukasi Update Data
    Route::get('/admin/edukasi/delete/{slug}',[AdminController::class,'edukasiDelete']); // Edukasi Delete Data
    Route::get('/admin/edukasi/{slug}',[AdminController::class,'edukasiDetailPage']); // Edukasi Detail Views
    Route::get('/admin/edukasi/export',[AdminController::class,'edukasiExportPDF']); // Edukasi Export PDF
    Route::post('/admin/edukasi/detail',[AdminController::class,'edukasiDetail'])->name('getEdukasiID'); // Anemia Get Detail Data  
    
    
    // =========== Siswa Management =========== //
    Route::get('/admin/siswa',[AdminController::class,'siswaPage']); //Siswa Management Views
    Route::post('/admin/siswa/create',[AdminController::class,'siswaCreate']); // Siswa Add Data
    Route::put('/admin/siswa/update',[AdminController::class,'siswaUpdate']); // Siswa Update Data
    Route::get('/admin/siswa/delete/{id}',[AdminController::class,'siswaDelete']); // Siswa Delete Data
    Route::get('/admin/siswa/detail/{id}',[AdminController::class,'siswaDetailPage']); // Siswa Detail Views
    Route::get('/admin/siswa/export',[AdminController::class,'siswaExportPDF']); // Siswa Export PDF
    Route::post('/admin/siswa/detail',[AdminController::class,'siswaDetail'])->name('getSiswaID'); // Anemia Get Detail Data  


    // =========== User Management =========== //
    Route::get('/admin/user',[AdminController::class,'userPage']); //User Management Views
    Route::put('/admin/user/update/{id}',[AdminController::class,'userUpdate']); // Siswa Update Data
    Route::get('/admin/user/delete/{id}',[AdminController::class,'userDelete']); // Siswa Delete Data
    Route::post('/admin/user/detail',[AdminController::class,'userDetail'])->name('getUserID'); // Siswa Detail Views

});

//Siswa Routes
Route::middleware(['auth','role:Siswa'])->group(function() {
    Route::get('/siswa',[SiswaController::class,'index'])->name('index'); //Dashboard Siswa Views
    Route::get('/siswa/profile',[SiswaController::class,'profileSiswa'])->name('profile'); //Dashboard Siswa Views

    Route::get('/siswa/anemia',[SiswaController::class,'anemiaPage']); //Anemia Views

    Route::get('/siswa/edukasi',[SiswaController::class,'edukasiPage']); //Edukasi Views

    Route::get('/siswa/profile',[SiswaController::class,'profilePage']); //Profile Views
});

//Authentication Page and Processes Routes
Route::get('/login','\App\Http\Controllers\AuthController@loginPage')->name('login'); //Login Views
Route::post('/auth','\App\Http\Controllers\AuthController@doLogin')->name('auth'); // Login Process
Route::get('/logout','\App\Http\Controllers\AuthController@logout')->name('logout'); //Logout Process
Route::get('/error','\App\Http\Controllers\AuthController@error')->name('error'); // 404 Error Pages

// For Master Routes
Route::get('/master', function () {
    return view('layouts.master');
});


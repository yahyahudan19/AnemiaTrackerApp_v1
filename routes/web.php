<?php

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
    Route::get('/admin','\App\Http\Controllers\AdminController@index')->name('index'); //Dashboard Admin Views
    Route::get('/admin/anemia','\App\Http\Controllers\AdminController@anemiaPage'); //Anemia Management Views
    Route::get('/admin/edukasi','\App\Http\Controllers\AdminController@edukasiPage'); //Edukasi Management Views
    Route::get('/admin/user','\App\Http\Controllers\AdminController@userPage'); //User Management Views
});

//Siswa Routes
Route::middleware(['auth','role:Siswa'])->group(function() {
    Route::get('/siswa','\App\Http\Controllers\SiswaController@index')->name('index'); //Dashboard Siswa Views
    Route::get('/siswa/anemia','\App\Http\Controllers\SiswaController@anemiaPage'); //Anemia Views
    Route::get('/siswa/edukasi','\App\Http\Controllers\SiswaController@edukasiPage'); //Edukasi Views
    Route::get('/siswa/profile','\App\Http\Controllers\SiswaController@profilePage'); //Profile Views
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


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
Route::get('/admin','\App\Http\Controllers\AdminController@index')->name('index'); //Dashboard Admin Views
Route::get('/admin/anemia','\App\Http\Controllers\AdminController@anemiaPage'); //Anemia Management Views
Route::get('/admin/edukasi','\App\Http\Controllers\AdminController@edukasiPage'); //Edukasi Management Views
Route::get('/admin/user','\App\Http\Controllers\AdminController@userPage'); //User Management Views



//Authentication Page and Processes Routes
Route::get('/login','\App\Http\Controllers\AuthController@loginPage')->name('login'); //Login Views
Route::post('/auth','\App\Http\Controllers\AuthController@doLogin')->name('auth'); // Login Process
Route::get('/logout','\App\Http\Controllers\AuthController@logout')->name('logout'); //Logout Process

// For Master Routes
Route::get('/master', function () {
    return view('layouts.master');
});

// Just Hashing
Route::get('/encrypt-password', function () {
    $password = 'password';
    $hashedPassword = Hash::make($password);

    return $hashedPassword;
});
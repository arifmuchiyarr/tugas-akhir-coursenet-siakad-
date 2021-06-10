<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'JurusanController@index');

Auth::routes();

Route::get('/home', 'JurusanController@index')->name('home');


Route::prefix('dosen')->group(function () {
    Route::get('','DosenController@index');
    Route::get('/create','DosenController@create');
    Route::post('/store','DosenController@store');
    Route::get('/edit/{id}','DosenController@edit');
    Route::get('/show/{id}','DosenController@show');
    Route::put('/update','DosenController@update');
    Route::get('/destroy/{id}','DosenController@destroy');
});

Route::prefix('jurusan')->group(function () {
    Route::get('','JurusanController@index');
    Route::get('/create','JurusanController@create');
    Route::post('/store','JurusanController@store');
    Route::get('/edit/{id}','JurusanController@edit');
    Route::get('/show/{id}','JurusanController@show');
    Route::put('/update','JurusanController@update');
    Route::get('/destroy/{id}','JurusanController@destroy');
});


// Route::get('/jurusan-dosen/{id}','JurusanController@jurusanDosen');
// Route::get('/jurusan-mahasiswa/{id}','JurusanController@jurusanMahasiswa');
Route::get('/jurusan-dosen/{jurusan_id}','JurusanController@jurusanDosen')->name('jurusan-dosen');
Route::get('/jurusan-mahasiswa/{jurusan_id}','JurusanController@jurusanMahasiswa')->name('jurusan-mahasiswa');

Route::prefix('mahasiswa')->group(function () {
    Route::get('','MahasiswaController@index');
    Route::get('/create','MahasiswaController@create');
    Route::post('/store','MahasiswaController@store');
    Route::get('/edit/{id}','MahasiswaController@edit');
    Route::get('/show/{id}','MahasiswaController@show');
    Route::put('/update','MahasiswaController@update');
    Route::get('/destroy/{id}','MahasiswaController@destroy');
});


Route::prefix('tugasakhir')->group(function () {
    Route::get('','TugasakhirController@index');
    Route::get('/create','TugasakhirController@create');
    Route::post('/store','TugasakhirController@store');
    Route::get('/edit/{id}','TugasakhirController@edit');
    Route::put('/update','TugasakhirController@update');
});

Route::prefix('matakuliah')->group(function () {
    Route::get('','MatakuliahController@index');
    Route::get('/create','MatakuliahController@create');
    Route::post('/store','MatakuliahController@store');
    Route::get('/edit/{id}','MatakuliahController@edit');
    Route::get('/show/{id}','MatakuliahController@show');
    Route::put('/update','MatakuliahController@update');
    Route::get('/destroy/{id}','MatakuliahController@destroy');
});


Route::get('/buat-matakuliah/{dosen}','MatakuliahController@buatMatakuliah')->name('buat-matakuliah');



<?php

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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//auth group
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('mahasiswa/export/excel', 'MahasiswaController@exportExcel')->name('mahasiswa.export.excel');
    Route::get('mahasiswa/export/pdf', 'MahasiswaController@exportPdf')->name('mahasiswa.export.pdf');

    Route::resource('mahasiswa', 'MahasiswaController');
    Route::resource('/pekerjaan', 'PekerjaanController');
});

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
route::resource('/mahasiswa', 'MahasiswaController');
route::resource('/pekerjaan', 'PekerjaanController');

Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa.index');
Route::get('/pekerjaan', 'PekerjaanController@index')->name('pekerjaan.index');

Auth::routes();


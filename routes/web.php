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
Route::get('/d/{id}', 'HomeController@viewDetails')->name('details.event');


Route::get('/user/api', 'UserController@ApiDataUser')->name('api.user');
Route::get('/report/absen', 'UserController@ViewReportAbsen')->name('view.report.absen');
Route::get('/tambah/kegiatan', 'UserController@viewTambahKegiatan')->name('view.tambah.kegiatan');
Route::get('/absen/all', 'UserController@viewAllAbsen')->name('view.all.absen');

Route::get('/api/absen', 'UserController@ApiRiwayatAbsen')->name('api.absen.user');
Route::get('/api/kegiatan', 'UserController@ApiKegiatan')->name('api.kegiatan.user');
Route::get('/api/all/kegiatan', 'UserController@ApiAllKegiatan')->name('api.all.kegiatan.user');
Route::get('/api/per/kegiatan', 'UserController@ApiRiwayatPerKegiatan')->name('api.per.kegiatan');


Route::get('/cek/absen', 'AbsenController@cekAbsen')->name('view.absen');

Route::post('/post/tambah/kegiatan', 'UserController@postTambahKegiatan')->name('post.tambah.kegiatan');

Route::post('/post/absen', 'AbsenController@PostAbsen')->name('post.absen');

Route::post('/post/login', 'UserController@ApiLogin')->name('post.login');

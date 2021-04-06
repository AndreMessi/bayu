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
Route::get('/search','PaketController@search')->name('pages.search');
Route::get('/paket/detail/{id}','PaketController@detail')->name('pages.paket.detail');
Route::get('/login','Auth\LoginController@showLoginForm')->name('pages.login');
Route::post('/pesan','PembayaranController@pesan')->name('pesan');
Route::get('/register',function () {
    return view('pages.register');
})->name('pages.register');

Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::post('/register','Auth\RegisterController@register')->name('register');

Route::get('/', function () {
    return redirect('/home');
})->name('pages.home');

Route::get('/home', function () {
    return view('pages.home');
})->name('pages.home');
Route::group(['prefix'=>'/paket'],function (){
    Route::get('/','PaketController@index')->name('pages.paket');
    Route::get('/form','PaketController@form')->name('pages.paket.form');
    Route::post('/store','PaketController@store')->name('pages.paket.store');
    Route::post('/storeJadwal','PaketController@storeJadwal')->name('pages.paket.storeJadwal');
    Route::post('/storeGallery','PaketController@storeGallery')->name('pages.paket.storeGallery');
    Route::get('/delete/{id}','PaketController@delete')->name('pages.paket.delete');
});

Route::group(['prefix'=>'/gallery'],function (){
    Route::get('/','GalleryController@index')->name('pages.gallery');
});

Route::group(['prefix'=>'/pembayaran'],function (){
    Route::get('/','PembayaranController@index')->name('pages.pembayaran');
    Route::post('/updateStatus','PembayaranController@updateStatus')->name('update.status');
    Route::post('/uploadBukti','PembayaranController@uploadBukti')->name('upload.bukti');
});

Route::get('/delete/{table}/{id}',function ($table,$id){
   $data = \Illuminate\Support\Facades\DB::table($table)->where($table.'_id',$id)->delete();
    if ($data) {
        return back()->with('success','Data Berhasil Dihapus');
    }
    return back()->withErrors(['Data Gagal Dihapus']);
})->name('table.delete');

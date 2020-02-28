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
// input MOdel
use App\Dosen;
use App\Hobi;
use App\Mahasiswa;
// route one to one
Route::get('relasi-1', function () {
    // mamilih data mahasiswa yang memiliki nim '1010101'
    $mhs = Mahasiswa::where('nim', '=', '1010101')->first();
    // menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->wali->nama;
});
Route::get('relasi-2', function () {
    // mamilih data mahasiswa yang memiliki nim '1010101'
    $mhs = Mahasiswa::where('nim', '=', '1010101')->first();
    // menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->dosen->nama;
});

// One to Many
Route::get('relasi-3', function () {
    // mamilih data dosen yang memiliki nama 'Abdul MUsthafa'
    $dosen = Dosen::where('nama', '=', 'Abdul MUsthafa')->first();
    // menampilkan seluruh data mahasiswa didiknya
    foreach ($dosen->mahasiswa as $value) {
        echo '<li>Nama : ' . $value->nama
        . '<strong> ' . $value->nim . '</strong></li>';
    }
});
Route::get('relasi-4', function () {
    // mamilih data mahasiswa yang memiliki nama 'Dadang'
    $mahasiswa = Mahasiswa::where('nama', '=', 'Dadang Peloy')->first();
    // menampilkan seluruh hobi dari dadang
    foreach ($mahasiswa->hobi as $value) {
        echo '<li>Hobi : ' . $value->hobi . '</li>';
    }
});
Route::get('relasi-5', function () {
    // mamilih data hobi yang memiliki nama 'game Mobile'
    $hobi = Hobi::where('hobi', '=', 'Mengaji Al Quran')->first();
    // menampilkan seluruh data mahasiswa yang memiliki hobi game Mobile
    foreach ($hobi->mahasiswa as $value) {
        echo '<li>Nama : ' . $value->nama
        . '<strong> ' . $value->nim . '</strong></li>';
    }
});
Route::get('relasi-join', function () {
//    join laravel
    //  $sql = Mahasiswa::with('wali')->get();
    $sql = DB::table('mahasiswas')->select('mahasiswas.nama', 'mahasiswas.nim', 'walis.nama as nama_wali')->join('walis', 'walis.id_mahasiswa', '=', 'mahasiswas.id')->get();
    dd($sql);
});
Route::get('eloquent', function () {
    $mahasiswa = Mahasiswa::with('wali', 'dosen', 'hobi')->get();
    return view('eloquent', compact('mahasiswa'));
});
Route::get('latihaneloquent', function () {
    $mahasiswa = Mahasiswa::with('wali', 'dosen', 'hobi')->get()->take(1);
    return view('latihaneloquent', compact('mahasiswa'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Blade template
Route::get('beranda', function () {
    return view('beranda');
});

// WEB CRUD
Route::resource('dosen', 'DosenController');
Route::resource('hobi', 'HobiController');
Route::resource('mahasiswa', 'MahasiswaController');
Route::resource('wali', 'WaliController');
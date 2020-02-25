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

// Import Model
use App\Mahasiswa;
use App\Dosen;
use App\Hobi;

// Route One to One
Route::get('relasi-1',function()
{
    // memilih data mahasiswa yang memiliki nim '101010101'
    $mhs = Mahasiswa::where('nim','=','1010101')->first();

    // menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->wali->nama;
});

Route::get('relasi-2',function()
{
    // memilih data mahasiswa yang memiliki nim '101010101'
    $mhs = Mahasiswa::where('nim','=','1010101')->first();

    // menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->dosen->nama;
});

Route::get('relasi-3',function()
{
    // mencari dosen dengan yang bernama Abdul Musthofa
    $dosen = Dosen::where('nama','=','Abdul Musthofa')->first();

    // menampilkan data wali dari mahasiswa yang dipilih
    foreach ($dosen->mahasiswa as $temp)
        echo '<li> Nama : ' .$temp->nama .
             ' <strong>' . $temp->nim . '</strong></li>'; 
});

Route::get('relasi-4',function()
{
    // mencari dosen dengan yang bernama Dadang
    $dadang = Mahasiswa::where('nama','=','Dadang Peloy')->first();

    // menampilkan seluruh hobi dari dadang
    foreach ($dadang->hobi as $temp)
        echo '<li>' .$temp->hobi . '</li>'; 
});

Route::get('relasi-5',function()
{
    // mencari mahasiswa yang bernama Dadang
    $gaming = Hobi::where('hobi','=','Game Mobile')->first();

    // menampilkan semua mahasiswa yang mempunyai hobi Mancing
    foreach ($gaming->mahasiswa as $temp)
        echo '<li> Nama : ' .$temp->nama . ' <strong>' . 
             $temp->nim . '</strong></li>'; 
});

Route::get('relasi-join', function() {

    // Join Laravel
    // $sql = Mahasiswa::with('wali')->get();
    $sql = DB::table('mahasiswas')
    ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')
    ->get();
    dd($sql);
});

Route::get('eloquent',function()
{
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    return view('eloquent',compact('mahasiswa'));
});

Route::get('lat-eloquent',function()
{
    $mahasiswa = Mahasiswa::with('dosen','hobi','wali')->get()->take(1);
    return view('lat-eloquent',compact('mahasiswa'));
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Blade Template
Route::get('beranda',function()
{
    return view('beranda');
});

Route::get('tentang',function()
{
    return view('tentang');
});

Route::get('kontak',function()
{
    return view('kontak');
});

// CRUD
Route::resource('dosen','DosenController');
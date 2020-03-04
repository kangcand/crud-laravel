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
    // memilih data mahasiswa yg memiliki nim '101010101'
    $mhs = Mahasiswa::where('nim','=','101010101')->first();

    // Menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->wali->nama;
});

Route::get('relasi-2',function()
{
    // memilih data mahasiswa yg memiliki nim '101010101'
    $mhs = Mahasiswa::where('nim','=','101010101')->first();
    // dd($mhs);
    // Menampilkan data dosen dari mahasiswa yang dipilih
    return $mhs->dosen->nama;
});

// One To Many
Route::get('relasi-3', function() {

    # Mencari dosen  yang bernama Abdul Musthafa
    $dosen = Dosen::where('nama', '=', 'Abdul Mustafa')->first();

    # Menampilkan data mahasiswa dari dosen yang dipilih
    foreach ($dosen->mahasiswa as $temp)
        echo '<li> Nama : ' . $temp->nama .
            ' <strong>' . $temp->nim . '</strong>
            </li>';
});

Route::get('relasi-4', function() {

    # Mencari mahasiswa yang bernama Dadang
    $dadang = Mahasiswa::where('nama', '=', 'Dadang')->first();

    # Menampilkan seluruh hobi dari Dadang
    foreach ($dadang->hobi as $temp)
        echo '<li>' . $temp->hobi . '</li>';
});

Route::get('relasi-5', function() {

    #  Mencari mahasasiswa yang bernama Dadang
    $dota = Hobi::where('hobi', '=', 'Dota 2')->first();
    // dd($dota);
    # Menampilkan semua mahasiswa yang mempunya hobi dota 2
    foreach ($dota->mahasiswa as $temp)
        echo '<li> Nama : ' . $temp->nama . ' <strong>' .
              $temp->nim . '</strong></li>';

});

Route::get('relasi-join', function() {

    // Join Laravel
    $sql = Mahasiswa::with('wali')->get();
    // $sql = DB::table('mahasiswas')
    // ->select('mahasiswas.nama','mahasiswas.nim',
    //          'walis.nama as nama_wali')
    // ->join('walis','walis.id_mahasiswa','=',
    //         'mahasiswas.id')
    // ->get();
    dd($sql);

});

Route::get('eloquent',function()
{
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    // dd($mahasiswa);
    return view('eloquent',compact('mahasiswa'));
});

Route::get('latihan-eloquent',function()
{
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')
                    ->where('nama','=','Dadang')
                    ->first();
    // dd($mahasiswa);
    return view('eloquent2',compact('mahasiswa'));
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
Route::resource('hobi','HobiController');
Route::resource('mahasiswa','MahasiswaController');
Route::resource('wali','WaliController');

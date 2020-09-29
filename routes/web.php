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

use App\Jenis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $jenis = Jenis::get();
    return view('welcome', compact('jenis'));
})->name('welcome');
// Route::get('/how-to-use', function () {
//     return view('howto');
// })->name('how-to');

Route::group(['middleware' => ['guest']], function () {
    Route::prefix('/login')->group(function () {
        Route::get('/', function () {
            return view('auth.login');
        })->name('login');
        Route::post('/', 'Login@login')->name('logins');
    });
    Route::prefix('/register')->group(function () {
        Route::get('/', function () {
            return view('auth.register');
        })->name('register');
        Route::post('/', 'Register@regist')->name('registers');
    });
});

Route::get('/logout', 'Login@logout')->name('logouts');

Route::group(['middleware' => ['auth:masyarakat']], function () {
    Route::prefix('/masyarakat')->group(function () {
        // Data Masyarakat
        Route::get('/data/masyarakat/{id}/setting', 'MasyarakatController@setting')->name('masyarakat.setting');
        Route::put('/data/masyarakat/{id}', 'MasyarakatController@settingUpdate')->name('setting.update');
        // Data Pengaduan
        Route::get('/data/pengaduan/daftar', 'PengaduanController@daftar')->name('pengaduan.daftar');
        Route::get('/data/pengaduan/create', 'PengaduanController@create')->name('pengaduan.create');
        Route::get('/data/pengaduan/{id}', 'PengaduanController@detail')->name('pengaduan.detail');
        Route::get('/data/pengaduan/{id}/edit', 'PengaduanController@edit')->name('pengaduan.edit');
        Route::put('/data/pengaduan/{id}', 'PengaduanController@update')->name('pengaduan.update');
        Route::get('/data/pengaduan/{id}/delete', 'PengaduanController@destroy');
        Route::post('/data/pengaduan', 'PengaduanController@store')->name('pengaduan.store');
    });
});

Route::group(['middleware' => ['auth:petugas']], function () {
    Route::prefix('/petugas')->group(function () {
        // Dashboard
        Route::get('/', 'PetugasController@dashboard')->name('petugas');
        // Data Masyarakat Delete
        Route::get('/data/masyarakat/{id}/delete', 'MasyarakatController@destroy');
        // Data Petugas Delete
        Route::get('/data/petugas/{id}/delete', 'PetugasController@destroy');
        // Data Pengaduan
        Route::get('/data/pengaduan', 'PengaduanController@index')->name('pengaduan.index');
        Route::get('/data/pengaduan/{id}', 'PengaduanController@show')->name('pengaduan.show');
        Route::get('/data/pengaduan/{id}/delete', 'PengaduanController@destroy');
        // Route::get('/data/pengaduan/cetak', 'PengaduanController@cetak_pdf')->name('pengaduan.cetakPdf'); // cetak PDF
        Route::get('/data/pengaduan/cetak', 'PengaduanController@datalist')->name('pengaduan.cetak'); // cetak PDF
        // Data Tanggapan
        Route::get('/data/tanggapan', 'TanggapanController@index')->name('tanggapan.index');
        Route::get('/data/tanggapan/{id}', 'TanggapanController@show')->name('tanggapan.show');
        Route::get('/data/tanggapan/{id}/create', 'TanggapanController@create')->name('tanggapan.create');
        Route::post('/data/tanggapan', 'TanggapanController@store')->name('tanggapan.store');
        Route::get('/data/tanggapan/{id}/delete', 'TanggapanController@destroy');
        //  Data Jenis 
        Route::get('/data/jenis/{id}/delete', 'JenisController@destroy');
    });
    Route::resource('/petugas/data/petugas', 'PetugasController'); // Data Petugas
    Route::resource('/petugas/data/masyarakat', 'MasyarakatController'); // Data Masyarakat
    Route::resource('/petugas/data/jenis', 'JenisController'); // Data Jenis
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

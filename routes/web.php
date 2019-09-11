<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
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

Route::get('/testing', function () {
return view('testing');
});
Route::get('/tes', 'KecamatanV2@cek');
Route::post('/testing/upload', 'AdminController@testing');
Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', 'AdminController@login');
Route::get('/cobaApi', 'ApiAll@pelayanan');

Route::group(['middleware' => ['sesi']], function () {
    Route::get('/logout', 'AdminController@keluar')->name('keluar');
    Route::group(['prefix' => 'kecamatan', 'middleware' => ['kecamatan']], function () {
        Route::get('/', 'AdminController@homeKec');
        Route::get('/akun', 'AdminController@AkunAdmin');
        Route::post('/akun/addDesa', 'AdminController@AkunAddDesa')->name('AddAdminDesa');
        Route::post('/akun/edit/{username}', 'AdminController@editAkun');
        Route::get('/akun/resetpass/{username}', 'AdminController@resetPass');
        Route::get('/layanan', 'AdminController@dataPelayanan');
        Route::get('/layanan/{slug}', 'AdminController@dataLayanan');
        Route::get('/layanan/{slug}/{id}', 'AdminController@dataLayananDetail');
        Route::get('/layanan/{slug}/{id}/setujui', 'AdminController@setujuPermohonan');
        Route::get('/layanan/{slug}/{id}/cetak', 'AdminController@cetakSKLayanan');

        Route::get('/layanan/{slug}/{id}/pdf', 'AdminController@cetakSKLayananPDF');

        Route::get('/sublayanan/{slug1}/{slug2}', 'AdminController@dataSublayanan');
        Route::get('/sublayanan/{slug2}/{id}/detail', 'AdminController@dataSublayananDetail');
        Route::get('/sublayanan/{slug2}/{id}/setujui', 'AdminController@setujuPermohonan');
        Route::get('/sublayanan/{slug2}/{id}/cetak', 'AdminController@cetakSKSubayanan');
        Route::get('/sublayanan/{slug2}/{id}/pdf', 'AdminController@cetakSKSubayananPDF');

        Route::get('/profil', 'AdminController@ubahDataAdmin');
        Route::get('/pelayanan', 'AdminController@pelayanan');
        Route::post('/pelayanan/ubah/{slug}', 'AdminController@ubahKetPelayanan');
        Route::post('/sublayanan/ubah/{slug}', 'AdminController@ubahKetSublayanan');
        Route::get('/pelayanan/{slug}', 'AdminController@setPelayanan');
        Route::get('/pelayanan/{slug}/{slug2}', 'AdminController@setSublayanan');
        Route::post('/profil/akun', 'AdminController@editAkunKecamatan');
        Route::post('/profil/password', 'AdminController@editAkunKecamatanPass');
        Route::post('/profil/info/{id}', 'AdminController@editInfoKecamatan');
        Route::post('/formulir/{kode}/{id}/{slug}/no-sk', 'AdminController@noSKLayanan')->name('no_sk');
    });

    Route::group(['prefix' => 'desa', 'middleware' => 'desa'], function () {
        Route::get('/', 'DesaController@homeDesa');
        Route::get('/pengaturan', 'DesaController@pagePengaturan');
        Route::get('/formulir/{slug}', 'DesaController@formulirPelayanan');
        Route::get('/formulir/{slug1}/{slug2}', 'DesaController@formulirSublayanan');
        Route::post('/formulir/imb', 'DesaController@imb');
        Route::post('/formulir/reklame', 'DesaController@reklameForm')->name('formulilr_reklame');
        Route::post('/formulir/iumk', 'DesaController@iumkForm')->name('formulir_iumk');
        Route::post('/formulir/salon', 'DesaController@salonForm')->name('formulir_salon');
        Route::post('/formulir/rumahMakan', 'DesaController@rmForm')->name('formulir_rm');
        Route::post('/formulir/gelanggangketangkasan', 'DesaController@gkForm')->name('formulir_gk');
        Route::post('/formulir/atraksiwisata', 'DesaController@awForm')->name('formulir_aw');
        Route::get('/data', 'DesaController@data');
        Route::get('/data/{slug}', 'DesaController@dataPelayanan');

        Route::post('/profil/akun', 'DesaController@editAkunDesa')->name('akunDesa');
        Route::post('/profil/akun/pass', 'DesaController@editPassAdminDesa')->name('passAdminDesa');
        Route::post('/profil/akun/info/{id}', 'DesaController@gantiInfoDesa')->name('gantiInfoDesa');
    });

    route::group(['prefix' => 'desa/v2/', 'middleware' => 'desa'], function () {
        route::get('/', 'DesaV2@index')->name('desa-home');
        route::get('/formulir', 'DesaV2@formulir')->name('desa-formulir');
        route::get('/formulir/{slug}', 'DesaV2@formulirPelayanan')->name('formPelayanan-desa');
        route::get('/formulir/{slug}/{slug2}', 'DesaV2@formulirSublayanan')->name('formSublayanan-desa');

        route::post('/formulir/izin-mendirikan-bangunan', 'DesaV2@formIMB')->name('form-izin-mendirikan-bangunan');
        route::post('/formulir/izin-reklame', 'DesaV2@formIR')->name('form-izin-reklame');
        route::post('/formulir/izin-usaha-mikro-dan-kecil', 'DesaV2@formIUMK')->name('form-izin-usaha-mikro-dan-kecil');
        route::post('/formulir/salon-kecantikan', 'DesaV2@formSK')->name('form-salon-kecantikan');
        route::post('/formulir/rumah-makan', 'DesaV2@formRM')->name('form-rumah-makan');
        route::post('/formuilr/gelanggang-ketangkasan', 'DesaV2@formGK')->name('form-gelanggang-ketangkasan');
        route::post('/formuilr/atraksi-wisata', 'DesaV2@formAW')->name('form-atraksi-wisata');
        route::post('/formuilrdispensasi-nikah', 'DesaV2@formDN')->name('form-dispensasi-nikah');

        route::get('/data-pemohon', 'DesaV2@datalayanan');
        route::get('/data-pemohon/{slug}', 'DesaV2@datapemohonDetail');
        route::get('/data-pemohon/{slug}/{slug1}', 'DesaV2@datapemohonDetailSub');

        route::get('/data-pemohon/{slug}/sub/{kode}/detail','DesaV2@DetailPemohonSub');
        route::get('/data-pemohon/{slug}/sub/{kode}/ubah','DesaV2@UbahDetailPemohonSub');
        

        route::get('/data-pemohon/{slug}/{kode}/detail', 'DesaV2@DetailPemohon');
        route::get('/data-pemohon/{slug}/{kode}/ubah', 'DesaV2@UbahDetailPemohon');
        route::post('/data-pemohon/{slug}/{kode}/ubah','DesaV2@UpdateData1')->name('ubahdata1');
        // route::post('/update/formulir/izin-mendirikan-bangunan/{kode}','DesaV2@IMBupdate')->name('update-izin-mendirikan-bangunan');
        // route::post('/update/formulir/izin-reklame/{kode}','DesaV2@IRupdate')->name('update-izin-reklame');


        route::get('/pengaturan-akun', 'DesaV2@pengaturanAkun')->name('akunDaerah');
        route::post('/pengaturan-akun/profil-akun', 'KecamatanV2@akunProfil')->name('profilAkunDaerah');
        route::post('/pengaturan-akun/password-akun', 'KecamatanV2@akunPass')->name('akunPassDaerah');
        route::post('/pengaturan-akun/informasi-daerah-akun', 'KecamatanV2@profilDaerah')->name('profilDaerah2');
    });


    Route::group(['prefix' => 'kecamatan/v2', 'middleware' => 'kecamatan'], function () {
        route::get('/', 'KecamatanV2@home');
        route::get('/data-layanan', 'KecamatanV2@dataLayanan');
        route::get('/data-layanan/{slug}', 'KecamatanV2@dataLayananDetail');
        route::get('/data-layanan/{slug}/{slug1}', 'KecamatanV2@dataSublayanan');

        route::get('/data-layanan/{slug}/{kode}/detail', 'KecamatanV2@LayananDetail');
        route::get('/data-layanan/{slug}/{kode}/cetak','KecamatanV2@CetakPelayanan')->name('cetak.surat.pelayanan');

        route::get('/data-sublayanan/{slug}/{kode}/detail', 'KecamatanV2@SublayananDetail');
        route::get('/data-sublayanan/{slug}/{kode}/cetak','KecamatanV2@CetakSublayanan')->name('cetak.surat.sublayanan');

        route::get('/admin-desa', 'KecamatanV2@adminDesa');
        route::post('/add-nosk/{id}/{slug}/{kode}', 'KecamatanV2@addNoSK')->name('add_nosk');
        route::post('/revisi/{id}/{slug}/{kode}','KecamatanV2@revForm')->name('rev_formulir');
        route::get('/setujuForm/{id}/{slug}/{kode}', 'KecamatanV2@SetujuKec')->name('setujuForm');


        route::get('/pengaturan-akun', 'KecamatanV2@pengaturanAkunKec')->name('pengaturanAkunKec');
        route::post('/pengaturan-akun/profil-akun', 'KecamatanV2@akunProfil')->name('profilAkun');
        route::post('/pengaturan-akun/password-akun', 'KecamatanV2@akunPass')->name('akunPass');
        route::post('/pengaturan-akun/informasi-daerah-akun', 'KecamatanV2@profilDaerah')->name('profilDaerah');

        route::get('/pengaturan-layanan', 'KecamatanV2@pengaturanLayanan');
        route::get('/pengaturan-layanan/{slug}', 'KecamatanV2@infoLayanan');
        route::post('/pengaturan-layanan/{slug}', 'KecamatanV2@infoLayananUbah')->name('ubahInfo');
        route::get('/pengaturan-layanan/{slug}/{slug2}', 'KecamatanV2@infoSublayanan');
        route::post('/pengaturan-layanan/{slug}/{slug2}', 'KecamatanV2@infoSublayananUbah')->name('ubahInfoSub');
    });
});

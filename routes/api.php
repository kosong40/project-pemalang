<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/pelayananlist', 'ApiAll@pelayanan');
Route::get('/desakelurahan', 'ApiAll@desakelurahan');
Route::get('/akunpage', 'ApiAll@HalamanAkun');
Route::get('/layanan/{slug}', 'ApiAll@dataLayanan');
Route::get('/layanan/{slug1}/{slug2}', 'ApiAll@dataSublayanan');

Route::get('/pelayananlistV2', 'ApiAll@pelayananV2');

Route::get('/pelayanan','ApiAll@allData')->name('getData');
Route::get('/pelayanan/cetak','ApiAll@DataCetak')->name('getDataCetak');
route::get('/pelayanan/cetak/{desa}','ApiAll@DataCetakDesa')->name('getDataCetakDesa');
route::get('/pelayanan/revisi/{desa}','ApiAll@DataRevisiDesa')->name('getDataRevisi');
Route::get('/pelayanan/v2/{slug}', 'ApiAll@dataLayananV2')->name('api-pelayanan');
Route::get('/sublayanan/v2/{slug}', 'ApiAll@dataSublayananV2')->name('api-sublayanan');
Route::get('/pelayanan/desa/v2/{slug}/{desa}', 'ApiAll@dataLayananV2Desa')->name('api-pelayanan-desa');
Route::get('/sublayanan/desa/v2/{slug}/{slug1}/{desa}', 'ApiAll@dataSublayananV2Desa')->name('api-pelayanan-desa-sub');
// http://localhost/tugas-akhir/public/api/pelayanan/v2/izin-mendirikan-bangunan

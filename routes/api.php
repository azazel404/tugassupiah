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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user', 'middleware' => 'auth:nasabah'], function(){
	Route::get('/test', 'Api\NasabahController@test');
});

Route::post('/login', 'Api\AuthController@login');

Route::post('/pengaduan', 'Api\PengaduanController@createPengaduan');
Route::post('/pengajuan', 'Api\PengajuanController@createPengajuan');
Route::get('/suku-bunga', 'Api\SukuBungaController@getSukuBunga');
Route::get('/profile', 'Api\CompanyProfileController@getCompanyProfile');

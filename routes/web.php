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

Route::get('/', 'User\HomeController@index');

Route::get('/login', function(){
	return view('layouts.auth.login');
});

Route::get('/contact', 'User\HomeController@contact');
Route::get('/profile-perusahaan', 'User\HomeController@profile');
Route::get('/suku-bunga', 'User\HomeController@sukuBunga');
Route::get('/fitur-layanan', 'User\HomeController@service');

Route::get('/admin', 'Admin\AdminController@dashboard');

Route::get('/admin/marketing', 'Admin\AdminController@marketing');
Route::get('/admin/marketing/edit', 'Admin\AdminController@editMarketing');

Route::get('/admin/suku-bunga', 'Admin\AdminController@sukuBunga');
Route::get('/admin/suku-bunga/edit', 'Admin\AdminController@editSukuBunga');

Route::get('/admin/category', 'Admin\AdminController@category');
Route::get('/admin/category/edit', 'Admin\AdminController@editCategory');

Route::get('/admin/pengaduan', 'Admin\AdminController@pengaduan');
Route::get('/admin/pengajuan', 'Admin\AdminController@pengajuan');

Route::get('/admin/nasabah', 'Admin\AdminController@nasabah');
Route::get('/admin/nasabah/add', 'Admin\AdminController@addNasabah');

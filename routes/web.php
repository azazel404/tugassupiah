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
Route::get('/contact', 'User\HomeController@contact');
Route::get('/profile-perusahaan', 'User\HomeController@profile');
Route::get('/suku-bunga', 'User\HomeController@sukuBunga');
Route::get('/fitur-layanan', 'User\HomeController@service');

Route::get('/admin', 'Admin\AdminController@dashboard');
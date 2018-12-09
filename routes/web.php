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

Route::get('/login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('/login', 'Auth\AuthController@login')->name('login.submit');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
	Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');

	Route::group(['prefix' => 'manage-account'], function(){
		Route::group(['prefix' => 'admin'], function(){
			Route::get('/', 'Admin\AdminController@adminAccount')->name('admin.manage-account.admin');
			
			Route::get('/add', 'Admin\AdminController@addAdminAccount')->name('admin.manage-account.admin.add');
			Route::post('/create', 'Admin\AdminController@createAdminAccount')->name('admin.manage-account.admin.create');

			Route::get('/edit/{id}', 'Admin\AdminController@editAdminAccount')->name('admin.manage-account.admin.edit');
			Route::post('/update/{id}', 'Admin\AdminController@updateAdminAccount')->name('admin.manage-account.admin.update');

			Route::get('/activate/{id}', 'Admin\AdminController@activateAdminAccount')->name('admin.manage-account.admin.activate');
			Route::get('/banned/{id}', 'Admin\AdminController@bannedAdminAccount')->name('admin.manage-account.admin.banned');
		});
	});

	Route::group(['prefix' => 'marketing'], function(){
		Route::get('/', 'Admin\MarketingController@index')->name('admin.marketing');
		Route::get('/add', 'Admin\MarketingController@addMarketing')->name('admin.marketing.add');
		Route::post('/create', 'Admin\MarketingController@createMarketing')->name('admin.marketing.create');

		Route::get('/edit/{id}', 'Admin\MarketingController@editMarketing')->name('admin.marketing.edit');
		Route::post('/update/{id}', 'Admin\MarketingController@updateMarketing')->name('admin.marketing.update');

		Route::get('/delete/{id}', 'Admin\MarketingController@deleteMarketing')->name('admin.marketing.delete');
	});
});


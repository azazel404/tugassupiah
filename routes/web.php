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

// Route::get('/', 'User\HomeController@index')->name('home');


// keterangan route
// get : nampilkan data
// post : mengeksekusi fitur add submit  data tersebut
// put : mengeksekusi fitur update submit data tersebut
// delete : delete data  

//tampilan index pertama login

Route::get('/', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('/login', 'Auth\AuthController@login')->name('login.submit');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');



//url routing : admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
	Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
	Route::get('/maintain', function(){
		return view('layouts.admin.maintain');
	})->name('admin.maintain');

	//url routing : admin/materi
	Route::group(['prefix' => 'materi'], function(){
		Route::get('/', 'Admin\MateriController@index')->name('admin.materi');
		Route::get('/add', 'Admin\MateriController@addMateri')->name('admin.materi.add');
		Route::post('/create', 'Admin\MateriController@createMateri')->name('admin.materi.create');
		Route::get('/edit/{id}', 'Admin\MateriController@editMateri')->name('admin.materi.edit');
		Route::post('/update/{id}', 'Admin\MateriController@updateMateri')->name('admin.materi.update');
		Route::get('/delete/{id}', 'Admin\MateriController@deleteMateri')->name('admin.materi.delete');
	});
	//url routing : admin/content
	Route::group(['prefix' => 'content'], function(){
		Route::get('/', 'Admin\ContentController@index')->name('admin.content');
		Route::get('/add', 'Admin\ContentController@addContent')->name('admin.content.add');
		Route::post('/create', 'Admin\ContentController@createContent')->name('admin.content.create');
		Route::get('/edit/{id}', 'Admin\ContentController@editContent')->name('admin.content.edit');
		Route::post('/update/{id}', 'Admin\ContentController@updateContent')->name('admin.content.update');
		Route::get('/delete/{id}', 'Admin\ContentController@deleteContent')->name('admin.content.delete');
	});
	//url routing : admin/view-materi
	Route::group(['prefix' => 'view-materi'], function(){
		Route::get('/', 'Admin\ViewMateriController@index')->name('admin.viewmateri');
		
	});
	//url routing : admin/view-berita
	Route::group(['prefix' => 'view-berita'], function(){
		Route::get('/', 'Admin\BeritaController@index')->name('admin.berita');
		Route::get('/detail/{id}', 'Admin\BeritaController@detailBerita')->name('admin.berita.detail');
		
	});
	//url routing : admin/manage-account
	Route::group(['prefix' => 'manage-account'], function(){
		Route::group(['prefix' => 'admin'], function(){
			Route::get('/', 'Admin\AdminController@adminAccount')->name('admin.manage-account.admin');

			Route::get('/add', 'Admin\AdminController@addAdminAccount')->name('admin.manage-account.admin.add');
			Route::post('/create', 'Admin\AdminController@createAdminAccount')->name('admin.manage-account.admin.create');

			Route::get('/edit/{id}', 'Admin\AdminController@editAdminAccount')->name('admin.manage-account.admin.edit');
			Route::post('/update/{id}', 'Admin\AdminController@updateAdminAccount')->name('admin.manage-account.admin.update');

			Route::get('/activate/{id}', 'Admin\AdminController@activateAdminAccount')->name('admin.manage-account.admin.activate');
			Route::get('/banned/{id}', 'Admin\AdminController@bannedAdminAccount')->name('admin.manage-account.admin.banned');
			Route::get('/delete/{id}','Admin\AdminController@deleteAccount')->name('admin.manage-account.admin.delete');
		});
	});
});

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

Route::get('/', 'User\HomeController@index')->name('home');

Route::get('/login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('/login', 'Auth\AuthController@login')->name('login.submit');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

Route::get('/contact', 'User\HomeController@contact')->name('contact');
Route::get('/profile', 'User\CompanyProfileController@index')->name('profile');
Route::get('/suku-bunga', 'User\HomeController@sukuBunga')->name('sukubunga');
Route::get('/content/c/{category_id}', 'User\ContentController@getContentByCategory')->name('content.category');
Route::get('/content/s/{category_item_id}', 'User\ContentController@getContentByCategoryItem')->name('content.subCategory');
Route::get('/content/d/{slug}', 'User\ContentController@getDetailContent')->name('content.detail');
Route::get('/content/err/404', 'User\ContentController@contentNotFound')->name('content.notfound');

Route::get('/mobile/profile', 'User\MobileContentController@getCompanyProfile');
Route::get('/mobile/product', 'User\MobileContentController@getAllProduct');
Route::get('/mobile/d/{id}' , 'User\MobileContentController@getDetailContent')->name('mobile.content.detail');
// ROute::get('/content', 'User\HomeController@content');

Route::group(['prefix' => 'service'], function(){
	Route::get('/', 'User\ServiceController@index')->name('service');
	Route::post('/pengaduan', 'User\ServiceController@createPengaduan')->name('service.pengaduan');
	Route::post('/pengajuan', 'User\ServiceController@createPengajuan')->name('service.pengajuan');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
	Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
	Route::get('/maintain', function(){
		return view('layouts.admin.maintain');
	})->name('admin.maintain');

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

	Route::group(['prefix' => 'slideshow'], function(){
		Route::get('/', 'Admin\SlideshowController@index')->name('admin.slideshow');
		Route::get('/add', 'Admin\SlideshowController@addSlideshow')->name('admin.slideshow.add');
		Route::post('/create', 'Admin\SlideshowController@createSlideshow')->name('admin.slideshow.create');
		Route::get('/edit/{id}', 'Admin\SlideshowController@editSlideshow')->name('admin.slideshow.edit');
		Route::post('/update/{id}', 'Admin\SlideshowController@updateSlideshow')->name('admin.slideshow.update');
		Route::get('/delete/{id}', 'Admin\SlideshowController@deleteSlideshow')->name('admin.slideshow.delete');
	});

	Route::group(['prefix' => 'category'], function(){
		Route::get('/', 'Admin\CategoryController@index')->name('admin.category');
		Route::get('/add', 'Admin\CategoryController@addCategory')->name('admin.category.add');
		Route::post('/create', 'Admin\CategoryController@createCategory')->name('admin.category.create');
		Route::get('/edit/{id}', 'Admin\CategoryController@editCategory')->name('admin.category.edit');
		Route::post('/update/{id}', 'Admin\CategoryController@updateCategory')->name('admin.category.update');
		Route::get('/delete/{id}', 'Admin\CategoryController@deleteCategory')->name('admin.category.delete');
		Route::get('/json/{category_id}', 'Admin\CategoryController@getJsonCategoryItem')->name('admin.category.json');

		Route::group(['prefix' => 'item'], function(){
			Route::post('/create', 'Admin\CategoryController@createCategoryItem')->name('admin.category.item.create');
			Route::post('/update', 'Admin\CategoryController@updateCategoryItem')->name('admin.category.item.update');
			Route::get('/delete/{id}', 'Admin\CategoryController@deleteCategoryItem')->name('admin.category.item.delete');
		});
	});

	Route::group(['prefix' => 'content'], function(){
		Route::get('/', 'Admin\ContentController@index')->name('admin.content');
		Route::get('/add', 'Admin\ContentController@addContent')->name('admin.content.add');
		Route::post('/create', 'Admin\ContentController@createContent')->name('admin.content.create');
		Route::get('/edit/{id}', 'Admin\ContentController@editContent')->name('admin.content.edit');
		Route::post('/update/{id}', 'Admin\ContentController@updateContent')->name('admin.content.update');
		Route::get('/delete/{id}', 'Admin\ContentController@deleteContent')->name('admin.content.delete');
	});

	Route::group(['prefix' => 'pengaduan'], function(){
		Route::get('/', 'Admin\PengaduanController@index')->name('admin.pengaduan');
		Route::get('/delete/{id}', 'Admin\PengaduanController@deletePengaduan');
	});

	Route::group(['prefix' => 'pengajuan'], function(){
		Route::get('/', 'Admin\PengajuanController@index')->name('admin.pengajuan');
		Route::get('/delete/{id}', 'Admin\PengajuanController@deletePengajuan');
	});

	Route::group(['prefix' => 'suku-bunga'], function(){
		Route::get('/', 'Admin\SukuBungaController@index')->name('admin.sukuBunga');
		Route::get('/add', 'Admin\SukuBungaController@addSukuBunga')->name('admin.sukuBunga.add');
		Route::post('/create', 'Admin\SukuBungaController@createSukuBunga')->name('admin.sukuBunga.create');
		Route::get('/edit/{id}', 'Admin\SukuBungaController@editSukuBunga')->name('admin.sukuBunga.edit');
		Route::post('/update/{id}', 'Admin\SukuBungaController@updateSukuBunga')->name('admin.sukuBunga.update');
		Route::get('/delete/{id}', 'Admin\SukuBungaController@deleteSukuBunga')->name('admin.sukuBunga.delete');
	});

	Route::group(['prefix' => 'profile'], function(){
		Route::get('/edit', 'Admin\CompanyProfileController@editCompanyProfile')->name('admin.profile.edit');
		Route::post('/update', 'Admin\CompanyProfileController@updateCompanyProfile')->name('admin.profile.update');
	});

	Route::post('/upload-image', 'Api\ImageUploadController@uploadImage');
});


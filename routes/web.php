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

Route::get('/test', [
	'uses' => 'HomeController@test',
	'as' => 'test'
]);

// ============ ROUTE USER ===============
Route::get('/', function () {
    return redirect('/login');
})->name('kk');
// Login route
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('/verify/{token}/{id}', [
	'uses' => 'Auth\RegisterController@verify',
	'as' => 'verify',
]);
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('user/logout', [
	'uses' => 'Auth\LoginController@userLogout',
	'as' => 'user.logout',
]);

Route::group(['middleware' => 'auth'], function ()
{
	Route::get('/me', [
		'uses' => 'HomeController@index',
		'as' => 'home'
	]);

	Route::get('/notifikasi', [
		'uses' => 'NotifikasiController@index',
		'as' => 'notifikasi',
	]);

	Route::get('/histori', [
		'uses' => 'HistoriController@index',
		'as' => 'histori',
	]);

	Route::get('/konfirmasi', function ()
	{
		return redirect('/histori');
	});

	Route::get('/konfirmasi/{id}', [
		'uses' => 'KonfirmasiController@index',
		'as' => 'konfirmasi.id',
	]);

	// Route untuk KELAS
	Route::group(['prefix' => '/kelas'], function ()
	{
		Route::get('/', [
			'uses' => 'KelasController@index',
			'as' => 'kelas'
		]);

		Route::get('/kursus', function ()
		{
			return redirect('/kelas');
		});

		Route::get('kursus/{id}/materi', [
			'uses' => 'KelasController@showMateri',
			'as' => 'kelas.kursus.materi',
		]);

		Route::get('kursus/{id}/materi/{id_materi}', [
			'uses' => 'KelasController@detailMateri',
			'as' => 'kelas.kursus.materi.detail',
		]);

		Route::get('kursus/{id}/tugas', [
			'uses' => 'KelasController@showTugas',
			'as' => 'kelas.kursus.tugas',
		]);

		Route::get('kursus/{id}/tugas/{id_tugas}', [
			'uses' => 'KelasController@detailTugas',
			'as' => 'kelas.kursus.tugas.detail',
		]);

		Route::get('kursus/{id}/diskusi', [
			'uses' => 'KelasController@showDiskusi',
			'as' => 'kelas.kursus.diskusi',
		]);

		Route::get('/promosi', [
			'uses' => 'KelasController@promosi',
			'as' => 'kelas.promosi',
		]);

		Route::get('/promosi/{id}', [
			'uses' => 'KelasController@detailPromosi',
			'as' => 'kelas.promosi.id',
		]);
	});


	// Route untuk KURSUS
	Route::group(['prefix' => '/kursus'], function ()
	{
		Route::get('/', function ()
		{
			return redirect('kursus/all');
		});
		Route::get('/free', function ()
		{
			return redirect('kursus/free/all');
		});

		Route::get('/free/{id}', [
			'uses' => 'KursusController@indexFree',
			'as' => 'kursus.free.id',
		]);

		Route::get('/{id}', [
			'uses' => 'KursusController@index',
			'as' => 'kursus.id',
		]);

		Route::get('/checkout/{id}', [
			'uses' => 'KursusController@showCheckoutForm',
			'as' => 'kursus.checkout.id',
		]);

		Route::post('/checkout/{id}', [
			'uses' => 'KursusController@postCheckoutForm',
			'as' => 'kursus.checkout.post'
		]);
	});


	// ROUTE UNTUK EXPERT
	Route::group(['prefix' => '/expert'], function ()
	{
		Route::get('/', [
			'uses' => 'ExpertController@index',
			'as' => 'expert',
		]);

		Route::get('/{id}', [
			'uses' => 'ExpertController@detail',
			'as' => 'expert.id',
		]);
	});


	// ROUTE UNTUK API USER
	Route::group(['prefix' => '/api'], function ()
	{
		// Main api request
		Route::get('/', [
			'uses' => 'UserApiController@index',
			'as' => 'api',
		]);

		// API PESAN
		Route::get('/pesan/all/{id}', [
			'uses' => 'UserApiController@semuaPesan',
			'as' => 'api.pesan',
		]);

		Route::get('/pesan/{id}', [
			'uses' => 'UserApiController@detPesan',
			'as' => 'api.pesan.id',
		]);

		Route::post('/pesan', [
			'uses' => 'UserApiController@postPesan',
			'as' => 'api.pesan.post',
		]);

		Route::post('/pesan/setFalse', [
			'uses' => 'UserApiController@setFalse',
			'as' => 'api.pesan.setfalse',
		]);
	});
});

// Route::group(['middleware' => 'auth:admin'], function ()
// {
	// ============ ROUTE ADMIN ===============
	Route::group(['prefix' => '/admin'], function ()
	{

		Route::get('/', function ()
		{
			return redirect(route('admin.dashboard'));
			// return "ini admin";
		});

		Route::get('/login', [
			'uses' => 'AdminLoginController@showLoginForm',
			'as' => 'admin.login',
		]);

		Route::post('/login', [
			'uses' => 'AdminLoginController@login',
			'as' => 'admin.login.submit',
		]);

		Route::get('/dashboard', [
			'uses' => 'AdminController@index',
			'as' => 'admin.dashboard',
		]);

		Route::get('/logout', [
			'uses' => 'AdminLoginController@adminLogout',
			'as' => 'admin.logout',
		]);

		Route::post('/password/email', [
			'uses' => 'Auth\AdminForgotPasswordController@sendResetLinkEmail',
			'as' => 'admin.password.email'
		]);
		Route::get('/password/reset', [
			'uses' => 'Auth\AdminForgotPasswordController@showLinkRequestForm',
			'as' => 'admin.password.requests'
		]);
		Route::post('/password/reset', [
			'uses' => 'Auth\AdminResetPasswordController@reset'
		]);
		Route::get('password/reset/{token}', [
			'uses' => 'Auth\AdminResetPasswordController@showResetForm',
			'as' => 'admin.password.reset'
		]);
	});
// });

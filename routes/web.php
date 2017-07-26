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

// ============ ROUTE USER ===============
Route::get('/', function () {
    return redirect('/login');
})->name('kk');

// Login route
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Register Route
Route::get('register', function() {
	return redirect('login')->with('activated_tab', 'register');
})->name('register');

Route::post('register', [
	'uses' => 'Auth\RegisterController@register',
]);

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

	// Profil Route
	Route::get('/profil', [
		'uses' => 'ProfilController@index',
		'as' => 'profil',
	]);

	Route::post('/profil', [
		'uses' => 'ProfilController@postProfil',
		'as' => 'post.profil'
	]);

	Route::post('/profil/update_password', [
		'uses' => 'ProfilController@postPassword',
		'as' => 'profil.password',
	]);

	Route::get('/notifikasi', [
		'uses' => 'NotifikasiController@index',
		'as' => 'notifikasi',
	]);

	Route::get('/histori', [
		'uses' => 'HistoriController@index',
		'as' => 'histori',
	]);

	Route::get('/histori/show/{id}', [
		'uses' => 'HistoriController@show',
		'as' => 'histori.show'
	]);

	Route::post('/histori/fetchData', [
		'uses' => 'HistoriController@getHistori',
	]);

	Route::get('/bookmark', [
		'uses' => 'BookmarkController@index',
		'as' => 'bookmark',
	]);

	Route::post('/bookmark/delete', [
		'uses' => 'BookmarkController@postDelete',
		'as' => 'bookmark.delete',
	]);

	Route::post('/bookmark/add', [
		'uses' => 'BookmarkController@store',
		'as' => 'bookmark.add'
	]);

	Route::get('/konfirmasi', function ()
	{
		return redirect('/histori');
	});

	Route::get('/konfirmasi/{id}', [
		'uses' => 'KonfirmasiController@index',
		'as' => 'konfirmasi.id',
	]);

	Route::post('/konfirmasi', [
		'uses' => 'KonfirmasiController@postKonfirmasi',
		'as' => 'konfirmasi.post',
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

		Route::post('kursus/tugas/upload_jawaban/{id_jawaban}', [
			'uses' => 'KelasController@postTugas',
			'as' => 'kelas.tugas.post',
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
	Route::get('/app/main/register/device/admin_register/code/{code}', [
		'as' => 'admin.device.register',
		function($code){
			return redirect('/admin/login')->cookie('device_auth', Hash::make($code));
		},
	]);
	// ============ ROUTE ADMIN ===============
	Route::group(['prefix' => '/admin', 'middleware' => 'NoAdminNoEntry'], function ()
	{

		Route::get('/', function ()
		{
			return redirect(route('admin.dashboard'));
			// return "ini admin";
		});

		// ROUTE UNTUK API ADMIN
		Route::group(['prefix' => '/api'], function ()
		{
			// Main api request
			Route::get('/', [
				'uses' => 'Admin\ApiController@index',
				'as' => 'api',
			]);

			// API PESAN
			Route::get('/pesan/all/{id}', [
				'uses' => 'Admin\ApiController@semuaPesan',
				'as' => 'api.pesan',
			]);

			Route::get('/pesan/{id}', [
				'uses' => 'Admin\ApiController@detPesan',
				'as' => 'api.pesan.id',
			]);

			Route::post('/pesan', [
				'uses' => 'Admin\ApiController@postPesan',
				'as' => 'api.pesan.post',
			]);

			Route::post('/pesan/setFalse', [
				'uses' => 'Admin\ApiController@setFalse',
				'as' => 'api.pesan.setfalse',
			]);
		});

		Route::get('/login', [
			'uses' => 'AdminLoginController@showLoginForm',
			'as' => 'admin.login',
		]);

		Route::post('/login', [
			'uses' => 'AdminLoginController@login',
			'as' => 'admin.login.submit',
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

		Route::get('/dashboard', [
			'uses' => 'AdminController@index',
			'as' => 'admin.dashboard',
		]);

		Route::group(['prefix' => '/messanger'], function ()
		{
			// Pesan
			Route::get('/', [
				'uses' => 'Admin\MessangerController@index',
				'as' => 'admin.messa'
			]);
			Route::get('/{id}', [
				'uses' => 'Admin\MessangerController@detail',
				'as' => 'a.messa.d'
			]);
			// Ajax Pesan
			Route::get('/fetch_all', [
				'uses' => 'Admin\MessangerController@ajax_fetch_all',
				'as' => 'ajax.messa'
			]);
			// Tambah Pesan
			Route::post('/add', [
				'uses' => 'Admin\MessangerController@store',
				'as' => 'a.messa.a'
			]);
			// Ubah Pesan
			Route::post('/update', [
				'uses' => 'Admin\MessangerController@update',
				'as' => 'a.messa.u'
			]);
			// Hapus Pesan
			Route::post('/delete', [
				'uses' => 'Admin\MessangerController@destroy',
				'as' => 'a.messa.d'
			]);
			// Show Detail per Pesan
			Route::get('/show/{id}', [
				'uses' => 'Admin\MessangerController@show',
				'as' => 'a.messa.s'
			]);
		});

		Route::group(['prefix' => '/kursus'], function ()
		{
			// Kursus
			Route::get('/', [
				'uses' => 'Admin\KursusController@index',
				'as' => 'admin.kursus'
			]);
			// Ajax Kursus
			Route::get('/fetch_all', [
				'uses' => 'Admin\KursusController@ajax_fetch_all',
				'as' => 'ajax.kursus'
			]);
			// Tambah Kursus
			Route::post('/add', [
				'uses' => 'Admin\KursusController@store',
				'as' => 'a.kursus.a'
			]);
			// Ubah Kursus
			Route::post('/update', [
				'uses' => 'Admin\KursusController@update',
				'as' => 'a.kursus.u'
			]);
			// Hapus Kursus
			Route::post('/delete', [
				'uses' => 'Admin\KursusController@destroy',
				'as' => 'a.kursus.d'
			]);
			// Show Detail per kursus
			Route::get('/show/{id}', [
				'uses' => 'Admin\KursusController@show',
				'as' => 'a.kursus.s'
			]);
		});

		Route::group(['prefix' => '/promosi'], function()
		{
			// Promosi
			Route::get('/', [
				'uses' => 'Admin\PromosiController@index',
				'as' => 'admin.promosi'
			]);
			// Ajax Promosi
			Route::get('/fetch_all', [
				'uses' => 'Admin\PromosiController@ajax_fetch_all',
				'as' => 'ajax.promosi'
			]);
			// Tambah Promosi
			Route::post('/add', [
				'uses' => 'Admin\PromosiController@store',
				'as' => 'a.promosi.a'
			]);
			// Ubah Promosi
			Route::post('/update', [
				'uses' => 'Admin\PromosiController@update',
				'as' => 'a.promosi.u'
			]);
			// Hapus Promosi
			Route::post('/delete', [
				'uses' => 'Admin\PromosiController@destroy',
				'as' => 'a.promosi.d'
			]);
			// Show Detail per kursus
			Route::get('/show/{id}', [
				'uses' => 'Admin\PromosiController@show',
				'as' => 'a.promosi.s'
			]);
		});

		Route::group(['prefix' => '/expert'], function()
		{
			// Expert
			Route::get('/', [
				'uses' => 'Admin\ExpertController@index',
				'as' => 'admin.expert'
			]);
			// Ajax Expert
			Route::get('/fetch_all', [
				'uses' => 'Admin\ExpertController@ajax_fetch_all',
				'as' => 'ajax.expert'
			]);
			// Tambah Expert
			Route::post('/add', [
				'uses' => 'Admin\ExpertController@store',
				'as' => 'a.expert.a'
			]);
			// Ubah Expert
			Route::post('/update', [
				'uses' => 'Admin\ExpertController@update',
				'as' => 'a.expert.u'
			]);
			// Hapus Expert
			Route::post('/delete', [
				'uses' => 'Admin\ExpertController@destroy',
				'as' => 'a.expert.d'
			]);
			// Show Detail per Expert
			Route::get('/show/{id}', [
				'uses' => 'Admin\ExpertController@show',
				'as' => 'a.expert.s'
			]);
		});

		Route::group(['prefix' => '/pembimbing'], function()
		{
			// Pembimbing
			Route::get('/', [
				'uses' => 'Admin\PembimbingController@index',
				'as' => 'admin.pembimbing'
			]);
			// Ajax Pembimbing
			Route::get('/fetch_all', [
				'uses' => 'Admin\PembimbingController@ajax_fetch_all',
				'as' => 'ajax.pembimbing'
			]);
			// Tambah Pembimbing
			Route::post('/add', [
				'uses' => 'Admin\PembimbingController@store',
				'as' => 'a.pembimbing.a'
			]);
			// Ubah Pembimbing
			Route::post('/update', [
				'uses' => 'Admin\PembimbingController@update',
				'as' => 'a.pembimbing.u'
			]);
			// Hapus Pembimbing
			Route::post('/delete', [
				'uses' => 'Admin\PembimbingController@destroy',
				'as' => 'a.pembimbing.d'
			]);
			// Show Detail per Pembimbing
			Route::get('/show/{id}', [
				'uses' => 'Admin\PembimbingController@show',
				'as' => 'a.pembimbing.s'
			]);
		});

		Route::group(['prefix' => '/kategori'], function()
		{
			// Kategori
			Route::get('/', [
				'uses' => 'Admin\KategoriController@index',
				'as' => 'admin.kategori'
			]);
			// Ajax Kategori
			Route::get('/fetch_all', [
				'uses' => 'Admin\KategoriController@ajax_fetch_all',
				'as' => 'ajax.kategori'
			]);
			// Tambah Kategori
			Route::post('/add', [
				'uses' => 'Admin\KategoriController@store',
				'as' => 'a.kategori.a'
			]);
			// Ubah Kategori
			Route::post('/update', [
				'uses' => 'Admin\KategoriController@update',
				'as' => 'a.kategori.u'
			]);
			// Hapus Kategori
			Route::post('/delete', [
				'uses' => 'Admin\KategoriController@destroy',
				'as' => 'a.kategori.d'
			]);
			// Show Detail per Kategori
			Route::get('/show/{id}', [
				'uses' => 'Admin\KategoriController@show',
				'as' => 'a.kategori.s'
			]);
		});

		Route::group(['prefix' => '/bank'], function()
		{
			// Bank
			Route::get('/', [
				'uses' => 'Admin\BankController@index',
				'as' => 'admin.bank'
			]);
			// Ajax Bank
			Route::get('/fetch_all', [
				'uses' => 'Admin\BankController@ajax_fetch_all',
				'as' => 'ajax.bank'
			]);
			// Tambah Bank
			Route::post('/add', [
				'uses' => 'Admin\BankController@store',
				'as' => 'a.bank.a'
			]);
			// Ubah Bank
			Route::post('/update', [
				'uses' => 'Admin\BankController@update',
				'as' => 'a.bank.u'
			]);
			// Hapus Bank
			Route::post('/delete', [
				'uses' => 'Admin\BankController@destroy',
				'as' => 'a.bank.d'
			]);
			// Show Detail per Bank
			Route::get('/show/{id}', [
				'uses' => 'Admin\BankController@show',
				'as' => 'a.bank.s'
			]);
		});

		Route::group(['prefix' => '/materi'], function()
		{
			// Materi
			Route::get('/', [
				'uses' => 'Admin\MateriController@index',
				'as' => 'admin.materi'
			]);
			// Ajax Materi
			Route::get('/fetch_all', [
				'uses' => 'Admin\MateriController@ajax_fetch_all',
				'as' => 'ajax.materi'
			]);
			// Get Latest Number Materi
			Route::get('/get_no_urut', [
				'uses' => 'Admin\MateriController@ajax_gno',
				'as' => 'ajax.materi.gno'
			]);
			// Tambah Materi
			Route::post('/add', [
				'uses' => 'Admin\MateriController@store',
				'as' => 'a.materi.a'
			]);
			// Tambah Materi Dari Materi Lama
			Route::post('/add_old', [
				'uses' => 'Admin\MateriController@storeOld',
				'as' => 'a.materiold.a'
			]);
			// Ubah Materi
			Route::post('/update', [
				'uses' => 'Admin\MateriController@update',
				'as' => 'a.materi.u'
			]);
			// Hapus Materi
			Route::post('/delete', [
				'uses' => 'Admin\MateriController@destroy',
				'as' => 'a.materi.d'
			]);
			// Show Detail per Materi
			Route::get('/show/{id}', [
				'uses' => 'Admin\MateriController@show',
				'as' => 'a.materi.s'
			]);
		});

		Route::group(['prefix' => '/upgrade-materi'], function()
		{
			// Materi
			Route::get('/', [
				'uses' => 'Admin\UpgradeMateriController@index',
				'as' => 'admin.upmateri'
			]);
			// Ajax Materi
			Route::get('/fetch_all', [
				'uses' => 'Admin\UpgradeMateriController@ajax_fetch_all',
				'as' => 'ajax.upmateri'
			]);
			Route::get('/fetch_option', [
				'uses' => 'Admin\UpgradeMateriController@ajax_fetch_option',
				'as' => 'ajax.upmateri.opt'
			]);
			// Tambah Materi
			Route::post('/add', [
				'uses' => 'Admin\UpgradeMateriController@store',
				'as' => 'a.upmateri.a'
			]);
			// Tambah Materi Dari Materi Lama
			Route::post('/add_old', [
				'uses' => 'Admin\UpgradeMateriController@storeOld',
				'as' => 'a.upmateriold.a'
			]);
			// Ubah Materi
			Route::post('/update', [
				'uses' => 'Admin\UpgradeMateriController@update',
				'as' => 'a.upmateri.u'
			]);
			Route::post('/upgrade', [
				'uses' => 'Admin\UpgradeMateriController@upgrade',
				'as' => 'a.upgrade_m.u'
			]);
			// Hapus Materi
			Route::post('/delete', [
				'uses' => 'Admin\UpgradeMateriController@destroy',
				'as' => 'a.upmateri.d'
			]);
			// Show Detail per Materi
			Route::get('/show/{id}', [
				'uses' => 'Admin\UpgradeMateriController@show',
				'as' => 'a.upmateri.s'
			]);
		});

		Route::group(['prefix' => '/upgrade-tugas'], function()
		{
			Route::get('/', [
				'uses' => 'Admin\UpgradeTugasController@index',
				'as' => 'admin.uptugas'
			]);

			Route::get('/fetch_all', [
				'uses' => 'Admin\UpgradeTugasController@ajax_fetch_all',
				'as' => 'ajax.uptugas'
			]);

			Route::get('/fetch_option', [
				'uses' => 'Admin\UpgradeTugasController@ajax_fetch_option',
				'as' => 'ajax.uptugas.opt'
			]);

			Route::post('/add', [
				'uses' => 'Admin\UpgradeTugasController@store',
				'as' => 'a.uptugas.a'
			]);

			Route::post('/add_old', [
				'uses' => 'Admin\UpgradeTugasController@storeOld',
				'as' => 'a.uptugasold.a'
			]);

			Route::post('/update', [
				'uses' => 'Admin\UpgradeTugasController@update',
				'as' => 'a.uptugas.u'
			]);

			Route::post('/upgrade', [
				'uses' => 'Admin\UpgradeTugasController@upgrade',
				'as' => 'a.upgrade_t.u'
			]);

			Route::post('/delete', [
				'uses' => 'Admin\UpgradeTugasController@destroy',
				'as' => 'a.uptugas.d'
			]);

			Route::get('/show/{id}', [
				'uses' => 'Admin\UpgradeTugasController@show',
				'as' => 'a.uptugas.s'
			]);
		});

		Route::group(['prefix' => '/tugas'], function()
		{
			// Tugas
			Route::get('/', [
				'uses' => 'Admin\TugasController@index',
				'as' => 'admin.tugas'
			]);
			// Ajax Tugas
			Route::get('/fetch_all', [
				'uses' => 'Admin\TugasController@ajax_fetch_all',
				'as' => 'ajax.tugas'
			]);
			// Get Latest Number Tugas
			Route::get('/get_no_urut', [
				'uses' => 'Admin\TugasController@ajax_gno',
				'as' => 'ajax.tugas.gno'
			]);
			// Tambah Tugas
			Route::post('/add', [
				'uses' => 'Admin\TugasController@store',
				'as' => 'a.tugas.a'
			]);
			// Tambah Materi Dari Tugas Lama
			Route::post('/add_old', [
				'uses' => 'Admin\TugasController@storeOld',
				'as' => 'a.tugasold.a'
			]);
			// Ubah Tugas
			Route::post('/update', [
				'uses' => 'Admin\TugasController@update',
				'as' => 'a.tugas.u'
			]);
			// Hapus Tugas
			Route::post('/delete', [
				'uses' => 'Admin\TugasController@destroy',
				'as' => 'a.tugas.d'
			]);
			// Show Detail per Tugas
			Route::get('/show/{id}', [
				'uses' => 'Admin\TugasController@show',
				'as' => 'a.tugas.s'
			]);
		});

		// Koreksi Tugas
		Route::group(['prefix' => '/koreksi-tugas'], function()
		{
			// Tugas
			Route::get('', [
				'uses' => 'Admin\KoreksiTugasController@index',
				'as' => 'admin.koreksi_tugas'
			]);
			// Ajax Tugas
			Route::get('/fetch_all', [
				'uses' => 'Admin\KoreksiTugasController@ajax_fetch_all',
				'as' => 'ajax.koreksi'
			]);
			// Ubah Tugas
			Route::post('/update', [
				'uses' => 'Admin\KoreksiTugasController@update',
				'as' => 'a.koreksi.u'
			]);
			// Show Detail per Tugas
			Route::get('/show/{id}', [
				'uses' => 'Admin\KoreksiTugasController@show',
				'as' => 'a.koreksi.s'
			]);
		});

		Route::group(['prefix' => '/user'], function()
		{
			// User
			Route::get('/', [
				'uses' => 'Admin\UserController@index',
				'as' => 'admin.user'
			]);
			// Ajax User
			Route::get('/fetch_all', [
				'uses' => 'Admin\UserController@ajax_fetch_all',
				'as' => 'ajax.user'
			]);
			// Tambah User
			Route::post('/add', [
				'uses' => 'Admin\UserController@store',
				'as' => 'a.user.a'
			]);
			// Ubah User
			Route::post('/update', [
				'uses' => 'Admin\UserController@update',
				'as' => 'a.user.u'
			]);
			// Hapus User
			Route::post('/delete', [
				'uses' => 'Admin\UserController@destroy',
				'as' => 'a.user.d'
			]);
			// Show Detail per User
			Route::get('/show/{id}', [
				'uses' => 'Admin\UserController@show',
				'as' => 'a.user.s'
			]);
		});

		Route::group(['prefix' => '/konfirmasi'], function()
		{
			// Konfirmasi Bayar
			Route::get('/', [
				'uses' => 'Admin\KonfirmasiController@index',
				'as' => 'admin.konf'
			]);
			// Ajax Konfirmasi Bayar
			Route::get('/fetch_all', [
				'uses' => 'Admin\KonfirmasiController@ajax_fetch_all',
				'as' => 'ajax.konf'
			]);
			// Tambah Konfirmasi Bayar
			Route::post('/add', [
				'uses' => 'Admin\KonfirmasiController@store',
				'as' => 'a.konf.a'
			]);
			// Ubah Konfirmasi Bayar
			Route::post('/update', [
				'uses' => 'Admin\KonfirmasiController@update',
				'as' => 'a.konf.u'
			]);
			// Hapus Konfirmasi Bayar
			Route::post('/delete', [
				'uses' => 'Admin\KonfirmasiController@destroy',
				'as' => 'a.konf.d'
			]);
			// Show Detail per Konfirmasi Bayar
			Route::get('/show/{id}', [
				'uses' => 'Admin\KonfirmasiController@show',
				'as' => 'a.konf.s'
			]);
		});

		Route::group(['prefix' => '/daftar-keahlian'], function()
		{
			// Buat Daftar Keahlian
			Route::get('/', [
				'uses' => 'Admin\DaftarKeahlianController@index',
				'as' => 'admin.buatk'
			]);
			// Buat Daftar Keahlian
			Route::get('/fetch_all', [
				'uses' => 'Admin\DaftarKeahlianController@ajax_fetch_all',
				'as' => 'ajax.buatk'
			]);
			// Buat Daftar Keahlian
			Route::post('/add', [
				'uses' => 'Admin\DaftarKeahlianController@store',
				'as' => 'a.buatk.a'
			]);
			// Buat Daftar Keahlian
			Route::post('/update', [
				'uses' => 'Admin\DaftarKeahlianController@update',
				'as' => 'a.buatk.u'
			]);
			// Buat Daftar Keahlian
			Route::post('/delete', [
				'uses' => 'Admin\DaftarKeahlianController@destroy',
				'as' => 'a.buatk.d'
			]);
			// Buat Daftar Keahlian
			Route::get('/show/{id}', [
				'uses' => 'Admin\DaftarKeahlianController@show',
				'as' => 'a.buatk.s'
			]);
		});

	});
// });

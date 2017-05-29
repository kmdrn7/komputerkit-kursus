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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/logout', [
	'uses' => 'Auth\LoginController@userLogout',
	'as' => 'user.logout',
]);

// , 'middleware' => 'isadmin'
Route::group(['prefix' => '/admin'], function ()
{

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

	Route::get('/', function ()
	{
		return redirect(route('admin.dashboard'));
	});

	// Route untuk reset password
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

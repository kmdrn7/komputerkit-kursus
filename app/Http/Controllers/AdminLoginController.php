<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    //

	public function __construct()
	{
		$this->middleware('guest:admin')->except(['adminLogout']);
		if ( Auth::guard('admin')->viaRemember() ) {
			redirect(route('admin.dashboard'));
		}
	}

	public function showLoginForm()
	{
		return view('auth.admin-login');
	}

	public function login(Request $request)
	{
		// Validasi form inputan data
		$this->validate($request, [
			'email' => 'required|email',
			'password'=> 'required|min:6',
			'g-recaptcha-response' => 'required|min:100'
		], [
			'email.required' => 'Email harus diisi untuk login',
			'email.email' => 'Masukkan email yang valid',
			'password.min' => 'Password harus berisi paling tidak :min karakter',
			'password.required' => 'Password harus diisi untuk login',
			'g-recaptcha-response.required' => 'Konfirmasikan bahwa anda bukan robot',
			'g-recaptcha-response.min' => 'Tolong ulangi lagi',
		]);

		// Attempt to log the user in
		// If success, redirect to their intend locale_get_display_region
		// if wrong, redirect back to login
		if ( Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember) ) {
			return redirect()->intended(route('admin.dashboard'));
		}

		return redirect()->back()->withInput($request->only('email', 'remember'))->with('errLog', 'Kami tidak bisa menemukan user yang anda gunakan');
	}

	public function adminLogout()
	{
		Auth::guard('admin')->logout();

		return redirect('/admin/login');
	}
}

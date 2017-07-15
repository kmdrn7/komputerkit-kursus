<?php

namespace App\Http\Controllers\Auth;

use DB;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/me';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'userLogout']);
		if ( Auth::viaRemember() ) {
			redirect('/me');
		}
    }

	public function userLogout()
	{
		Auth::guard('web')->logout();

		return redirect('/login');
	}

	public function login(Request $request)
	{
		$this->validateLogin($request);

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		// dd($request);
		$status = DB::table('tbl_user')->where(['email' => $request->email])->first();

		if ( isset($status) ) {
			if ( $status->status == 0 ) {

				return redirect('/login')->with('aktivasi', 'Akun anda belum aktif, silahkan aktivasi melalui email yang kami kirim');
			}
		}

		if ($this->attemptLogin($request)) {

			return $this->sendLoginResponse($request);
		}

		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}

	protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|email|string',
            'password' => 'required|string',
			'g-recaptcha-response' => 'required'
        ], [
			'g-recaptcha-response.required' => 'Konfirmasikan bahwa anda bukan robot',
		]);
    }

	protected function sendFailedLoginResponse(Request $request)
    {
        // $errors = [$this->username() => trans('auth.failed')];
		$errors = [$this->username() => 'Identitas yang anda gunakan tidak terdaftar dalam sistem kami'];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

	protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

		$auth = Auth::user();

		if ( $auth->nickname != '' && $auth->tgl_lahir != '' && $auth->alamat != '' && $auth->sekolah != '' ) { } else {

			return redirect('/profil')->with('first_login', '1');
		}

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }
}

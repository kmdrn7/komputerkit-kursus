<?php

namespace App\Http\Controllers\Auth;

use DB;
use Hash;
use App\User;
use Carbon\Carbon;
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
		User::where('id_user', Auth::id())->update([
			'session_time' => NULL,
		]);

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

		$status = User::where(['email' => $request->email])->first();

		if ( isset($status) ) {
			if ( $status->status == 0 ) {
				return redirect('/login')->with('aktivasi', 'Akun anda belum aktif, silahkan aktivasi melalui email yang kami kirim');
			}

			if ( isset($status->session_time) ) {
				if ( $status->session_time != Carbon::createFromTimestamp(9999999999) ) {
					if ( ($diff = Carbon::now()->diffInMinutes($status->session_time, false)) > 2  ) {
						return redirect('/login')->with('err_login_time', $diff);
					} else {
						User::where(['email' => $request->email])->update([
							'session_time' => Carbon::now()->addMinutes(120),
						]);
					}
				} else {
					$diff = $status->session_time->diffInDays(Carbon::now());
					return redirect('/login')->with('err_login_time', $diff);
				}
			} else {
				if ( !isset($request->remember) ) {
					User::where(['email' => $request->email])->update([
						'session_time' => Carbon::now()->addMinutes(120),
					]);
				} else {
					User::where(['email' => $request->email])->update([
						'session_time' => Carbon::createFromTimestamp(9999999999),
					]);
				}
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
		$errors = ['identitas' => 'Identitas yang anda gunakan tidak terdaftar dalam sistem kami'];

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

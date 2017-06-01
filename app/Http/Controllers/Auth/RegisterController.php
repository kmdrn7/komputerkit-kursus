<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Mail;
use App\Mail\userRegistered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tbl_user',
            'password' => 'required|string|min:6|confirmed',
			'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'token' => str_random(60),
        ]);

		Mail::to($user->email)->send(new userRegistered($user));
    }

	public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
		//
        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
		return redirect('/login');
    }

	protected function registered(Request $request, $user)
    {
        //
    }

	public function verify($token, $id)
	{
		$user = User::find($id);
		if ( $user ) {
			if ( $token == $user->token ) {
				$user->status = 1;
				$user->save();
				$this->guard()->login($user);
				return redirect('/me');
			}
			return redirect('/login')->with('token_fail', 'Token missmatch');
		}
	}
}

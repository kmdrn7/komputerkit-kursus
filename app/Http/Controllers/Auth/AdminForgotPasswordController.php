<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use Illuminate\Http\Request;

class AdminForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

	public function showLinkRequestForm()
    {
        return view('auth.passwords.email-admin');
    }

	public function sendResetLinkEmail(Request $request)
	{
		$this->validateEmail($request);

		// We will send the password reset link to this user. Once we have attempted
		// to send the link, we will examine the response then see the message we
		// need to show to the user. Finally, we'll send out a proper response.
		$response = $this->broker('admins')->sendResetLink(
			$request->only('email')
		);

		return $response == Password::RESET_LINK_SENT
					? $this->sendResetLinkResponse($response)
					: $this->sendResetLinkFailedResponse($request, $response);
	}

	protected function broker()
	{
		return Password::broker('admins');
	}
}

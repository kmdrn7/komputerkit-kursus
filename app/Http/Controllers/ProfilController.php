<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use User;
use Hash;
use Illuminate\Http\Request;

class ProfilController extends Controller
{

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

    public function index()
    {
		$data['user'] = Auth::user();
		return view('user.profil.profil', $data);
    }

	public function postProfil(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'nickname' => 'required',
			'email' => 'required',
			'tgl_lahir'=> 'required',
			'alamat' => 'required',
			'sekolah' => 'required',
		], [
			'nama.required' => 'Nama harus diisi',
		]);

		DB::table('tbl_user')
			->where('id_user', Auth::id())
			->update([
				'name' => $request->name,
				'nickname' => $request->nickname,
				'email' => $request->email,
				'tgl_lahir' => $request->tgl_lahir,
				'alamat' => $request->alamat,
				'sekolah' => $request->sekolah,
			]);

		return back();
	}

	public function postPassword(Request $request)
	{
		$this->validate($request, [
			'is_modal_password' => 'required',
			'old_password' => 'required|old_password:' . Auth::user()->password,
			'new_password' => 'required|string|min:6|confirmed',
			'new_password_confirmation' => 'required'
		], [
			'old_password.required' => 'Password lama harus diisi',
			'old_password.old_password' => 'Password lama anda harus sesuai',
			'new_password.confirmed' => 'Password yang anda masukkan harus sama'
		]);

		DB::table('tbl_user')
			->where('id_user', Auth::id())
			->update([
				'password' => Hash::make($request->new_password),
			]);

		return back()->with('up_pass_succ', '1');
	}

	public function update(Request $request)
	{

	}

	public function isJsonRequest($request)
	{
		if ( $request->expectsJson() ) {
			return true;
		}

		return false;
	}
}

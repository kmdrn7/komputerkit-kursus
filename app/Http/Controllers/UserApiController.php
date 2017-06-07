<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Pesan;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
    	echo "terimakasih telah menggunakan api user ini";
    }

	public function semuaPesan()
	{
		return Pesan::all();
	}

	public function postPesan(Request $request)
	{
		$data = [
			'id_detail_kursus' => $request->id_detail_kursus,
			'dari' => Auth::user()->name,
			'pesan' => $request->pesan,
			'flag_pesan' => 1,
		];

		Pesan::create($data);

		return ['result' => $data];
	}
}

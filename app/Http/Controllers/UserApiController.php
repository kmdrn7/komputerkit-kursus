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

	public function semuaPesan($id)
	{
		// return Pesan::where('id_detail_kursus', $id)->where('flag_pesan', 1)->limit(10)->orderBy('id_pesan', 'desc')->get();
		return Pesan::where('id_detail_kursus', $id)->where('flag_pesan', 1)->get();
	}

	public function detPesan($id)
	{
		return Pesan::where('id_detail_kursus', $id)->where('flag_pesan', 0)->get();
	}

	public function postPesan(Request $request)
	{

		$user = Auth::user();

		$data = [
			'id_detail_kursus' => $request->id_detail_kursus,
			'dari' => $user->name,
			'pesan' => $request->pesan,
			'flag_pesan' => 1,
		];

		$pesan = Pesan::create($data);
	}

	public function setFalse(Request $request)
	{
		$id = $request->id_pesan;
		$pesan = Pesan::find($id);
		$pesan->flag_pesan = 1;
		$pesan->save();
		return ['update' => "Berhasil"];
	}
}

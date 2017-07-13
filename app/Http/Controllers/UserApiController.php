<?php

namespace App\Http\Controllers;

use DB;
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
		Pesan::where('id_detail_kursus', $id)
				->update([
					'flag_terkirim' => 1
				]);
		Pesan::where('id_detail_kursus', $id)
				->where('dari', 'admin')
				->update([
					'flag_pesan' => 1
				]);
		return Pesan::where('id_detail_kursus', $id)->get();
	}

	public function detPesan($id)
	{
		return Pesan::where('id_detail_kursus', $id)
					->where('dari', '<>', Auth::user()->name)
					->where('flag_pesan', 0)
					->where('flag_terkirim', 1)
					->get();
	}

	public function postPesan(Request $request)
	{

		$user = Auth::user();

		$data = [
			'id_detail_kursus' => $request->id_detail_kursus,
			'dari' => $user->name,
			'pesan' => $request->pesan,
			'flag_terkirim' => 1,
			'flag_pesan' => 0,
		];

		$pesan = Pesan::create($data);
	}

	public function setFalse(Request $request)
	{
		$id = $request->id_pesan;

		DB::table('tbl_pesan')->where('id_pesan', $id)->update([
			'flag_pesan' => 1
		]);

		return ['update' => "Berhasil"];
	}
}

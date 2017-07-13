<?php

namespace App\Http\Controllers\Admin;

use DB;
use View;
use Response;
use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
	public function index()
    {
    	echo "terimakasih telah menggunakan api admin ini";
    }

	public function semuaPesan($id)
	{
		// return Pesan::where('id_detail_kursus', $id)->where('flag_pesan', 1)->limit(10)->orderBy('id_pesan', 'desc')->get();
		Pesan::where('id_detail_kursus', $id)
				->where('dari', '<>', 'admin')
				->update([
					'flag_pesan' => 1
				]);
		return Pesan::where('id_detail_kursus', $id)->get();
		// return Pesan::where('id_detail_kursus', $id)->where('flag_pesan', 1)->get();
	}

	public function detPesan($id)
	{
		return Pesan::where('id_detail_kursus', $id)
					->where('dari', '<>', 'admin')
					->where('flag_pesan', 0)
					->where('flag_terkirim', 1)
					->get();
	}

	public function postPesan(Request $request)
	{

		$data = [
			'id_detail_kursus' => $request->id_detail_kursus,
			'dari' => 'admin',
			'pesan' => $request->pesan,
			'flag_pesan' => 0,
			'flag_terkirim' => 1,
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

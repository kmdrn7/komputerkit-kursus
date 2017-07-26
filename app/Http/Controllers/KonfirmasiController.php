<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Bayar;
use App\Models\Bank;
use App\Models\Kursus;
use App\Models\QDetailBayar;
use App\Models\DetailKursus;
use App\Models\QDetailKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonfirmasiController extends Controller
{

    public function index($id)
    {

		if ( $this->isExists($id) ) {

			$data['bank'] = Bank::all();
			$data['kursus'] = QDetailKursus::find(explode('--', $id)[1]);
			$data['bayar'] = QDetailBayar::find(explode('--', $id)[2]);
			return view('user.histori.konfirmasi', $data);
		}

		App::abort(404, 'Halaman yang anda minta sudah dimakan oleh si pacman :()');
    }

	public function isExists($id='')
	{
		$kursus = Kursus::find(explode('--', $id)[0])->count();
		$detail = QDetailKursus::find(explode('--', $id)[1])->count();
		$bayar = Bayar::find(explode('--', $id)[2])->count();

		if ( $kursus > 0 && $detail > 0 && $bayar > 0 ) {
			return true;
		}

		return false;
	}

	public function postKonfirmasi(Request $request)
	{
		//lakukan check terlebih dahulu

		$this->validate($request, [
			'detail_materi' => 'required',
			'atas_nama' => 'required',
			'bank_asal' => 'required',
			'bank_tujuan' => 'required',
			'tgl_bayar' => 'required'
		], [
			'atas_nama.required' => 'Kolom :attribute dibutuhkan untuk konfirmasi',
			'bank_asal.required' => 'Kolom :attribute dibutuhkan untuk konfirmasi',
			'bank_tujuan.required' => 'Kolom :attribute dibutuhkan untuk konfirmasi',
			'tgl_bayar.required' => 'Kolom :attribute dibutuhkan untuk konfirmasi',
		]);

		$detail = explode('/', $request->detail_materi);

		Bayar::where([
			'id_detail_kursus' => $detail[1],
			'id_user' => Auth::id(),
			'id_bayar' => $detail[3],
		])->update([
			'faktur' => $request->detail_materi .'/'. Auth::id(),
			'atas_nama' => $request->atas_nama,
			'nama_bank' => $request->bank_asal,
			'bank_tujuan' => $request->bank_tujuan,
			'tgl_bayar' => $request->tgl_bayar,
			'status' => 2,
		]);

		if ( DB::table('tbl_bayar')->where('id_detail_kursus', $detail[1])->count() >= 1 ) {
			return redirect('/histori');
		} else {
			DetailKursus::where('id_detail_kursus', $detail[1])
			->update([
				'flag_kursus' => 2
			]);

			return redirect('/histori');
		}

	}

}

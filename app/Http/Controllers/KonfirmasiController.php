<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Bank;
use App\Models\Kursus;
use App\Models\QDetailKursus;
use App\Models\DetailKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonfirmasiController extends Controller
{

    public function index($id)
    {

		if ( $this->isExists($id) ) {

			$data['bank'] = Bank::all();
			$data['kursus'] = QDetailKursus::find(explode('--', $id)[1]);
			return view('user.histori.konfirmasi', $data);
		}

		App::abort(404, 'Halaman yang anda minta sudah dimakan oleh si pacman :()');
    }

	public function isExists($id='')
	{
		$kursus = Kursus::find(explode('--', $id)[0])->count();
		$detail = QDetailKursus::find(explode('--', $id)[1])->count();

		if ( $kursus > 0 && $detail > 0 ) {
			return true;
		}

		return false;
	}

	public function postKonfirmasi(Request $request)
	{
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
		$date = str_replace('/', '-', $request->tgl_bayar);
		$tgl_bayar = date('Y-m-d', strtotime($date));

		Bayar::create([
			'id_user' => Auth::id(),
			'id_detail_kursus' => $detail[1],
			'faktur' => $request->detail_materi .'/'. Auth::id(),
			'atas_nama' => $request->atas_nama,
			'nama_bank' => $request->bank_asal,
			'bank_tujuan' => $request->bank_tujuan,
			'ket_bayar' => $request->ket_bayar,
			'tgl_bayar' => $tgl_bayar,
			'status' => 0,
		]);

		DetailKursus::where('id_detail_kursus', $detail[1])
					->update([
						'flag_kursus' => 2
					]);

		return redirect('/histori');
	}

}

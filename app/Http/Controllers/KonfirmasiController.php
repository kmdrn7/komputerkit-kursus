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

		return "redirect ke halaman 404";
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
		]);

		$detail = explode('/', $request->detail_materi);

		Bayar::create([
			'id_user' => Auth::id(),
			'id_detail_kursus' => $detail[1],
			'faktur' => $request->detail_materi .'/'. Auth::id(),
			'atas_nama' => $request->atas_nama,
			'nama_bank' => $request->bank_asal,
			'bank_tujuan' => $request->bank_tujuan,
			'ket_bayar' => $request->ket_bayar,
			'tgl_bayar' => $request->tgl_bayar,
			'status' => 0,
		]);

		DetailKursus::where('id_detail_kursus', $detail[1])
					->update([
						'flag_kursus' => 2
					]);

		return redirect('/histori');
	}

}

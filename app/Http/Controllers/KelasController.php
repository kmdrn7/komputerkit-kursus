<?php

namespace App\Http\Controllers;

use App;
use Route;
use App\User;
use Carbon\Carbon;
use App\Models\Kursus;
use App\Models\Promosi;
use App\Models\DetailKursus;
use App\Models\DetailMateri;
use App\Models\DetailTugas;
use App\Models\QDetailKursus;
use App\Models\QDetailMateri;
use App\Models\QDetailTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{

	protected $id_user;

	public function __construct()
	{
		$this->id_user = Auth::id();
	}

	public function abort($message)
	{
		App::abort(404, $message);
	}

    public function index()
    {
		$data['promosi'] = Promosi::limit(1)->first();
		$data['now'] = Carbon::now();
		// $data['qkursus'] = User::find(Auth::id())->detailkursus()->orderBy('id_detail_kursus', 'asc')->get();
		$data['qkursus'] = User::find(Auth::id())->detailBayar()->orderBy('id_detail_kursus', 'asc')->groupBy('kursus')->get();
		$data['latest'] = QDetailMateri::where([
				'flag_terbaru'=> 1,
				'id_user' => $this->id_user,
			])->first();
    	return view('user.kelas.kelas',$data);
    }

	public function showMateri($id)
	{
		if ( substr_count($id, "-") === 2 ) {

			$id_kursus 			= explode('--', $id)[0];
			$id_detail_kursus 	= explode('--', $id)[1];

			if ( $this->isActive($id_kursus, $id_detail_kursus) ) {

				$data['kursus'] = QDetailKursus::find($id_detail_kursus);
				$data['materi'] = QDetailMateri::where('id_detail_kursus', $id_detail_kursus)->orderBy('no_urut', 'asc')->get();
				$data['id'] = $id;
				return view('user.kelas.materi', $data);
			} else {
				return $this->abort("Kursus anda tidak aktif");
			}
		}

		return $this->abort("Kelas yang anda kunjungi tidak ada");

	}

	public function detailMateri($id, $id_materi)
	{
		if ( substr_count($id, "-") === 2 ) {

			$id_kursus 			= explode('--', $id)[0];
			$id_detail_kursus 	= explode('--', $id)[1];

			if ( $this->isActive($id_kursus, $id_detail_kursus) ) {

				if ( $this->isExist($id_materi) ) {

					// Update latest activity + watched course
					DetailMateri::where('id_user', Auth::user()->id_user)
								->update(['flag_terbaru' => 0]);
					DetailMateri::where('id_user', Auth::user()->id_user)
								->where('id_detail_materi', $id_materi)
								->update([
									'flag_terbaru' => 1,
									'flag_materi' => 1
								]);

					$materi = QDetailMateri::find($id_materi);
					$no_urut = $materi->no_urut;
					$data['materi'] = $materi;
					$data['next'] = QDetailMateri::where(['id_detail_kursus'=>$id_detail_kursus, 'no_urut'=>($no_urut+1)])->first(['id_detail_materi']);
					$data['prev'] = QDetailMateri::where(['id_detail_kursus'=>$id_detail_kursus, 'no_urut'=>($no_urut-1)])->first(['id_detail_materi']);
					return view('user.kelas.detailMateri', $data);
				}
				return $this->abort("Materi tidak ditemukan");
			}
			return $this->abort("Materi tidak ditemukan");
		}
		return $this->abort("Materi tidak ditemukan");
	}

	public function showTugas($id)
	{
		if ( substr_count($id, "-") === 2 ) {

			$id_kursus 			= explode('--', $id)[0];
			$id_detail_kursus 	= explode('--', $id)[1];

			if ( $this->isActive($id_kursus, $id_detail_kursus) ) {

				$data['kursus'] = QDetailKursus::find($id_detail_kursus);
				$data['tugas'] = QDetailTugas::where('id_detail_kursus', $id_detail_kursus)->get();
				$data['id'] = $id;
				return view('user.kelas.tugas', $data);
			} else {
				return $this->abort("Materi tidak ditemukan");
			}
		}
		return $this->abort("Materi tidak ditemukan");
	}

	public function detailTugas($id, $id_tugas)
	{
		if ( substr_count($id, "-") === 2 ) {

			$id_kursus 			= explode('--', $id)[0];
			$id_detail_kursus 	= explode('--', $id)[1];

			if ( $this->isActive($id_kursus, $id_detail_kursus) ) {

				if ( $this->isExistTugas($id_tugas) ) {

					$data['tugas'] = QDetailTugas::find($id_tugas);
					return view('user.kelas.detailTugas', $data);
				}

				return $this->abort("Materi tidak ditemukan");
			}
			return $this->abort("Materi tidak ditemukan");
		}
		return $this->abort("Materi tidak ditemukan");
	}

	public function postTugas(Request $request)
	{
		$this->validate($request, [
			'id' => 'required',
			'id_detail_tugas' => 'required|integer',
			'link_jawaban' => 'required|url|active_url'
		], [
			'link_jawaban.url' => 'Link jawaban harus dalam bentuk url yang bisa di download',
			'link_jawaban.required' => 'Link jawaban tidak boleh kosong',
			'link_jawaban.active_url' => 'Link jawaban tidak boleh sembarangan',
		]);

		DetailTugas::where('id_detail_tugas', $request->id_detail_tugas)
					->where('id_user', Auth::id())
					->update([
						'jawaban' => $request->link_jawaban,
						'flag' => 1,
					]);

		return back();
	}

	public function showDiskusi($id)
	{
		if ( substr_count($id, "-") === 2 ) {

			$id_kursus 			= explode('--', $id)[0];
			$id_detail_kursus 	= explode('--', $id)[1];

			if ( $this->isActive($id_kursus, $id_detail_kursus) ) {

				$data['id'] = $id;
				$data['id_detail_kursus'] = $id_detail_kursus;
				$data['kursus'] = QDetailKursus::find($id_detail_kursus);

				return view('user.kelas.diskusi', $data);
			} else {
				return $this->abort("Materi tidak ditemukan");
			}
			return $this->abort("Materi tidak ditemukan");
		}
		return $this->abort("Materi tidak ditemukan");
	}

	public function isActive($id_kursus, $id_detail_kursus)
	{
		$exist = DetailKursus::where('id_user', Auth::id())
							->where('id_kursus', $id_kursus)
							->where('id_detail_kursus', $id_detail_kursus)
							->where('flag_kursus', 1)
							->count();

		if ( $exist > 0 ) {
			return true;
		} else {
			return false;
		}
	}

	public function isExist($id)
	{
		if ( QDetailMateri::find($id) ) {
			return true;
		} else {
			return false;
		}
	}

	public function isExistTugas($id)
	{
		if ( QDetailTugas::find($id) ) {
			return true;
		} else {
			return false;
		}
	}
}

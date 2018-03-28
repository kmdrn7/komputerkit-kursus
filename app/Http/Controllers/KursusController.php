<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use View;
use App;
use Response;
use Carbon\Carbon;
use App\Models\Bayar;
use App\Models\Materi;
use App\Models\Kursus;
use App\Models\Kategori;
use App\Models\DetailKursus;
use App\Models\QDetailMateri;
use App\Models\QDetailKursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function index(Request $request, $id)
	{

		$bookmark = DB::table('tbl_bookmark')->where('id_user', Auth::id())->get();
		$data['bookmark'] = $bookmark;

		if ( $id == 'all' ) {

			// Ajax Request
			if ( $this->isJsonRequest($request) ) {
				$req = $request->all();

				if ( isset($req['kursus']) ) {

					$data['kursus'] = Kursus::where('kursus', 'like', "%".$req['kursus']."%")->paginate(6);
					return Response::json(View::make('user.kursus.kursus', $data)->render());
				}

				$data['kursus'] = Kursus::paginate(6);
				return Response::json(View::make('user.kursus.kursus', $data)->render());
			}

			$data['kursus'] = Kursus::paginate(6);
			$data['kategori'] = Kategori::all();
			$data['selected'] = 'all';
			return view('user.kursus.list', $data);
		}

		if ( $this->isCategory($id) ) {

			// Ajax Request
			if ( $this->isJsonRequest($request) ) {
				$req = $request->all();

				if ( isset($req['kursus']) ) {

					$data['kursus'] = Kursus::where('kursus', 'like', "%".$req['kursus']."%")->where('kategori', $id)->paginate(6);
					return Response::json(View::make('user.kursus.kursus', $data)->render());
				}

				$data['kursus'] = Kursus::where('kategori', $id)->paginate(6);
				return Response::json(View::make('user.kursus.kursus', $data)->render());
			}

			$data['kursus'] = Kursus::where('kategori', $id)->paginate(6);
			$data['kategori'] = Kategori::all();
			$data['selected'] = $id;
			return view('user.kursus.list', $data);
		}

		// Lihat detail dari kursus
		if ( $this->isExists($id) ) {

			if ( $id == 'all' ) {
				$data['kursus'] = Kursus::all();
			} else {
				$idKursus = explode('--', $id)[1];
				$data['now'] = Carbon::now();
				$data['kursus'] = Kursus::where('slug', $id)->first();
				$data['materi'] = Materi::where('id_kursus', $idKursus)->get();
				$data['detail_kursus'] = QDetailKursus::where('id_user', Auth::id())->where('id_kursus', $idKursus)->first();
			}

			return view('user.kursus.detail', $data);

		} else {
			App::abort(404, 'Halaman yang anda minta sudah dimakan oleh si pacman :()');
		}
	}

	public function indexFree(Request $request, $id)
	{

		if ( $id == 'all' ) {

			// Ajax Request
			if ( $this->isJsonRequest($request) ) {
				$req = $request->all();

				if ( isset($req['kursus']) ) {

					$data['kursus'] = DB::table('q_kursus')->where('kursus', 'like', "%".$req['kursus']."%")->paginate(8);
					return Response::json(View::make('user.kursus.kursusfree', $data)->render());
				}

				$data['kursus'] = DB::table('q_kursus')->paginate(8);
				return Response::json(View::make('user.kursus.kursusfree', $data)->render());
			}

			$data['kursus'] = DB::table('q_kursus')->paginate(8);
			$data['kategori'] = Kategori::all();
			$data['selected'] = 'all';
			return view('user.kursus.listfree', $data);
		}

		if ( $this->isCategory($id) ) {

			// Ajax Request
			if ( $this->isJsonRequest($request) ) {
				$req = $request->all();

				if ( isset($req['kursus']) ) {

					$data['kursus'] = Kursus::where('kursus', 'like', "%".$req['kursus']."%")->where('kategori', $id)->paginate(10);
					return Response::json(View::make('user.kursus.kursusfree', $data)->render());
				}

				$data['kursus'] = Kursus::where('kategori', $id)->paginate(10);
				return Response::json(View::make('user.kursus.kursusfree', $data)->render());
			}

			$data['kursus'] = Kursus::where('kategori', $id)->paginate(10);
			$data['kategori'] = Kategori::all();
			$data['selected'] = $id;
			return view('user.kursus.listfree', $data);
		}

		// Lihat detail kursus
		if ( $this->isExists($id) ) {

			if ( $id == 'all' ) {
				$data['kursus'] = Kursus::all();
			} else {
				$idKursus = explode('--', $id)[1];
				$data['kursus'] = Kursus::where('slug', $id)->first();
				$data['materi'] = Materi::where('id_kursus', $idKursus)->where('paket', 1)->orderBy('no_urut', 'asc')->get();
			}

			return view('user.kursus.detailfree', $data);

		} else {
			App::abort(404, 'Halaman yang anda minta sudah dimakan oleh si pacman :()');
		}
	}

	public function isExists($id='')
	{
		if ($id == '') {
			return false;
		}

		if ( $id == 'all' ) {
			return true;
		}

		if ( Kursus::where('slug', $id)->count() > 0 ) {
			return true;
		}

		return false;
	}

	public function isCategory($id)
	{
		if ( Kategori::where('slug', $id)->get()->count() > 0 ) {
			return true;
		}
		return false;
	}

	public function showCheckoutForm($id)
	{
		if ( $this->isExists($id) ) {
			$kursus = Kursus::where('slug', $id)->first();
			$data['bank'] = DB::table('tbl_bank')->get();
			$data['kursus'] = $kursus;
			$data['kursus_lain'] = Kursus::where('kursus', 'like', '%'.$kursus->kursus.'%')->get();
			$data['detail_kursus'] = QDetailKursus::where('id_user', Auth::id())->where('slug', $id)->first();
			return view('user.kursus.checkout', $data);
		}

		return redirect('/kursus');
	}

	public function postCheckoutForm(Request $request, $id)
	{

		if ( $this->isExists($id) ) {

			$this->validate($request, [
				'id_kursus' => 'required',
				'nama_kursus' => 'required',
				'price' => 'required',
				'waktu' => 'required',
				'bayar' => 'required',
			], [
				'id_kursus.required' =>  'ID Kursus harus diisi',
				'nama_kursus.required' => 'Nama kursus harus diisi',
				'price.required' => 'Harga kursus harus diisi',
				'waktu.required' => 'Waktu harus diisi',
				'bayar.required' => 'Harga bayar harus terisi',
			]);

			$id_user = Auth::guard()->user()->id_user;
			$detail_kursus = QDetailKursus::where('id_user', $id_user)->where('slug', $id)->first();

			if ( count($detail_kursus) > 0 ) {

				Bayar::create([
					'id_user' => $id_user,
					'id_detail_kursus' => $detail_kursus->id_detail_kursus,
					'ket_bayar' => 'perpanjangan',
					'status' => 0,
				]);

				return redirect('/histori');

			} else {

				$detail = DetailKursus::create([
					'id_kursus' => $request->id_kursus,
					'id_user' => $id_user,
					'bayar' => $request->bayar,
					'flag_kursus' => 0,
				])->id_detail_kursus;

				Bayar::create([
					'id_user' => $id_user,
					'id_detail_kursus' => $detail,
					'ket_bayar' => 'beli',
				]);

				return redirect('/histori');
			}
		}

		return redirect('/me');
	}

	public function isJsonRequest($request)
	{
		if ( $request->expectsJson() ) {
			return true;
		}

		return false;
	}
}

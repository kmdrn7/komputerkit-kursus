<?php

namespace App\Http\Controllers;

use Auth;
use View;
// use Request;
use Response;
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
		if ( $id == 'all' ) {

			// Ajax Request
			if ( $this->isJsonRequest($request) ) {
				$req = $request->all();

				if ( isset($req['kursus']) ) {

					$data['kursus'] = Kursus::where('kursus', 'like', "%".$req['kursus']."%")->paginate(3);
					return Response::json(View::make('user.kursus.kursus', $data)->render());
				}

				$data['kursus'] = Kursus::paginate(3);
				return Response::json(View::make('user.kursus.kursus', $data)->render());
			}

			$data['kursus'] = Kursus::paginate(3);
			$data['kategori'] = Kategori::all();
			return view('user.kursus.list', $data);
		}

		if ( $this->isCategory($id) ) {

			// Ajax Request
			if ( $this->isJsonRequest($request) ) {
				$req = $request->all();

				if ( isset($req['kursus']) ) {

					$data['kursus'] = Kursus::where('kursus', 'like', "%".$req['kursus']."%")->where('kategori', $id)->paginate(3);
					return Response::json(View::make('user.kursus.kursus', $data)->render());
				}

				$data['kursus'] = Kursus::where('kategori', $id)->paginate(3);
				return Response::json(View::make('user.kursus.kursus', $data)->render());
			}

			$data['kursus'] = Kursus::where('kategori', $id)->paginate(3);
			$data['kategori'] = Kategori::all();
			return view('user.kursus.list', $data);
		}

		// Lihat detail kursus
		if ( $this->isExists($id) ) {

			if ( $id == 'all' ) {
				$data['kursus'] = Kursus::all();
			} else {
				$idKursus = explode('--', $id)[1];
				$data['kursus'] = Kursus::where('slug', $id)->first();
				$data['materi'] = Materi::where('id_kursus', $idKursus)->get();
			}

			return view('user.kursus.detail', $data);

		} else {
			echo "redirect ke halaman 404";
		}
	}

	public function indexFree(Request $request, $id)
	{

		if ( $id == 'all' ) {

			// Ajax Request
			if ( $this->isJsonRequest($request) ) {
				$req = $request->all();

				if ( isset($req['kursus']) ) {

					$data['kursus'] = Kursus::where('kursus', 'like', "%".$req['kursus']."%")->paginate(3);
					return Response::json(View::make('user.kursus.kursusfree', $data)->render());
				}

				$data['kursus'] = Kursus::paginate(3);
				return Response::json(View::make('user.kursus.kursusfree', $data)->render());
			}

			$data['kursus'] = Kursus::paginate(3);
			$data['kategori'] = Kategori::all();
			return view('user.kursus.listfree', $data);
		}

		if ( $this->isCategory($id) ) {

			// Ajax Request
			if ( $this->isJsonRequest($request) ) {
				$req = $request->all();

				if ( isset($req['kursus']) ) {

					$data['kursus'] = Kursus::where('kursus', 'like', "%".$req['kursus']."%")->where('kategori', $id)->paginate(3);
					return Response::json(View::make('user.kursus.kursusfree', $data)->render());
				}

				$data['kursus'] = Kursus::where('kategori', $id)->paginate(3);
				return Response::json(View::make('user.kursus.kursusfree', $data)->render());
			}

			$data['kursus'] = Kursus::where('kategori', $id)->paginate(3);
			$data['kategori'] = Kategori::all();
			return view('user.kursus.listfree', $data);
		}

		// Lihat detail kursus
		if ( $this->isExists($id) ) {

			if ( $id == 'all' ) {
				$data['kursus'] = Kursus::all();
			} else {
				$idKursus = explode('--', $id)[1];
				$data['kursus'] = Kursus::where('slug', $id)->first();
				$data['materi'] = Materi::where('id_kursus', $idKursus)->get();
			}

			return view('user.kursus.detailfree', $data);

		} else {
			echo "redirect ke halaman 404";
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
			$data['kursus'] = $kursus;
			$data['kursus_lain'] = Kursus::where('kursus', 'like', '%'.$kursus->kursus.'%')->get();
			return view('user.kursus.checkout', $data);
		}

		return redirect('/kursus');
	}

	public function postCheckoutForm(Request $request, $id)
	{

		if ( $this->isExists($id) ) {

			DetailKursus::create([
				'id_kursus' => $request->id_kursus,
				'id_user' => Auth::guard()->user()->id_user,
				'bayar' => 0,
				'flag_kursus' => 0,
			]);

			return redirect('/histori');
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

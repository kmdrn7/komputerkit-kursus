<?php

namespace App\Http\Controllers\Admin;

use DB;
use View;
use Response;
use Carbon\Carbon;
use App\Models\Materi;
use App\Models\DetailMateri;
use App\Models\DetailKursus;
use App\Models\QDetailKursus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpgradeMateriController extends Controller
{
	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

    public function index()
    {
		// TODO: Hilangkan where klaus
		$combo = DB::table('tbl_kursus')->get();
		$kursus = QDetailKursus::where('flag_kursus', 1)->where('id_kursus', $combo->first()->id_kursus)->get();
		$data['active'] = 'upgrade_materi';
		$data['kursus'] = $kursus;
		$data['combo_kursus'] = $combo;
		$data['now'] = Carbon::now();
        return view('admin.upgrade_materi.upgrade', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$id = $request->id_kursus;
			$from = $request->fromWho;

			$data = [
				'kursus' => QDetailKursus::where('id_kursus', $id)->get(),
				'now' => Carbon::now(),
			];

			if ( $from == 'modal' ) {
				// return Response::json(View::make('admin.materi.tbl_materi_lama', $data)->render());
			} else {
				return Response::json(View::make('admin.upgrade_materi.tbl_upgrade', $data)->render());
			}

		}
	}

	public function ajax_fetch_option(Request $request)
	{
		if ( $this->isJsonRequest($request) ) {
			$id = $request->id_kursus;

			$data = [
				'option' => DB::table('tbl_materi')->select('paket')->where('id_kursus', $id)->groupBy('paket')->get(),
			];

			return Response::json(View::make('admin.upgrade_materi.paket_option', $data)->render());
		}
	}

    public function create()
    {

    }

    public function store(Request $request)
    {

		if ( $this->isJsonRequest($request) ) {

			foreach ($request->id_detail_materi as $mk) {
				$materi_detail[] = [
					'id_detail_kursus' => $request->id_detail_kursus,
					'id_user' => $request->id_user,
					'id_materi' => $mk,
					'flag_materi' => 0,
					'flag_terbaru' => 0,
				];
			}

			DB::table('tbl_detail_materi')->insert($materi_detail);

			return response(['status' => 1]);
        }

		return response(['status' => 'Data berhasil masuk']);

    }

    public function show(Request $req, $id)
    {
        if ( $this->isJsonRequest($req) ) {

			if ( $req->from == 'modal' ) {
				$materi = DB::table('tbl_materi')->where('id_kursus', $req->id_kursus)->get();
				$from = 'modal';
			} else {
				$materi = DB::table('q_detail_materi')->where('id_detail_kursus', $id)->get();
				$from = 'list';
			}

			$data = [
				'materi' => $materi,
				'from' => $from,
			];

			return Response::json(View::make('admin.upgrade_materi.tbl_list_materi', $data)->render());
        }
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

	public function upgrade(Request $request)
	{
		if ( $this->isJsonRequest($request) ) {

			$paket = DB::table('q_detail_materi')
						->where('id_detail_kursus', $request->id_detail_kursus)
						->where('paket', $request->paket)
						->count();

			if ( $paket > 0 ) {

				return response(['status' => 2]);

			} else {

				$materi_detail = [];
				$materi_collection = DB::table('tbl_materi')->select('id_materi')
										->where('id_kursus', $request->id_kursus)
										->where('paket', $request->paket)->get();
				foreach ($materi_collection as $mk) {
					$materi_detail[] = [
						'id_detail_kursus' => $request->id_detail_kursus,
						'id_user' => $request->id_user,
						'id_materi' => $mk->id_materi,
						'flag_materi' => 0,
						'flag_terbaru' => 0,
					];
				}

				DB::table('tbl_detail_materi')->insert($materi_detail);

				return response(['status' => 1]);

			}
        }

		return response(['status' => 3]);
	}

    public function destroy(Request $req)
    {
        if ( $this->isJsonRequest($req) ) {

			DetailMateri::destroy($req->id_detail_materi);

			return response(['status' => 'Berhasil hapus data']);
        }

		return response(['status' => 'Error saat akan hapus']);
    }

	public function isJsonRequest($request)
	{
		if ( $request->expectsJson() ) {
			return true;
		}

		return false;
	}
}

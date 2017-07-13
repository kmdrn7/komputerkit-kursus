<?php

namespace App\Http\Controllers;

use DB;
use View;
use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\QDetailKursus;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{

    public function index()
    {
		$id_user = Auth::id();
		$data['now'] = Carbon::now();
		$data['histori'] = QDetailKursus::where('id_user', $id_user)->get();
        return view('user.histori.histori', $data);
    }

	public function getHistori(Request $request)
	{
		if ( $this->isJsonRequest($request) ) {


			if ( count($request->all()) >= 2 ) {

				$histori = DB::table('q_detail_kursus')
								->where('id_user', Auth::id())
								->whereBetween('created_at', [$request->tgl_dari, $request->tgl_sampai])
								->get();

				$data['histori'] = $histori;
				return Response::json(View::make('user/histori/tbl_histori', $data)->render());
			} else {
				$histori = DB::table('q_detail_kursus')
								->where('id_user', Auth::id())
								->get();
				$data['histori'] = $histori;
				return Response::json(View::make('user/histori/tbl_histori', $data)->render());
			}
		}
	}

	public function show(Request $req, $id)
	{
		if ( $this->isJsonRequest($req) ) {

			return response(DB::table('q_detail_kursus')->where('id_detail_kursus', $id)->get());
        }
	}

	public function isJsonRequest($request)
	{
		if ( $request->expectsJson() ) {
			return true;
		}

		return false;
	}
}

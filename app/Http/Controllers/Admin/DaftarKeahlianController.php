<?php

namespace App\Http\Controllers\Admin;

use DB;
use View;
use Response;
use App\Models\Expert;
use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarKeahlianController extends Controller
{
	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['active'] = 'buat_keahlian';
		$data['keahlian'] = Expert::all();
		$data['kursus'] = DB::table('q_detail_keahlian')->where('id_keahlian', Expert::all()->first()->id_keahlian)->get();
		$data['kursus_all'] = DB::table('tbl_kursus')->get();
        return view('admin.buat_expert.buat_expert', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$id = $request->id_keahlian;
			$from = $request->fromWho;

			$data['keahlian'] = Expert::all();
			$data['kursus'] = DB::table('q_detail_keahlian')->where('id_keahlian', $id)->get();

			return Response::json(View::make('admin.buat_expert.tbl_buat_expert', $data)->render());
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

		$checked = $request->chk;
		$id = $request->id_keahlian;

		if ( count($checked) > 0 ) {

			foreach ($checked as $c) {

				DB::table('tbl_detail_keahlian')->insert([
					'id_keahlian' => $id,
					'id_kursus' => $c,
					'flag_keahlian' => 1
				]);
			}

			return response(['status' => 'Berhasil masukkan materi yang dipilih']);
		}

		return response(['status' => 'Pilih setidaknya 1 materi untuk dimasukkan ke dalam kursus ini']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, $id)
    {
        if ( $this->isJsonRequest($req) ) {

			$data = DB::table('q_detail_keahlian')->where('id_detail_keahlian' ,$id)->get();
			return response($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        if ( $this->isJsonRequest($req) ) {

			DB::table('tbl_detail_keahlian')->where('id_detail_keahlian', $req->id)->delete();

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

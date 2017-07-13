<?php

namespace App\Http\Controllers\Admin;

use DB;
use View;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessangerController extends Controller
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
		$data['active'] = 'messanger';
		// $data['pesan'] = DB::table('q_detail_pesan')
		// 					->select('*')
		// 					->groupBy('id_detail_kursus')
		// 					->orderBy('flag_pesan', 'asc')
		// 					->orderBy('id_detail_kursus', 'desc')
		// 					->get();
		$data['pesan'] = DB::select('select * from (select * from q_detail_pesan where dari <> "admin" order by id_pesan desc) as pesan group by id_detail_kursus');
        return view('admin.messanger.messanger', $data);
    }

	public function detail($id)
	{
		$id_detail_kursus = explode('--', $id)[1];
		// dd($id_detail_kursus);

		$data['detail'] = DB::table('q_detail_pesan')->where('id_detail_kursus', $id_detail_kursus)->first();
		$data['active'] = 'messanger';
		return view('admin.messanger.detail_messanger', $data);
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

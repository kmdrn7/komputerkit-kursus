<?php

namespace App\Http\Controllers\Admin;

use DB;
use View;
use Auth;
use Response;
use Carbon\Carbon;
use App\Models\Bayar;
use App\Models\QDetailBayar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KonfirmasiController extends Controller
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
		$data['active'] = 'konf_bayar';
		$data['konfirmasi'] = DB::table('q_detail_bayar')->get();
        return view('admin.konf_bayar.konf_bayar', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$req = $request->all();

			$data['konfirmasi'] = DB::table('q_detail_bayar')->get();
			return Response::json(View::make('admin.konf_bayar.tbl_konf_bayar', $data)->render());
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

		// $this->validate($request, [
		// 	'nama_bank' => 'required',
		// 	'atas_nama' => 'required',
		// 	'no_rekening' => 'required',
		// ]);
		//
		// Bank::create([
		// 	'nama_bank' => $request->nama_bank,
		// 	'atas_nama' => $request->atas_nama,
		// 	'no_rekening' => $request->no_rekening,
		// ]);
		//
		// return response(['status' => 'Data berhasil masuk']);

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

			return response(QDetailBayar::find($id));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		$this->validate($request, [
			'id_id' => 'required',
			'status' => 'required',
			'waktu' => 'required',
		]);

		$id_id = explode('/', $request->id_id);
		$id_detail_kursus = $id_id[0];
		$id_kursus = $id_id[1];
		$id_bayar = $id_id[2];
		$id_user = $id_id[3];

		$materi_detail = [];
		$materi_collection = DB::table('tbl_materi')->select('id_materi')
								->where('id_kursus', $id_kursus)->get();
		foreach ($materi_collection as $mk) {
			$materi_detail[] = [
				'id_detail_kursus' => $id_detail_kursus,
				'id_user' => $id_user,
				'id_materi' => $mk->id_materi,
				'flag_materi' => 0,
				'flag_terbaru' => 0,
			];
		}

		$tugas_detail = [];
		$tugas_collection = DB::table('tbl_tugas')->select('id_tugas')
								->where('id_kursus', $id_kursus)->get();
		foreach ($tugas_collection as $tk) {
			$tugas_detail[] = [
				'id_detail_kursus' => $id_detail_kursus,
				'id_user' => $id_user,
				'id_tugas' => $tk->id_tugas,
				'nilai_siswa' => 0,
				'flag' => 0
			];
		}

		DB::table('tbl_detail_materi')->insert($materi_detail);
		DB::table('tbl_detail_tugas')->insert($tugas_detail);

		DB::table('tbl_bayar')->where('id_bayar', $id_bayar)->update([
			'status' => 1,
		]);
		DB::table('tbl_detail_kursus')->where('id_detail_kursus', $id_detail_kursus)->update([
			'flag_kursus' => 1,
			'tgl_mulai' => Carbon::now(),
			'tgl_selesai' => Carbon::now()->addDays($request->waktu),
		]);

		return response(['status' => 'Pembayaran berhasil di konfirmasi']);
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

			$det = DB::table('q_detail_bayar')->where('id_bayar', $req->id)->first();

			Bayar::destroy($req->id);
			DB::table('tbl_detail_kursus')->where('id_detail_kursus', $det->id_detail_kursus)->update([
				'flag_kursus' => 0,
			]);

			return response(['status' => 'Berhasil hapus detail konfirmasi']);
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

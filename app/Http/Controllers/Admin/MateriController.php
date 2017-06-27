<?php

namespace App\Http\Controllers\Admin;

use DB;
use View;
use Response;
use App\Models\Materi;
use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MateriController extends Controller
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
		$kursus = Kursus::all();
		$data['active'] = 'materi';
		$data['kursus'] = $kursus;
		$data['materi'] = Materi::where('id_kursus', $kursus->first()->id_kursus)->get();
        return view('admin.materi.materi', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$id = $request->id_kursus;
			$from = $request->fromWho;

			$data['materi'] = Materi::where('id_kursus', $id)->get();

			if ( $from == 'modal' ) {
				return Response::json(View::make('admin.materi.tbl_materi_lama', $data)->render());
			} else {
				return Response::json(View::make('admin.materi.tbl_materi', $data)->render());
			}

		}
	}

	public function ajax_gno(Request $request)
	{
		if ( $this->isJsonRequest($request) ) {

			$id = $request->id_kursus;
			$data = DB::table('tbl_materi')->where('id_kursus', $id)->orderBy('id_materi', 'desc')->first();

			if ( count($data) > 0 ) {
				return response(['no_urut' => $data->no_urut + 1]);
			}

			return response(['no_urut' => 11]);
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

		$this->validate($request, [
			'id_kursus' => 'required',
			'no_urut' => 'required',
			'materi' => 'required',
			'ket_materi' => 'required',
			'ket_materi_adv' => 'required',
			'target_kursus' => 'required',
			'contoh_pekerjaan' => 'required',
			'yt_embed' => 'required',
			'yt_id' => 'required',
		]);

		Materi::create([
			'id_kursus' => $request->id_kursus,
			'no_urut' => $request->no_urut,
			'materi' => $request->materi,
			'ket_materi' => $request->ket_materi,
			'ket_materi_adv' => $request->ket_materi_adv,
			'target_kursus' => $request->target_kursus,
			'contoh_pekerjaan' => $request->contoh_pekerjaan,
			'yt_embed' => $request->yt_embed,
			'yt_id' => $request->yt_id,
		]);

		return response(['status' => 'Data berhasil masuk']);

    }

	public function storeOld(Request $request)
	{
		$checked = $request->chk;
		$id = $request->id_kursus;

		if ( count($checked) > 0 ) {

			foreach ($checked as $c) {

				$m = DB::table('tbl_materi')->select('*')->where('id_materi', $c)->first();
				DB::table('tbl_materi')->insert([
					'id_kursus' => $id,
					'no_urut' => $m->no_urut,
					'materi' => $m->materi,
					'ket_materi' => $m->ket_materi,
					'ket_materi_adv' => $m->ket_materi_adv,
					'target_kursus' => $m->target_kursus,
					'contoh_pekerjaan' => $m->contoh_pekerjaan,
					'yt_embed' => $m->yt_embed,
					'yt_id' => $m->yt_id,
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

			return response(Materi::find($id));
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
			'no_urut' => 'required',
			'materi' => 'required',
			'ket_materi' => 'required',
			'ket_materi_adv' => 'required',
			'target_kursus' => 'required',
			'contoh_pekerjaan' => 'required',
			'yt_embed' => 'required',
			'yt_id' => 'required',
		]);

		Materi::where('id_materi', $request->id)->update([
			'no_urut' => $request->no_urut,
			'materi' => $request->materi,
			'ket_materi' => $request->ket_materi,
			'ket_materi_adv' => $request->ket_materi_adv,
			'target_kursus' => $request->target_kursus,
			'contoh_pekerjaan' => $request->contoh_pekerjaan,
			'yt_embed' => $request->yt_embed,
			'yt_id' => $request->yt_id,
		]);

		return response(['status' => 'Data berhasil diubah']);

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

			Materi::destroy($req->id);

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

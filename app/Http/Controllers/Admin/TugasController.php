<?php

namespace App\Http\Controllers\Admin;

use DB;
use View;
use Response;
use App\Models\Tugas;
use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TugasController extends Controller
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
		$data['active'] = 'tugas';
		$data['kursus'] = $kursus;
		$data['tugas'] = Tugas::where('id_kursus', $kursus->first()->id_kursus)->get();
        return view('admin.tugas.tugas', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$id = $request->id_kursus;
			$from = $request->fromWho;

			$data['tugas'] = Tugas::where('id_kursus', $id)->get();

			if ( $from == 'modal' ) {
				return Response::json(View::make('admin.tugas.tbl_tugas_lama', $data)->render());
			} else {
				return Response::json(View::make('admin.tugas.tbl_tugas', $data)->render());
			}

		}
	}

	public function ajax_gno(Request $request)
	{
		if ( $this->isJsonRequest($request) ) {

			$id = $request->id_kursus;
			$data = DB::table('tbl_tugas')->where('id_kursus', $id)->orderBy('id_tugas', 'desc')->first();

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
			'tugas' => 'required',
			'ket_tugas' => 'required',
			'jawaban_benar' => 'required',
			'nilai_patokan' => 'required',
			'flag_tugas' => 'required',
		]);

		Tugas::create([
			'id_kursus' => $request->id_kursus,
			'tugas' => $request->tugas,
			'ket_tugas' => $request->ket_tugas,
			'jawaban_benar' => $request->jawaban_benar,
			'nilai_patokan' => $request->nilai_patokan,
			'flag_tugas' => $request->flag_tugas,
		]);

		return response(['status' => 'Data berhasil masuk']);

    }

	public function storeOld(Request $request)
	{
		$checked = $request->chk;
		$id = $request->id_kursus;

		if ( count($checked) > 0 ) {

			foreach ($checked as $c) {

				$m = DB::table('tbl_tugas')->select('*')->where('id_tugas', $c)->first();
				DB::table('tbl_tugas')->insert([
					'id_kursus' => $id,
					'tugas' => $m->tugas,
					'ket_tugas' => $m->ket_tugas,
					'jawaban_benar' => $m->jawaban_benar,
					'nilai_patokan' => $m->nilai_patokan,
					'flag_tugas' => $m->flag_tugas,
				]);
			}

			return response(['status' => 'Berhasil masukkan materi yang dipilih']);
		}

		return response(['status' => 'Pilih setidaknya 1 tugas untuk dimasukkan ke dalam kursus ini']);
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

			return response(Tugas::find($id));
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
			'id' => 'required',
			'tugas' => 'required',
			'ket_tugas' => 'required',
			'jawaban_benar' => 'required',
			'nilai_patokan' => 'required',
			'flag_tugas' => 'required',
		]);

		Tugas::where('id_tugas', $request->id)->update([
			'tugas' => $request->tugas,
			'ket_tugas' => $request->ket_tugas,
			'jawaban_benar' => $request->jawaban_benar,
			'nilai_patokan' => $request->nilai_patokan,
			'flag_tugas' => $request->flag_tugas,
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

			Tugas::destroy($req->id);

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

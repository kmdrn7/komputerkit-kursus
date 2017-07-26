<?php

namespace App\Http\Controllers\Admin;

use DB;
use View;
use Response;
use App\Models\Tugas;
use App\Models\Detailtugas;
use App\Models\Kursus;
use App\Models\QDetailTugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KoreksiTugasController extends Controller
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
		$data['active'] = 'koreksi_tugas';
		// $data['tugas'] = DB::table('q_detail_tugas')->where('jawaban' ,'<>', '')->get();
		$data['tugas'] = DB::table('q_detail_tugas')->orderBy('flag_det', 'desc')->orderBy('nilai_siswa', 'asc')->get();
        return view('admin.koreksi.koreksi', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$req = $request->all();

			$data['tugas'] = DB::table('q_detail_tugas')->get();
			return Response::json(View::make('admin.koreksi.tbl_koreksi', $data)->render());
		}
	}

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Request $req, $id)
    {
        if ( $this->isJsonRequest($req) ) {

			return response(QDetailTugas::find($id));
        }
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {
		$this->validate($request, [
			'id_detail_tugas' => 'required',
			'id_tugas' => 'required',
			'nilai_siswa' => 'required',
			'flag' => 'required',
		], [
			'nilai_siswa.required' => 'Masukkan nilai siswa dengan benar',
		]);

		DetailTugas::where('id_detail_tugas', $request->id_detail_tugas)
					->update([
						'nilai_siswa' => $request->nilai_siswa,
					]);

		return response(['status' => 'Tugas berhasil di nilai']);
    }

    public function destroy(Request $req)
    {

    }

	public function isJsonRequest($request)
	{
		if ( $request->expectsJson() ) {
			return true;
		}

		return false;
	}
}

<?php

namespace App\Http\Controllers\Admin;

use View;
use Response;
use Carbon\Carbon;
use App\Models\Promosi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromosiController extends Controller
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
		$data['active'] = 'promosi';
		$data['promosi'] = Promosi::all();
        return view('admin.promosi.promosi', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$req = $request->all();

			$data['promosi'] = Promosi::all();
			return Response::json(View::make('admin.promosi.tbl_promosi', $data)->render());
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
			'promosi' => 'required',
			'ket_promosi' => 'required',
			'gambar' => 'required',
			'flag' => 'required',
		]);

		if ( $request->hasFile('gambar') ) {

			$gambar = $request->file('gambar');
			$format = $request->gambar->getClientOriginalExtension();
			$gambar_name = 'promosi-'.Carbon::now()->timestamp.'.'.$format;
			$gambar->move(public_path().'/img/promosi/', $gambar_name);

			Promosi::create([
				'promosi' => $request->promosi,
				'ket_promosi' => $request->ket_promosi,
				'gambar' => $gambar_name,
				'flag' => 1,
			]);

			return response(['status' => 'Data berhasil masuk']);
		}

		return response($errors);

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

			return response(Promosi::find($id));
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
			'promosi' => 'required',
			'ket_promosi' => 'required',
			'gambar' => 'required',
			'flag' => 'required',
		]);

		if ( $request->hasFile('gambar') ) {

			$gambar_lama = $request->gambar_lama;
			unlink(public_path() . '/img/promosi/' . $gambar_lama);

			$gambar = $request->file('gambar');
			$format = $request->gambar->getClientOriginalExtension();
			$gambar_name = 'promosi-'.Carbon::now()->timestamp.'.'.$format;
			$gambar->move(public_path().'/img/promosi/', $gambar_name);

			Promosi::where('id_promosi', $request->id)->update([
				'promosi' => $request->promosi,
				'ket_promosi' => $request->ket_promosi,
				'gambar' => $gambar_name,
				'flag' => 1,
			]);

			return response(['status' => 'Data berhasil diubah beserta gambar']);

		} else {

			Promosi::where('id_promosi', $request->id)->update([
				'promosi' => $request->promosi,
				'ket_promosi' => $request->ket_promosi,
				'flag' => 1,
			]);

			return response(['status' => 'Data berhasil diubah tanpa gambar']);
		}

		return response($errors);
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

			$gambar = Promosi::where('id_promosi', $req->id)->first();
			$gambar_lama = $gambar->gambar;

			if ( file_exists(public_path() . '/img/promosi/' . $gambar_lama) ) {
				unlink(public_path() . '/img/promosi/' . $gambar_lama);
			}

			Promosi::destroy($req->id);

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

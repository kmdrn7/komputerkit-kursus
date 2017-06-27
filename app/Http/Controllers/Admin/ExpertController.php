<?php

namespace App\Http\Controllers\Admin;

use View;
use Response;
use Carbon\Carbon;
use App\Models\Expert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpertController extends Controller
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
		$data['active'] = 'expert';
		$data['keahlian'] = Expert::all();
        return view('admin.expert.expert', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$req = $request->all();

			$data['keahlian'] = Expert::all();
			return Response::json(View::make('admin.expert.tbl_expert', $data)->render());
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
			'keahlian' => 'required',
			'desc_keahlian' => 'required',
			'gambar' => 'required',
		]);

		if ( $request->hasFile('gambar') ) {

			$gambar = $request->file('gambar');
			$format = $request->gambar->getClientOriginalExtension();
			$gambar_name = 'expert-'.Carbon::now()->timestamp.'.'.$format;
			$gambar->move(public_path().'/img/keahlian/', $gambar_name);

			Expert::create([
				'keahlian' => $request->keahlian,
				'desc_keahlian' => $request->desc_keahlian,
				'gambar' => $gambar_name,
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

			return response(Expert::find($id));
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
			'keahlian' => 'required',
			'desc_keahlian' => 'required',
			'gambar' => 'required',
		]);

		if ( $request->hasFile('gambar') ) {

			$gambar_lama = $request->gambar_lama;

			if ( file_exists(public_path() . '/img/keahlian/' . $gambar_lama) ) {
				unlink(public_path() . '/img/keahlian/' . $gambar_lama);
			}

			$gambar = $request->file('gambar');
			$format = $request->gambar->getClientOriginalExtension();
			$gambar_name = 'expert-'.Carbon::now()->timestamp.'.'.$format;
			$gambar->move(public_path().'/img/keahlian/', $gambar_name);

			Expert::where('id_keahlian', $request->id)->update([
				'keahlian' => $request->keahlian,
				'desc_keahlian' => $request->desc_keahlian,
				'gambar' => $gambar_name,
			]);

			return response(['status' => 'Data berhasil diubah beserta gambar']);

		} else {

			Expert::where('id_keahlian', $request->id)->update([
				'keahlian' => $request->keahlian,
				'desc_keahlian' => $request->desc_keahlian,
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

			$gambar = Expert::where('id_keahlian', $req->id)->first();
			$gambar_lama = $gambar->gambar;

			if ( file_exists(public_path() . '/img/keahlian/' . $gambar_lama) ) {
				unlink(public_path() . '/img/keahlian/' . $gambar_lama);
			}

			Expert::destroy($req->id);

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

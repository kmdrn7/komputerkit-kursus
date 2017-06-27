<?php

namespace App\Http\Controllers\Admin;

use View;
use Response;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembimbingController extends Controller
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
		$data['active'] = 'pembimbing';
		$data['pembimbing'] = Pembimbing::all();
        return view('admin.pembimbing.pembimbing', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$req = $request->all();

			$data['pembimbing'] = Pembimbing::all();
			return Response::json(View::make('admin.pembimbing.tbl_pembimbing', $data)->render());
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
			'pembimbing' => 'required',
			'keahlian' => 'required',
		]);

		Pembimbing::create([
			'pembimbing' => $request->pembimbing,
			'keahlian' => $request->keahlian,
		]);

		return response(['status' => 'Data berhasil masuk']);

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

			return response(Pembimbing::find($id));
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
			'pembimbing' => 'required',
			'keahlian' => 'required',
		]);

		Pembimbing::where('id_pembimbing', $request->id)->update([
			'pembimbing' => $request->pembimbing,
			'keahlian' => $request->keahlian,
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

			Pembimbing::destroy($req->id);

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

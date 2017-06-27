<?php

namespace App\Http\Controllers\Admin;

use View;
use Response;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankController extends Controller
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
		$data['active'] = 'bank';
		$data['bank'] = Bank::all();
        return view('admin.bank.bank', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$req = $request->all();

			$data['bank'] = Bank::all();
			return Response::json(View::make('admin.bank.tbl_bank', $data)->render());
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
			'nama_bank' => 'required',
			'atas_nama' => 'required',
			'no_rekening' => 'required',
		]);

		Bank::create([
			'nama_bank' => $request->nama_bank,
			'atas_nama' => $request->atas_nama,
			'no_rekening' => $request->no_rekening,
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

			return response(Bank::find($id));
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
			'nama_bank' => 'required',
			'atas_nama' => 'required',
			'no_rekening' => 'required',
		]);

		Bank::where('id_bank', $request->id)->update([
			'nama_bank' => $request->nama_bank,
			'atas_nama' => $request->atas_nama,
			'no_rekening' => $request->no_rekening,
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

			Bank::destroy($req->id);

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

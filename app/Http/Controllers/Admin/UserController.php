<?php

namespace App\Http\Controllers\Admin;

use View;
use Response;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
		$data['active'] = 'user';
		$data['user'] = User::all();
        return view('admin.user.user', $data);
    }

	public function ajax_fetch_all(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$req = $request->all();

			$data['user'] = User::all();
			return Response::json(View::make('admin.user.tbl_user', $data)->render());
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
			'nama' => 'required',
			'email' => 'required|email',
			'password' => 'required',
		]);

		User::create([
			'name' => $request->nama,
			'nickname' => $request->nickname,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'tgl_lahir' => $request->tgl_lahir,
			'alamat' => $request->alamat,
			'sekolah' => $request->sekolah,
			'status' => $request->status,
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

			return response(User::find($id));
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
			'nama' => 'required',
			'email' => 'required',
		]);

		if ( $request->password === NULL ) {

			User::where('id_user', $request->id)->update([
				'name' => $request->nama,
				'email' => $request->email,
				'nickname' => $request->nickname,
				'tgl_lahir' => $request->tgl_lahir,
				'alamat' => $request->alamat,
				'sekolah' => $request->sekolah,
				'status' => $request->status,
			]);
		} else {
			User::where('id_user', $request->id)->update([
				'name' => $request->nama,
				'email' => $request->email,
				'password' => Hash::make($request->password),
				'nickname' => $request->nickname,
				'tgl_lahir' => $request->tgl_lahir,
				'alamat' => $request->alamat,
				'sekolah' => $request->sekolah,
				'status' => $request->status,
			]);
		}

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

			User::destroy($req->id);

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

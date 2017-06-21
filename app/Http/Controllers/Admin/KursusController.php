<?php

namespace App\Http\Controllers\Admin;

use Auth;
use View;
use Response;
use Carbon\Carbon;
use App\Models\Kursus;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KursusController extends Controller
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
		$data['active'] = 'kursus';
		$data['kursus'] = Kursus::all();
		$data['kategori'] = Kategori::all();
        return view('admin.kursus.kursus', $data);
    }

	public function ajaxKursus(Request $request)
	{

		if ( $this->isJsonRequest($request) ) {
			$req = $request->all();

			$data['kursus'] = Kursus::all();
			return Response::json(View::make('admin.kursus.tbl_kursus', $data)->render());
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
			'kursus' => 'required',
			'harga' => 'required',
			'waktu' => 'required',
			'kategori' => 'required',
			'keterangan' => 'required',
			'syarat' => 'required',
			'gambar' => 'required',
		]);

		if ( $request->hasFile('gambar') ) {

			$gambar = $request->file('gambar');
			$format = $request->gambar->getClientOriginalExtension();
			$gambar_name = Carbon::now()->timestamp.'.'.$format;
			$gambar->move(public_path().'/img/kursus/', $gambar_name);

			$id = str_pad(substr(Kursus::orderBy('id_kursus', 'desc')->take(1)->get()->first()->id_kursus, 2, strlen(Kursus::orderBy('id_kursus', 'desc')->take(1)->get()->first()->id_kursus))+1, 3, '0', STR_PAD_LEFT);
			$data['id'] = $id;

			Kursus::create([
				'id_kursus' => "fr".$id,
				'slug' => str_slug($request->kursus, '-').'--'.$id,
				'kursus' => $request->kursus,
				'kategori' => $request->kategori,
				'waktu' => $request->waktu,
				'ket_kursus' => $request->keterangan,
				'harga' => $request->harga,
				'gambar' => $gambar_name,
				'syarat' => $request->syarat,
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

			return response(Kursus::find($id));
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
			'kursus' => 'required',
			'harga' => 'required',
			'waktu' => 'required',
			'kategori' => 'required',
			'keterangan' => 'required',
			'syarat' => 'required',
		]);

		if ( $request->hasFile('gambar') ) {

			$gambar_lama = $request->gambar_lama;
			unlink(public_path() . '/img/kursus/' . $gambar_lama);

			$gambar = $request->file('gambar');
			$format = $request->gambar->getClientOriginalExtension();
			$gambar_name = Carbon::now()->timestamp.'.'.$format;
			$gambar->move(public_path().'/img/kursus/', $gambar_name);

			Kursus::where('id_kursus', $request->id)->update([
				'slug' => str_slug($request->kursus, '-').'--'.$request->id,
				'kursus' => $request->kursus,
				'kategori' => $request->kategori,
				'waktu' => $request->waktu,
				'ket_kursus' => $request->keterangan,
				'harga' => $request->harga,
				'gambar' => $gambar_name,
				'syarat' => $request->syarat,
			]);

			return response(['status' => 'Data berhasil diubah beserta gambar']);

		} else {

			Kursus::where('id_kursus', $request->id)->update([
				'slug' => str_slug($request->kursus, '-').'--'.$request->id,
				'kursus' => $request->kursus,
				'kategori' => $request->kategori,
				'waktu' => $request->waktu,
				'ket_kursus' => $request->keterangan,
				'harga' => $request->harga,
				'syarat' => $request->syarat,
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
    public function destroy($id)
    {
        //
    }

	public function isJsonRequest($request)
	{
		if ( $request->expectsJson() ) {
			return true;
		}

		return false;
	}
}

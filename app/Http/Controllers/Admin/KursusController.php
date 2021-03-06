<?php

namespace App\Http\Controllers\Admin;
use DB;
use Auth;
use View;
use Response;
use Carbon\Carbon;
use App\Models\Kursus;
use App\Models\Kategori;
use App\BaseGenerator as BG;
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
		$data['pembimbing'] = DB::table('tbl_pembimbing')->get();
        return view('admin.kursus.kursus', $data);
    }

	public function ajax_fetch_all(Request $request)
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
			'pembimbing' => 'required',
			'keterangan' => 'required',
			'syarat' => 'required',
			'gambar' => 'required',
			'warna' => 'required',
		]);

		if ( $request->hasFile('gambar') ) {

			if ( DB::table('tbl_kursus')->count() >= 1 ) {
				$id_kursus = Kursus::orderBy('id_kursus', 'desc')->take(1)->get()->first()->id_kursus;
				$id = str_pad(substr($id_kursus, 2, strlen($id_kursus)) + 1, 3, '0', STR_PAD_LEFT);
			} else {
				$id = str_pad(1, 3, '0', STR_PAD_LEFT);
			}

			$gambar = $request->file('gambar');
			$format = $request->gambar->getClientOriginalExtension();
			$gambar_name = Carbon::now()->timestamp.'.'.$format;
			$gambar->move(BG::public_path().'/img/kursus/', $gambar_name);
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
				'pembimbing' => $request->pembimbing,
				'warna' => $request->warna,
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
			'pembimbing' => 'required',
			'keterangan' => 'required',
			'syarat' => 'required',
			'warna' => 'required',
		]);

		if ( $request->hasFile('gambar') ) {

			$gambar_lama = $request->gambar_lama;
			if ( file_exists(BG::public_path() . '/img/kursus/' . $gambar_lama) ) {
				unlink(BG::public_path() . '/img/kursus/' . $gambar_lama);
			}

			$gambar = $request->file('gambar');
			$format = $request->gambar->getClientOriginalExtension();
			$gambar_name = Carbon::now()->timestamp.'.'.$format;
			$gambar->move(BG::public_path().'/img/kursus/', $gambar_name);

			Kursus::where('id_kursus', $request->id)->update([
				'slug' => str_slug($request->kursus, '-').'--'.$request->id,
				'kursus' => $request->kursus,
				'kategori' => $request->kategori,
				'waktu' => $request->waktu,
				'ket_kursus' => $request->keterangan,
				'harga' => $request->harga,
				'gambar' => $gambar_name,
				'syarat' => $request->syarat,
				'pembimbing' => $request->pembimbing,
				'warna' => $request->warna,
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
				'pembimbing' => $request->pembimbing,
				'warna' => $request->warna,
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

			$gambar = Kursus::where('id_kursus', $req->id)->first();
			$gambar_lama = $gambar->gambar;

			if ( file_exists(BG::public_path() . '/img/kursus/' . $gambar_lama) ) {
				unlink(BG::public_path() . '/img/kursus/' . $gambar_lama);
			}

			Kursus::destroy($req->id);

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

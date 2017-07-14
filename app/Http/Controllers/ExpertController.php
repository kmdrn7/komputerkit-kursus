<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;
use App\Models\QDetailKeahlian;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['expert'] = Expert::all();
        // return view('user.expert.main', $data);
		return view('user.expert.maaf', $data);
    }

	public function detail($id)
	{
		if ( $this->isExists($id) ) {

			$data['x'] = Expert::find($id);
			$data['detail'] = QDetailKeahlian::where('id_keahlian', $id)->get();
			return view('user.expert.detail', $data);
		}

		App::abort(404, 'Halaman yang anda minta sudah dimakan oleh si pacman :()');
	}

	public function isExists($id='')
	{
		$expert = Expert::find($id)->count();

		if ( $expert > 0 ) {
			return true;
		}

		return false;
	}

}

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
        return view('user.expert.main', $data);
    }

	public function detail($id)
	{
		if ( $this->isExists($id) ) {

			$data['detail'] = QDetailKeahlian::where('id_detail_keahlian', $id)->get();
			return view('user.expert.detail', $data);
		}

		return "masuk ke halaman 404";
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

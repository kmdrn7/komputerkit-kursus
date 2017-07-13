<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Route;
use Illuminate\Http\Request;
use App\Models\QDetailKursus;
use App\Models\Kursus;
use App\Models\Promosi;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->doSomeRoutineCheck();
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['user'] = Auth::user();
		$data['kursus_total'] = DB::table('tbl_kursus')->count();
		$data['kursus'] = Kursus::inRandomOrder()->take(3)->get();
		$data['kursus_anda'] = QDetailKursus::where(['id_user'=> Auth::id(), 'flag_kursus' => 1,])->get();
		$data['kursus_tunggakan'] = QDetailKursus::where(['id_user'=> Auth::id()])
												->where(function ($query){
													$query->where('flag_kursus', 0)
														->orWhere('flag_kursus', 2);
												})->orderBy('flag_kursus', 'asc')->get();
		$data['promosi'] = Promosi::first();
        return view('user.home', $data);
    }

	/**
	* Jalankan rutinitas cek kursus dan lainnya
	*
	* @return void
	*/
	public function doSomeRoutineCheck()
	{
		return true;
	}
}

<?php

namespace App\Http\Controllers;

use Auth;
use Route;
use App\Test;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\QDetailKursus;
use App\Models\Kursus;
use App\Models\Top;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function test()
	{
		// Test::create([
		// 	'time_from' => Carbon::now(),
		// 	'time_to' => Carbon::now()->addDays(1),
		// ]);
		// $data = Test::all();
		// foreach ($data as $item) {
		// 	$diff = $item->time_from->diffInDays($item->time_to);
		// 	if ( $diff > 0 ) {
		//
		// 		echo $item->time_from . " sampai " . $item->time_to . " memiliki beda waktu " . $diff . " hari";
		// 		echo "<br>";
		// 	} else {
		//
		// 		echo "Masa berlaku habis";
		// 		echo "<br>";
		// 	}
		// }

		dd(Route::parameter());
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// $id = str_pad(substr(Kursus::orderBy('id_kursus', 'desc')->take(1)->get()->first()->id_kursus, 2, strlen(Kursus::orderBy('id_kursus', 'desc')->take(1)->get()->first()->id_kursus))+1, 4, '0', STR_PAD_LEFT);
		// $data['id'] = str_pad(substr(Kursus::orderBy('id_kursus', 'desc')->take(1)->get()->first()->id_kursus, 2, strlen(Kursus::orderBy('id_kursus', 'desc')->take(1)->get()->first()->id_kursus))+1, 4, '0', STR_PAD_LEFT);
		// Kursus::create([
		// 	'id_kursus' => "kk".$id,
		// 	'slug' => 'nama-kursus-andka--14--kk'.$id,
		// 	'kursus' => 'Nama Kursus',
		// 	'waktu' => 14,
		// 	'ket_kursus' => 'ket kursus lololol lorem',
		// 	'harga' => 20000,
		// 	'gambar' => 'nope',
		// ]);
		// dd($id);
		$data['kursus'] = Kursus::take(3)->get();
		$data['kursus_anda'] = QDetailKursus::where(['id_user'=> Auth::id(), 'flag_kursus' => 1,])->get();
		$data['kursus_tunggakan'] = QDetailKursus::where(['id_user'=> Auth::id(), 'flag_kursus' => 0,])->get();
		// dd($data['kursus_anda']->tgl_mulai->diffInDays($data['kursus_anda']->tbl_selesai));
		// $data['topFirst'] = Top::first();
		// $data['topThird'] = Top::third();
        return view('user.home', $data);
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
		// middleware_name : guard_name
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = [
			'active' => 'dashboard',
			'user' => DB::table('tbl_user')->count(),
			'user_active' => DB::table('tbl_user')->count(),
			'bayar' => DB::table('tbl_bayar')->where('status', 0)->count(),
			'bookmark' => DB::table('tbl_bookmark')->count(),
			'detail_kursus' => DB::table('tbl_detail_kursus')->count(),
			'kategori' => DB::table('tbl_kategori')->count(),
			'kursus' => DB::table('tbl_kursus')->count(),
			'pembimbing' => DB::table('tbl_pembimbing')->count(),
			'pesan_masuk' => DB::table('tbl_pesan')->where('flag_pesan', 0)->where('dari', '<>', 'admin')->count(),
			'pesan_belum_dibaca' => DB::table('tbl_pesan')->where('flag_terkirim', 1)->where('dari', 'admin')->count(),
		];

        return view('admin.dashboard', $data);
    }
}

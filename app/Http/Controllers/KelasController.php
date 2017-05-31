<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use App\User;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
		$data['kursus'] = Kursus::all();
		$data['qkursus'] = User::find(Auth::id())->detailkursus()->where('flag_kursus', 1)->get();
		$data['qbookmark'] = User::find(Auth::id())->bookmark;
    	return view('user.kelas',$data);
    }
}

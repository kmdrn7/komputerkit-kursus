<?php

namespace App\Http\Controllers;

// use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\QDetailKursus;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{

    public function index()
    {
		$id_user = Auth::id();
		$data['now'] = Carbon::now();
		$data['histori'] = QDetailKursus::where('id_user', $id_user)->get();
		// $data['month'] = QDetailKursus::select("created_month")->where('id_user', $id_user)->distinct()->get();
		// dd($data['month']);
        return view('user.histori.histori', $data);
    }
}

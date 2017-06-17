<?php

namespace App\Http\Controllers;

// use Auth;
use Illuminate\Http\Request;
use App\Models\QDetailKursus;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{

    public function index()
    {
		$data['histori'] = QDetailKursus::where('id_user', Auth::user()->id_user)->get();
        return view('user.histori.all', $data);
    }
}

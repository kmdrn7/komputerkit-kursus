<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Bookmark;
use App\Models\QBookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
		$data['bookmark'] = QBookmark::where('id_user', Auth::id())
									->get();

    	return view('user.bookmark.bookmark', $data);
    }

	public function postDelete(Request $req)
	{
		if ( $req->id_kursus !== '' && $req->id_bookmark == '' ) {
			Bookmark::where([
				'id_kursus' => $req->id_kursus,
				'id_user' => Auth::id()
			])->delete();
			return response(['status' => 'berhasil dihapus']);
		}
		
		Bookmark::destroy([$req->id_bookmark]);
		return response(['status' => 'berhasil dihapus']);
	}

	public function store(Request $request)
	{
		$id_user = Auth::id();

		$count = DB::table('tbl_bookmark')
			->where('id_user', $id_user)
			->where('id_kursus', $request->id_kursus)
			->count();

		if ( $count > 0 ) {
			return response(['Bookmark sudah ada']);
		} else {
			Bookmark::create([
				'id_kursus' => $request->id_kursus,
				'id_user' => $id_user,
			]);

			return response(['Data berhasil dimasukkan']);
		}

	}
}

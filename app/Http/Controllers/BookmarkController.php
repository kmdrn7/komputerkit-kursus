<?php

namespace App\Http\Controllers;

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
		Bookmark::destroy([$req->id_bookmark]);
		return response(['status' => 'berhasil dihapus']);
	}
}

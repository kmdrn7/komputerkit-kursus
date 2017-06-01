<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use App\Models\Kategori;
use App\Models\QDetailMateri;
use App\Models\QDetailKursus;

class KursusController extends Controller
{

	public function index($id)
	{
		if ( $id == 'all' ) {
			$data['kursus'] = Kursus::all();
			return view('user.kursus.list', $data);
		}

		if ( $this->isCategory($id) ) {
			$data['kursus'] = Kursus::where('slug', $id)->first();
			return view('user.kursus.list', $data);
		}

		if ( $this->isExists($id) ) {

			if ( $id == 'all' ) {
				$data['kursus'] = Kursus::all();
			} else {
				$data['kursus'] = Kursus::where('slug', $id)->first();
				$data['materi'] = QDetailMateri::where('slug', $id)->get();
				$data['user'] = QDetailKursus::where('slug', $id)->get();
			}

			return view('user.kursus.detail', $data);

		} else {
			echo "redirect ke halaman 404";
		}
	}

	public function indexFree($id)
	{

		$data['kategori'] = Kategori::all();

		if ( $id == 'all' ) {
			$data['kursus'] = Kursus::all();
			return view('user.kursus.listfree', $data);
		}

		if ( $this->isCategory($id) ) {
			$data['kursus'] = Kursus::where('kategori', $id)->get();
			return view('user.kursus.listfree', $data);
		}

		if ( $this->isExists($id) ) {

			if ( $id == 'all' ) {
				$data['kursus'] = Kursus::all();
			} else {
				$data['kursus'] = Kursus::where('slug', $id)->first();
				$data['materi'] = QDetailMateri::where('slug', $id)->get();
				$data['user'] = QDetailKursus::where('slug', $id)->get();
			}

			return view('user.kursus.detailfree', $data);

		} else {
			echo "redirect ke halaman 404";
		}
	}

	public function isExists($id='')
	{
		if ($id == '') {
			return false;
		}

		if ( $id == 'all' ) {
			return true;
		}

		if ( Kursus::where('slug', $id)->count() > 0 ) {
			return true;
		}

		return false;
	}

	public function isCategory($id)
	{
		if ( Kategori::where('kategori', $id)->get()->count() > 0 ) {
			return true;
		}
		return false;
	}

	public function premium()
	{
		echo "ini adalah kursus premium";
	}
}

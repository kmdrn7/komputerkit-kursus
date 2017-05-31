<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Top extends Model
{
	protected $table = "top_1";
	protected $primaryKey = "kursus";
	public $timestamps = false;

	public static function first()
	{
		return DB::table('top_1')->select('*')->get();
	}

	public static function third()
	{
		return DB::table('top_3')->select('*')->get();
	}
}

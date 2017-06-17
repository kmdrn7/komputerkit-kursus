<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailMateri extends Model
{
	protected $table = "tbl_detail_materi";
	protected $primaryKey = "id_detail_materi";
	public $timestamps = false;

	protected $fillable = [
		'id_detail_kursus',
		'id_user',
		'id_materi',
		'flag_materi',
		'flag_terbaru',
	];

	protected $guarded = [];
}

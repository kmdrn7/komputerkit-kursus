<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
	protected $table = "tbl_detail_kursus";
	protected $primaryKey = "id_detail_kursus";
	public $timestamps = false;

	protected $fillable = [
		'id_kursus',
		'id_user',
		'bayar',
		'tgl_mulai',
		'tgl_selesai',
		'flag_kursus',
	];

	protected $guarded = [];
}

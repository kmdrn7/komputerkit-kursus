<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QDetailKursus extends Model
{
    protected $table = "q_detail_kursus";
	protected $primaryKey = "id_detail_kursus";
	protected $dates = [
		'tgl_mulai',
		'tgl_selesai',
		'created_at',
		'updated_at',
		'created_month',
	];

	public $timestamps = false;
}
